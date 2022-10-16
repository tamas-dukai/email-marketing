<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\GlobalHelper;
use Illuminate\Support\Facades\Validator;
use DB;

class GetresponseController extends Controller
{
    public function getresponse()
    {
        $meta_title = __('admin.getresponse');
        $config = DB::table('getresponse_configs')->first();
        return view('admin.getresponse', compact('meta_title', 'config'));
    }

}
