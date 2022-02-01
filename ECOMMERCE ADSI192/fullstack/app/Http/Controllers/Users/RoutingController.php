<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use function view;

class RoutingController extends Controller
{
    public function principal() {
        return view('shop.principal');
    }

    public function category() {
        return view('shop.category');
    }
}
