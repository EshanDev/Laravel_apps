<?php

namespace App\Http\Controllers\Reg;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class RegController extends Controller
{
    public function index()
    {
        return view('reg.index', ['reg' => 'default']);
    }
    public function verify_code()
    {
        return Redirect::route('reg.register', ['reg'=> 'code']);
    }
}
