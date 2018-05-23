<?php

namespace Llemos\Blog\Contracts\Repositories;

use Llemos\Blog\Contracts\Entities\Entity;

//TODO: maybe Entity should be an abstract class implementing Arrayable and Hydratable
interface Repository
{
    public function all();

    public function add(Entity $entity);

    public function update(Entity $entity);

    public function remove($id);

    public function find(string $id): Entity;

    public function findBy(string $field, $value): Entity;
}
