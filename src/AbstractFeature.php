<?php

namespace Menvel\Repository;

abstract class AbstractFeature
{
    /**
     * @var \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    protected $builder;

    /**
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function getBuilder()
    {
        return $this->builder;
    }

    /**
     * @param \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     * @return void
     */
    public function setBuilder($builder)
    {
        $this->builder = $builder;
    }
}