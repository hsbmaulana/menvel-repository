<?php

namespace Menvel\Repository\Actions;

class PaginatorLimitOffset extends PaginatorAbstract
{
    /**
     * @param int $per
     * @param string $columns
     * @param string $alias
     * @param int $current
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    protected function paginate($per, $columns, $alias, $current)
    {
        return $this->builder->paginate($per, $columns, $alias, $current);
    }
}