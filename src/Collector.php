<?php

namespace Menvel\Repository;

use Illuminate\Support\Collection;

class Collector
{
    /**
     * @var \Illuminate\Support\Collection
     */
    private $datas;

    /**
     * @return void
     */
    public function __construct()
    {
        $this->datas = new Collection();
    }

    /**
     * @return void
     */
    public function __destruct()
    {}

    /**
     * @param string|\Menvel\Repository\Contracts\IFeature $data
     * @return int
     */
    public function has($data)
    {
        return $this->datas->search(function ($value, $key) use ($data) {

            return get_class($data) == is_string($data) ? $data : get_class($value);
        });
    }

    /**
     * @param int|null $index
     * @return \Illuminate\Support\Collection|\Menvel\Repository\Contracts\IFeature
     */
    public function get($index = null)
    {
        return $index === null ? $this->datas : $this->datas->get($index);
    }

    /**
     * @param \Menvel\Repository\Contracts\IFeature $data
     * @return void
     */
    public function set($data)
    {
        if (! $this->has($data)) $this->datas->push($data);
    }

    /**
     * @return void
     */
    public function unset()
    {
        $this->datas->pop();
    }
}