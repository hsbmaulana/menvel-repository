<?php

namespace Menvel\Repository\Actions;

class PaginatorCursor extends PaginatorAbstract
{
    /**
     * @param int $per
     * @param string $columns
     * @param string $alias
     * @param int $current
     * @return \Illuminate\Pagination\CursorPaginator
     */
    protected function paginate($per, $columns, $alias, $current)
    {
        return $this->builder->cursorPaginate($per, $columns, $alias, $current);
    }
}