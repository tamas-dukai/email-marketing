<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\GlobalHelper;
use Illuminate\Support\Facades\Validator;
use DB;

class ConvertkitController extends Controller
{
    public function convertkit()
    {
        $meta_title = __('admin.convertkit');
        $config = DB::table('convertkit_configs')->first();
        return view('admin.convertkit', compact('meta_title', 'config'));
    }

}
