<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index(){
 
        return redirect()->route('admin.consultations.index');

        // $user = auth()->user();
        // $user->missions;
        // return Inertia::render('Dashboard', [
        //      'user' => $user,
        // ]);
    }
}
