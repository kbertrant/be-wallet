<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show user form creation's.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $array = ['create' => true];

        return view('user.new', $array);
    }

    /**
     * List users.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('user.list');
    }

    /**
     * Show user form edition's.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $array = ['create' => false, 'id' => $id];

        return view('user.new', $array);
    }
}
