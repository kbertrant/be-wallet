<?php

namespace App\Http\Controllers;

use App\Application;
use App\Transaction;
use App\User;
use App\Utils\Utils;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /** @var User $user */
        $user = Auth::user();

        $transactions = $user->transactions()->count();

        return view('home', compact('transactions'));
    }

    /**
     * Show the user profile.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {
        /** @var Application $application */
        $application = Application::where('user_id', Auth::user()->id)->first();
        $birth = Utils::DateToFrenchOrSQL(Auth::user()->birth);

        return view('user.profile', compact('application', 'birth'));
    }
}
