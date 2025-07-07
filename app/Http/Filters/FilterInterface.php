<?php

namespace App\Http\Filters;

//use PhpParser\Builder;
use Illuminate\Database\Eloquent\Builder;

interface FilterInterface
{
    public function apply(Builder $builder);
}
