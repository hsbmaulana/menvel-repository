<?php

namespace Menvel\Repository\Contracts;

interface IFeature
{
    /**
     * @return mixed
     */
    public function __invoke();
}