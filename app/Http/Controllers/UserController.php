<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function showLinks()
    {
        $user=Auth::id();
        $links = Link::where('user_id', $user)->get();
        return view('links', compact('links'));
    }
}
