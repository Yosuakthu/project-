<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function index() {
        $data = array('title' => 'User Profil');
        return view('profil.index', $data);
    }

    public function setting() {
        $data = array('title' => 'Setting Profil');
        return view('profil.setting', $data);
    }
}
