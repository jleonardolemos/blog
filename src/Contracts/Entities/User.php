<?php

namespace Llemos\Blog\Contracts\Entities;

interface User extends Carbonic
{
    public function setName(string $name):void;

    public function getName():string;

    public function setEmail(string $email):void;

    public function getEmail():string;

    public function setPassword(string $password):void;

    public function getPassword():string;
}
