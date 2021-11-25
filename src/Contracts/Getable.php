<?php

namespace Menvel\Repository\Contracts;

interface Getable
{
    /**
     * @param int|string $identifier
     * @param array $querystring
     * @return mixed
     */
    public function get($identifier, $querystring = []);
}