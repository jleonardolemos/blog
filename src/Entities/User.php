<?php

namespace Llemos\Blog\Entities;

use Carbon\Carbon;
use Llemos\Blog\Contracts\Entities\User as UserEntity;
use Llemos\Blog\Contracts\Entities\Hydratable;

//TODO: define a interface for the especific entity to ensure the properties
class User implements UserEntity, Hydratable
{
    public function __construct(array $data)
    {
        $this->hydrate($data);
    }

    protected $id;
    protected $name;
    protected $email;
    protected $created_at;
    protected $updated_at;
    protected $password;

    //TODO: implementar uuid
    public function setId(string $id) : void
    {
        $this->id = $id;
    }

    public function getId() : string
    {
        return (string) $this->id;
    }

    public function setName(string $name) : void
    {
        $this->name = $name;
    }

    public function getName() : string
    {
        return $this->name;
    }

    public function setEmail(string $email) : void
    {
        $this->email = $email;
    }

    public function getEmail() : string
    {
        return $this->email;
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

    public function setPassword(string $password) : void
    {
        $this->password = bcrypt($password);
    }

    public function getPassword() : string
    {
        return $this->password;
    }

    public function toArray():array
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'email' => $this->getEmail(),
            'created_at' => $this->getCreatedAt()->toDateTimeString(),
            'updated_at' => $this->getUpdatedAt()->toDateTimeString(),
            'password' => $this->getPassword()
        ];
    }

    public function hydrate(array $data): void
    {
        isset($data['id']) && $this->setId($data['id']);
        isset($data['name']) && $this->setName($data['name']);
        isset($data['email']) && $this->setEmail($data['email']);
        (isset($data['created_at']) && $data['created_at'])
            && $this->setCreatedAt(Carbon::createFromTimeString($data['created_at']));
        (isset($data['updated_at']) && $data['updated_at'])
            && $this->setUpdatedAt(Carbon::createFromTimeString($data['updated_at']));
        isset($data['password']) && $this->setPassword($data['password']);
    }
}
