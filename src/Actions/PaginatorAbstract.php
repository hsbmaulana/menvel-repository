<?php

namespace Menvel\Repository\Actions;

use Menvel\Repository\AbstractFeature;
use Menvel\Repository\Contracts\IFeature;

abstract class PaginatorAbstract extends AbstractFeature implements IFeature
{
    /**
     * @var int
     */
    private $perPage = 15;

    /**
     * @var int
     */
    private $currentPage = 1;

    /**
     * @var string
     */
    private $aliasPage = 'current_page';

    /**
     * @param int $per
     * @param int $current
     * @param string $alias
     * @return void
     */
    public function __construct($per, $current, $alias)
    {
        $this->setPerPage($per);
        $this->setCurrentPage($current);
        $this->setAliasPage($alias);
    }

    /**
     * @param int $per
     * @param string $columns
     * @param string $alias
     * @param int $current
     * @return \Illuminate\Pagination\LengthAwarePaginator|\Illuminate\Pagination\CursorPaginator
     */
    abstract protected function paginate($per, $columns, $alias, $current);

    /**
     * @return int
     */
    public function getPerPage()
    {
        return $this->perPage;
    }

    /**
     * @return int
     */
    public function getCurrentPage()
    {
        return $this->currentPage;
    }

    /**
     * @return string
     */
    public function getAliasPage()
    {
        return $this->aliasPage;
    }

    /**
     * @param int $per
     * @return void
     */
    public function setPerPage($per)
    {
        $this->perPage = $per;
    }

    /**
     * @param int $current
     * @return void
     */
    public function setCurrentPage($current)
    {
        $this->currentPage = $current;
    }

    /**
     * @param string $alias
     * @return void
     */
    public function setAliasPage($alias)
    {
        $this->aliasPage = $alias;
    }

    /**
     * @return mixed
     */
    public function __invoke()
    {
        return $this->paginate($this->getPerPage(), '*', $this->getAliasPage(), $this->getCurrentPage());
    }
}