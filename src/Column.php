<?php

namespace Kdion4891\LaravelLivewireTables;

use Illuminate\Support\Str;

/**
 * @property string $heading
 * @property string $attribute
 * @property boolean $searchable
 * @property boolean $sortable
 * @property callable $sortCallback
 * @property string $view
 */
class Column
{
    protected $heading;
    protected $sort;
    protected $attribute;
    protected $searchable = false;
    protected $sortable = false;
    protected $sortCallback;
    protected $view;

    public function __construct($heading, $attribute, $sort)
    {
        $this->heading = $heading;
        $this->attribute = $attribute ?? Str::snake(Str::lower($heading));
        $this->sort = $sort ?? $this->attribute;
    }

    public function __get($property)
    {
        return $this->$property;
    }

    public static function make($heading = null, $attribute = null, $sort = null)
    {
        return new static($heading, $attribute, $sort);
    }

    public function searchable()
    {
        $this->searchable = true;
        return $this;
    }

    public function sortable()
    {
        $this->sortable = true;
        return $this;
    }

    public function sortUsing(callable $callback)
    {
        $this->sortCallback = $callback;
        return $this;
    }

    public function view($view)
    {
        $this->view = $view;
        return $this;
    }
    public function getAttribute($attribute)
    {
        return $this->$attribute ?? "";   
    }
}

