<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        $title = 'User list';

        return $user;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return User::getUsers();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return User::createUser($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {        
        return User::getUser($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return User::getUser($user->id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update($user, Request $request)
    {
        return User::updateUser($user, $request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($user)
    {
        return User::destroyUser($user);
    }

    /**
     * Show specific info by user's ubication
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function showInfoIfUserIsOnMadrid($user)
    {
        return User::showInfoIfUserIsOnMadrid($user);
    }

    /**
     * Show all users if the user is admin
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function showAllUsersIfRolIsAdmin($user)
    {
        return User::showAllUsersIfRolIsAdmin($user);
    }
}
