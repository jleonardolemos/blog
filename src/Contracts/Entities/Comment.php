<?php

namespace Llemos\Blog\Contracts\Entities;

interface Comment extends Carbonic
{
    public function setUserId(string $userId) : void;

    public function getUserId() : string;

    public function setPostId(string $postId) : void;

    public function getPostId() : string;

    public function setBody(string $body) : void;

    public function getBody() : string;
}
