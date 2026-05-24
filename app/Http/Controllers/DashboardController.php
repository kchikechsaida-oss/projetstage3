<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class DashboardController extends Controller
{
   public function index()
    {
        $user = Auth::user();

        // Redirection selon le rôle
        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }

        return view('dashboard');
    }
}
