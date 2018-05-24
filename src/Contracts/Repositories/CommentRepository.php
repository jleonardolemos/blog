<?php

namespace Llemos\Blog\Contracts\Repositories;

use Illuminate\Support\Collection;

interface CommentRepository extends Repository
{
    public function findByUserId(int $userId) : Collection;
}
