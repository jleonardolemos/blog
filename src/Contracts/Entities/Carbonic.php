<?php

namespace Llemos\Blog\Contracts\Entities;

use Carbon\Carbon;

interface Carbonic extends Entity
{
    public function setCreatedAt(Carbon $createdAt) : void;

    public function getCreatedAt() : Carbon;

    public function setUpdatedAt(Carbon $updateddAt) : void;

    public function getUpdatedAt() : Carbon;
}
