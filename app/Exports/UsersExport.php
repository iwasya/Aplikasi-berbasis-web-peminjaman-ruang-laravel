<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromQuery;
use App\Models\User;

class UsersExport implements FromQuery
{
    /**
    * @return \Illuminate\Database\Query\Builder
    */
    public function query()
    {
        return User::query();
    }
}