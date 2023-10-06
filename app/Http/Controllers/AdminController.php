<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function index(): View
    {
        return view('admin.overview', [
            'users' => User::all()
        ]);
    }

    public function update(User $user): RedirectResponse
    {
        $user->update([
            'is_admin' => !$user->is_admin
        ]);
        return redirect()->route('admin.overview');
    }
}
