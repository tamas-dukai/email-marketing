<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\GlobalHelper;
use Illuminate\Support\Facades\Validator;
use DB;

class SendyController extends Controller
{
    public function sendy()
    {
        $meta_title = __('admin.sendy');
        $config = DB::table('sendy_configs')->first();
        return view('admin.sendy', compact('meta_title', 'config'));
    }

}
