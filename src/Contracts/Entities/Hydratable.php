<?php

namespace Llemos\Blog\Contracts\Entities;

interface Hydratable
{
    //TODO: maybe this should acept a ArrayAccess implementation instead of a array
    public function hydrate(array $data) : void;
}
