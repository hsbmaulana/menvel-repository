<?php

namespace Menvel\Repository;

abstract class AbstractRepository
{
    /**
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $user;

    /**
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param \Illuminate\Database\Eloquent\Model $user
     * @return void
     */
    public function setUser(\Illuminate\Database\Eloquent\Model $user)
    {
        $this->user = $user;
    }
}