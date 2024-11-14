<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;

use App\Services\UserService;

use App\Enums\Gender;

class UserController extends Controller
{
    public function index()
    {
        $users = UserService::list();

        return view('pages.index', ['users' => $users]);
    }
    public function add()
    {
        $genders = Gender::values();

        return view('pages.add', compact('genders'));
    }
    public function create(UserCreateRequest $request)
    {
        UserService::create($request);

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    public function edit($id)
    {
        $user = UserService::find($id);

        if (!$user) {
            return redirect()->route('users.index');
        }

        $genders = Gender::values();

        return view('pages.edit', ['user' => $user, 'genders' => $genders]);
    }

    public function update(UserUpdateRequest $request, $id)
    {
        try {
            UserService::update($request, $id);
            return redirect()->route('users.index')->with('success', 'User updated successfully.');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Failed to update user.']);
        }
    }

    public function delete($id)
    {
        try {
            UserService::delete($id);
            return redirect()->route('users.index')->with('success', 'User deleted successfully.');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Failed to delete user.']);
        }
    }
}
