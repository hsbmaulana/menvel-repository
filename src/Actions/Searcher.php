<?php

namespace Menvel\Repository\Actions;

use Menvel\Repository\AbstractFeature;
use Menvel\Repository\Contracts\IFeature;

class Searcher extends AbstractFeature implements IFeature
{
    /**
     * @var string
     */
    private $fieldPage = '';

    /**
     * @var string
     */
    private $searchPage = "";

    /**
     * @param string $attribute
     * @param string $text
     * @return void
     */
    public function __construct($attribute, $text)
    {
        $this->setFieldPage($attribute);
        $this->setSearchPage($text);
    }

    /**
     * @return string
     */
    public function getFieldPage()
    {
        return $this->fieldPage;
    }

    /**
     * @return string
     */
    public function getSearchPage()
    {
        return $this->searchPage;
    }

    /**
     * @param string $attribute
     * @return void
     */
    public function setFieldPage($attribute)
    {
        $this->fieldPage = $attribute;
    }

    /**
     * @param string $text
     * @return void
     */
    public function setSearchPage($text)
    {
        $this->searchPage = $text;
    }

    /**
     * @return mixed
     */
    public function __invoke()
    {
        $this->builder = $this->builder->where($this->getFieldPage(), 'like', '%' . $this->getSearchPage() . '%');

        return $this->builder->get();
    }
}