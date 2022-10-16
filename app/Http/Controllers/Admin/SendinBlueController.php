<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\GlobalHelper;
use Illuminate\Support\Facades\Validator;
use DB;

class SendinBlueController extends Controller
{
    public function sendinblue()
    {
        $meta_title = __('admin.sendinblue');
        $config = DB::table('sendinblue_configs')->first();
        return view('admin.sendinblue', compact('meta_title', 'config'));
    }

}
