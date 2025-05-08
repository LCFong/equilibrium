<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\User;
class UserController extends Controller
{
    public function index()
    {
        return Inertia::render('Admin/User',[
            'users' => User::all(),
        ]);
    }

    public function changePassword(User $user, Request $request)
    {
        $request->validate([
            'password' => 'required|string|min:8|confirmed'
        ]);

        $user->update([
            'password' => Hash::make($request->password)
        ]);

        return response()->json(['message' => '密码已更新']);
    }
}