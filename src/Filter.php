<?php

namespace Menvel\Repository;

use Menvel\Repository\Actions\Sorter as ActionSorter;
use Menvel\Repository\Actions\Searcher as ActionSearcher;
use Menvel\Repository\Actions\PaginatorAbstract as ActionPaginator;
use Menvel\Repository\Collector;
use Menvel\Repository\Contracts\IFeature;

class Filter
{
    /**
     * @var \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    protected $target;

    /**
     * @var array
     */
    protected $pipelines =
    [
        ActionSorter::class,
        ActionSearcher::class,
        ActionPaginator::class,
    ];

    /**
     * @var \Menvel\Repository\Collector
     */
    protected $filters;

    /**
     * @param \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder $target
     * @return void
     */
    public function __construct(\Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder $target)
    {
        $this->target = $target;
        $this->filters = new Collector();
    }

    /**
     * @return void
     */
    public function __destruct()
    {}

    /**
     * @param \Menvel\Repository\Contracts\IFeature $filter
     * @return void
     */
    public function through(IFeature $filter)
    {
        foreach ($this->pipelines as $index => $pipeline) {

            if (get_class($filter) == $pipeline) {

                $this->pipelines[$index] = $filter;

                return;
            }
        }

        $this->filters->set($filter);
    }

    /**
     * @return mixed
     */
    public function execute()
    {
        $collectors = $this->filters->get();

        foreach ($this->pipelines as $pipeline) {

            if (is_object($pipeline) && $pipeline instanceof IFeature) {

                $collectors->push($pipeline);
            }
        }

        if ($collectors->count() > 0) {

            $result = null;
            $node = $this->target;

            foreach ($collectors as $collector) {

                $collector->setBuilder($node);

                $result = call_user_func($collector);

                $node = $collector->getBuilder();
            }

            return $result;

        } else {

            return null;
        }
    }
}