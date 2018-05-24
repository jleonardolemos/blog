<?php

namespace Llemos\Blog\Entities;

use Carbon\Carbon;
use Llemos\Blog\Contracts\Entities\Comment as CommentEntity;
use Llemos\Blog\Contracts\Entities\Hydratable;

//TODO: define a interface for the especific entity to ensure the properties
class Comment implements CommentEntity, Hydratable
{
    public function __construct(array $data)
    {
        $this->hydrate($data);
    }

    protected $id;
    protected $body;
    protected $userId;
    protected $postId;
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

    public function getPostId() : string
    {
        return $this->postId;
    }

    public function setPostId(string $postId) : void
    {
        $this->postId = $postId;
    }

    public function setBody(string $body) : void
    {
        $this->body = $body;
    }

    public function getBody() : string
    {
        return $this->body;
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
            'body' => $this->getBody(),
            'user_id' => $this->getUserId(),
            'post_id' => $this->getPostId(),
            'created_at' => $this->getCreatedAt()->toDateTimeString(),
            'updated_at' => $this->getUpdatedAt()->toDateTimeString()
        ];
    }

    public function hydrate(array $data) : void
    {
        isset($data['id']) && $this->setId($data['id']);
        isset($data['body']) && $this->setBody($data['body']);
        isset($data['user_id']) && $this->setUserId($data['user_id']);
        isset($data['post_id']) && $this->setPostId($data['post_id']);
        (isset($data['created_at']) && $data['created_at'])
            && $this->setCreatedAt(Carbon::createFromTimeString($data['created_at']));
        (isset($data['updated_at']) && $data['updated_at'])
            && $this->setUpdatedAt(Carbon::createFromTimeString($data['updated_at']));
    }
}
