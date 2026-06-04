<?php 

namespace App\Filters;

class QuestionsFilter extends ApiFilter 
{
    protected $safeParms = [
        'languageId' => ['eq'],
        'description' => ['eq', 'like']
    ];

    protected $columnMap = [
        'languageId' => 'language_id'
    ];

    protected $operatorMap = [
        'eq' => '=',
        'like' => 'like'
    ];
}