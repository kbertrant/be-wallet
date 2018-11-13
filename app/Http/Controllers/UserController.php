<?php

namespace App\Http\Controllers;

use App\Task\UpdatePasswordTask;
use App\User;
use App\Utils\Utils;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;

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
     * Update user's information.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        try
        {
            /** @var User $user */
            $user = Auth::user();


            $data = [
                'gender' => $request->get('gender'),
                'name' => $request->get('name'),
                'birth' => Utils::DateToFrenchOrSQL($request->get('birth')),
                'country' => $request->get('country'),
                'city' => $request->get('city'),
                'address' => $request->get('address'),
            ];

            // is new image uploaded?
            if ($file = $request->file('avatar')) {
                $extension = $file->extension()?: 'png';
                $destinationPath = public_path() . '/uploads/users/';
                $safeName = (is_null($user->avatar) ? str_random(10) : $user->avatar) . '.' . $extension;
                $file->move($destinationPath, $safeName);

                //save new file path into db
                $data['avatar'] = $safeName;

                $user->update($data);
            }

            return Redirect::route('profile')->with('update-success', 'Information updated successfully !');
        } catch (\Exception $e) {
            Log::error($e->getTraceAsString());
            return Redirect::route('profile')->with('update-error', $e->getMessage());
        }
    }

    /**
     * Update user's password.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updatePassword(Request $request)
    {
        /** @var User $user */
        $user = Auth::user();

        $currentPassword = $request->get('current-password');
        $password = $request->get('password');
        $confirmPassword = $request->get('confirm-password');

        $result = (new UpdatePasswordTask())->run($user, $currentPassword, $password, $confirmPassword);

        if($result['code'] === 400) {
            return Redirect::route('profile')->with('password-error', $result['message']);
        } else {
            return Redirect::route('profile')->with('password-success', $result['message']);
        }
    }
}
