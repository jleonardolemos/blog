<?php

namespace Llemos\Blog\Contracts\Entities;

use Illuminate\Support\Collection;

interface Post extends Carbonic
{
    public function setUserId(string $userId) : void;

    public function getUserId() : string;

    public function setTitle(string $title) : void;

    public function getTitle() : string;

    public function setBody(string $body) : void;

    public function getBody() : string;

    public function setComments(Collection $comments = null) : void;

    public function getComments() : Collection;
}
