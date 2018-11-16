<?php

namespace App\Task;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class GetCountriesListTask
{
    public function __construct()
    {

    }

    /**
     *
     * @return Collection
     */
    public function run() {
        return DB::table(\Config::get('countries.table_name'))
            ->orderBy('name')
            ->get();
    }
}