<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Nette\Utils\Json;

class UserController extends Controller
{
    function index(){
        return view("user.dashboard");
    }
}
