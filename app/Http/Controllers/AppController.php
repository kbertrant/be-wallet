<?php

namespace App\Http\Controllers;

use App\Task\GetCountriesListTask;
use Illuminate\Http\JsonResponse;

class AppController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Get the list of country
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $countries = (new GetCountriesListTask())->run();

        return new JsonResponse($countries);
    }
}
