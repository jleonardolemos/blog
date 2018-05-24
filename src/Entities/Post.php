<?php

namespace Llemos\Blog\Entities;

use Carbon\Carbon;
use Illuminate\Support\Collection;
use Llemos\Blog\Contracts\Entities\Post as PostEntity;
use Llemos\Blog\Contracts\Entities\Hydratable;

//TODO: define a interface for the especific entity to ensure the properties
class Post implements PostEntity, Hydratable
{
    public function __construct(array $data)
    {
        $this->hydrate($data);
    }

    protected $id;
    protected $body;
    protected $title;
    protected $userId;
    protected $comments;
    protected $created_at;
    protected $updated_at;

    //TODO: implementar uuid
    public function setId(string $id) : void
    {
        $this->id = $id;
    }

    public function getId() : string
    {
        return (string)$this->id;
    }

    public function getUserId() : string
    {
        return $this->userId;
    }

    public function setUserId(string $userId) : void
    {
        $this->userId = $userId;
    }

    public function setTitle(string $title) : void
    {
        $this->title = $title;
    }

    public function getTitle() : string
    {
        return $this->title;
    }

    public function setBody(string $body) : void
    {
        $this->body = $body;
    }

    public function getBody() : string
    {
        return $this->body;
    }

    public function setComments(Collection $comments = null) : void
    {
        $this->comments = $comments;
    }

    public function getComments() : Collection
    {
        return $this->comments;
    }

    public function setCreatedAt(Carbon $createdAt) : void
    {
        $this->created_at = $createdAt;
    }

    public function getCreatedAt() : Carbon
    {
        return $this->created_at ?? now();
    }

    public function setUpdatedAt(Carbon $updatedAt) : void
    {
        $this->updated_at = $updatedAt;
    }

    public function getUpdatedAt() : Carbon
    {
        return $this->updated_at ?? now();
    }

    public function toArray() : array
    {
        return [
            'id' => $this->getId() ?: null,
            'title' => $this->getTitle(),
            'body' => $this->getBody(),
            'user_id' => $this->getUserId(),
            'created_at' => $this->getCreatedAt()->toDateTimeString(),
            'updated_at' => $this->getUpdatedAt()->toDateTimeString()
        ] + ($this->comments ? ['comments' => $this->comments->toArray()] : []);
    }

    public function hydrate(array $data) : void
    {
        isset($data['id']) && $this->setId($data['id']);
        isset($data['title']) && $this->setTitle($data['title']);
        isset($data['body']) && $this->setBody($data['body']);
        isset($data['user_id']) && $this->setUserId($data['user_id']);
        (isset($data['created_at']) && $data['created_at'])
            && $this->setCreatedAt(Carbon::createFromTimeString($data['created_at']));
        (isset($data['updated_at']) && $data['updated_at'])
            && $this->setUpdatedAt(Carbon::createFromTimeString($data['updated_at']));

        if (isset($data['comments']) && is_array($data['comments'])) {
            $this->setComments(
                collect(array_map(function ($comment) use ($data) {
                    return new Comment($comment);
                }, $data['comments']))
            );
        }
    }
}
