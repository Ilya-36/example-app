<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Show the profile for a given user.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $userLol = "lol";
        $userName = "Ilyas";
       // dd($id);

        return view('user.profile', [
            'user' => $userLol,
            'userName' => $userName
        ]);
    }
}