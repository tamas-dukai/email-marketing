<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $meta_title = __('admin.dashboard');

        return view('admin.index', compact('meta_title'));
    }
}
