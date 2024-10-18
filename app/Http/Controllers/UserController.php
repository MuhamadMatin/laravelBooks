<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Policies\UserPolicy;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller implements HasMiddleware
{

    public static function middleware(): array
    {
        return [
            'role_or_permission:view_book|view_any_book|view_user|view_any_user|create_user|edit_user|delete_user',
            new Middleware('permission:view_user|view_any_user', only: ['index']),
            new Middleware('permission:create_user', only: ['create', 'store']),
            new Middleware('permission:edit_user', only: ['edit', 'update']),
            new Middleware('permission:delete_user', only: ['destroy']),
            new Middleware('permission:view_book|view_any_book', only: ['updateRole']),
        ];
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::with('roles')->paginate(20);
        return view('admin.users.index', [
            'users' => $users,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.users.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        try {
            $validated = $request->validated();
            $validated['password'] = Hash::make($validated['password']);
            if ($request->hasFile('profile_photo_path')) {
                $originalName = $request->file('profile_photo_path')
                    ->getClientOriginalName();

                $profile_photo_path = $request->file('profile_photo_path')
                    ->storeAs('profile-photos', $originalName, 'public');

                $validated['profile_photo_path'] = $profile_photo_path;
            }

            User::create($validated);
            return redirect()->route('admin.users.index');
        } catch (\Throwable $e) {
            return redirect()->route('admin.users.create')->withErrors($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('admin.users.edit', [
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        try {
            $validated = $request->validated();
            if ($request['password']) {
                $validated['password'] = Hash::make($validated['password']);
            }
            if ($request->hasFile('profile_photo_path')) {
                $originalName = $request->file('profile_photo_path')
                    ->getClientOriginalName();

                $profile_photo_path = $request->file('profile_photo_path')
                    ->storeAs('profile-photos', $originalName, 'public');

                $validated['profile_photo_path'] = $profile_photo_path;
            }

            $user->update($validated);
            return redirect()->route('admin.users.index');
        } catch (\Throwable $e) {
            return redirect()->route('admin.users.edit', $user->id)->withErrors($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        try {
            $user = User::find($user)->first();
            if (!$user) {
                return redirect()->route('admin.users.index')->withErrors('User not found');
            }
            $user->delete();
            return redirect()->route('admin.users.index');
        } catch (\Throwable $e) {
            return redirect()->route('admin.users.index')->withErrors('Name not found');
        }
    }

    public function updateRole(User $user)
    {
        try {
            $user = User::find($user)->first();
            if (!$user) {
                return redirect()->route('index')->withErrors('User not found');
            }
            if ($user->hasRole(['Editor' | 'Admin'])) {
                return redirect()->route('index')->withErrors('User is not allowed');
            }
            if ($user->hasRole('User')) {
                $user->removeRole('User');
            }
            $user->assignRole('Editor');
            return redirect()->route('index');
        } catch (\Throwable $e) {
            return redirect()->route('index')->withErrors('Name not found');
        }
    }
}
