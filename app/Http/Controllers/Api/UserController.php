<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return request()->user();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {

        $user = $request->validated();
        $user['project_id'] = $request->user()->id;
        $user['password'] = bcrypt($request->password);
        return User::create($user);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }

    public function login(Request $request)
    {
        $user = User::where('username', $request->username)->where('project_id', $request->user()->id)->first();

        if (!$user) {
            return response([
                'message' => 'User does not exist',
            ], 422);
        }
        if (!Hash::check($request->password, $user->password)) {
            return response([
                'message' => 'Incorrect password',
            ], 401);
        }

        return response([
            'user' => $user,
            'token' => $user->createToken($request->device_name ?? 'token')->plainTextToken,
        ]);
    }
}
