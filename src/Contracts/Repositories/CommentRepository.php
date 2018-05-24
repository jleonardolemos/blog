<?php

namespace Llemos\Blog\Contracts\Repositories;

use Illuminate\Support\Collection;

interface CommentRepository extends Repository
{
    public function findByUserId(int $userId) : Collection;

    public function findByPostId(int $postId) : Collection;
}
