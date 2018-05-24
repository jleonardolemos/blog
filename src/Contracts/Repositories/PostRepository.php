<?php

namespace Llemos\Blog\Contracts\Repositories;

use Illuminate\Support\Collection;

interface PostRepository extends Repository
{
    public function findByUserId(int $userId) : Collection;

    public function allWithComments() : Collection;
}
