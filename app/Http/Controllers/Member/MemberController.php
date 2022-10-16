<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index() {
        $meta_title = __('member.dashboard');

        return view('member.dashboard', compact('meta_title'));
    }
}
