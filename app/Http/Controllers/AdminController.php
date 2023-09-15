<?php

namespace App\Http\Controllers;

use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        if (!auth()->user()->is_admin) {
            abort(403);
        }
        return view('admin.overview', [
            'users' => User::all()
        ]);
    }

    public function update(User $user)
    {
        if (!auth()->user()->is_admin) {
            abort(403);
        }

        $user->update([
            'is_admin' => !$user->is_admin
        ]);
        return redirect()->route('admin.overview');
    }
}
