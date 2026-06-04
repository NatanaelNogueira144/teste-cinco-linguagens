<?php 

namespace App\Filters;

class UsersFilter extends ApiFilter 
{
    protected $safeParms = [
        'userType' => ['eq'],
        'name' => ['eq', 'like'],
        'email' => ['eq', 'like'],
        'password' => []
    ];

    protected $columnMap = [
        'userType' => 'user_type'
    ];

    protected $operatorMap = [
        'eq' => '=',
        'like' => 'like'
    ];
}