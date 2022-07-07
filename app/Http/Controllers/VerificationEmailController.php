<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class VerificationEmailController extends Controller
{
    public function index(){
        return Redirect::route('posts.index');
    }
}
