<?php

namespace Menvel\Repository\Contracts;

interface Addable
{
    /**
     * @param array $data
     * @return mixed
     */
    public function add($data);
}