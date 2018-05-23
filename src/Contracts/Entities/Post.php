<?php

namespace Llemos\Blog\Contracts\Entities;

interface Post extends Carbonic
{
    public function setTitle(string $title) : void;

    public function getTitle() : string;

    public function setBody(string $body) : void;

    public function getBody() : string;
}
