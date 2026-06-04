<?php 

namespace App\Filters;

class LanguagesFilter extends ApiFilter 
{
    protected $safeParms = [
        'name' => ['eq', 'like'],
        'image' => []
    ];

    protected $columnMap = [];

    protected $operatorMap = [
        'eq' => '=',
        'like' => 'like'
    ];
}