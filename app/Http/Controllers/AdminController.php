<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() {
        $data = [
            'appName' => 'PinPilJur',
            'title' => 'Dashboard Admin'
        ];
        return view('adminPages.playPages.index', $data);
    }
}
