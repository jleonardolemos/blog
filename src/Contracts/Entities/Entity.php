<?php

namespace Llemos\Blog\Contracts\Entities;

use Illuminate\Contracts\Support\Arrayable;

interface Entity extends Arrayable
{
    public function getId() : string;

    public function setId(string $id) : void;
}
