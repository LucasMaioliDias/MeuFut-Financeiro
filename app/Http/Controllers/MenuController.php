<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index() {
        $userId = Auth::id();
        $Menu = Menu::where('user_is',$userId)->ordeByDesc('created_at')->get();
        return ('home')->with('Menu', $Menu);
    }
}
