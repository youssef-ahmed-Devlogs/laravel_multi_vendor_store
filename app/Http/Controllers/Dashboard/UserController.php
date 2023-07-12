<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::where(function ($query) {
            if (request()->get('search')) {
                $query->where('first_name', 'LIKE', '%' . request()->get('search') . '%')
                    ->orWhere('last_name', 'LIKE', '%' . request()->get('search') . '%')
                    ->orWhere('username', 'LIKE', '%' . request()->get('search') . '%');
            }

            if (request()->get('account_status')) {
                $query->where('status', request()->get('account_status'));
            }

            if (request()->get('user_type') && request()->get('user_type') == 'user') {
                $query->whereDoesntHave('admin')->whereDoesntHave('storeOwner');
            }

            if (request()->get('user_type') && request()->get('user_type') == 'admin') {
                $query->whereHas('admin', function ($query) {
                    $query->where('type', 'admin');
                });
            }

            if (request()->get('user_type') && request()->get('user_type') == 'super_admin') {
                $query->whereHas('admin', function ($query) {
                    $query->where('type', 'super-admin');
                });
            }

            if (request()->get('user_type') && request()->get('user_type') == 'store_owner') {
                $query->whereHas('storeOwner');
            }

        })->latest()->paginate(8)->withQueryString();
        return view('dashboard.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => ['required'],
            'status' => ['required'],
        ]);
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
        return view('dashboard.users.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return back()->with('success', 'User deleted succussfully.');
    }
}
