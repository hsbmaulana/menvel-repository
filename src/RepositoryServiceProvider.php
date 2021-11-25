<?php

namespace Menvel\Repository;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * @var array
     */
    protected $map = [];

    /**
     * {@inheritdoc}
     */
    public function register()
    {
        //
    }

    /**
     * @return void
     */
    public function boot()
    {
        foreach ($this->map as $contract => $implementation) {

            $this->app->bind($contract, $implementation);
        }
    }
}