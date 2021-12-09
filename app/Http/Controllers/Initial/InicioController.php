<?php

namespace App\Http\Controllers\Initial;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class InicioController extends Controller
{
    public function index()
    {
        return view("Initial/inicio");
    }


}
