<?php

namespace Menvel\Repository\Actions;

use Menvel\Repository\AbstractFeature;
use Menvel\Repository\Contracts\IFeature;
use Illuminate\Support\Str;

class Sorter extends AbstractFeature implements IFeature
{
    /**
     * @var array
     */
    private $sortPage = [];

    /**
     * @param string $columns
     * @return void
     */
    public function __construct($columns)
    {
        $this->setSortPage($columns);
    }

    /**
     * @return array
     */
    public function getSortPage()
    {
        return $this->sortPage;
    }

    /**
     * @param string $columns
     * @return void
     */
    public function setSortPage($columns)
    {
        $this->sortPage = Str::of($columns)->explode(',')->map(function ($value) {

            $sort = Str::of($value)->explode(':');
            $by = $sort->get(0);
            $direction = $sort->get(1);

            return
            [
                'by' => $by,
                'direction' => Str::lower($direction) === 'asc' || Str::lower($direction) === 'desc' ? $direction : 'asc',
            ];

        })->toArray();
    }

    /**
     * @return mixed
     */
    public function __invoke()
    {
        foreach ($this->getSortPage() as $sort) {

            $this->builder = $this->builder->orderBy($sort['by'], $sort['direction']);
        }

        return $this->builder->get();
    }
}