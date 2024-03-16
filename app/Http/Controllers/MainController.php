<?php

namespace App\Http\Controllers;

use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function __invoke()
    {
        return view('main');

    }
}
