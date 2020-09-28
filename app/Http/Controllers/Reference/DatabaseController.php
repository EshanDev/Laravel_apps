<?php

namespace App\Http\Controllers\Reference;

use App\Http\Controllers\Controller;
use App\Models\Serials;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class DatabaseController extends Controller
{
    // Verity Serials with Email.

    public function email_serials(Request $request)
    {

        // verity email.
        if ($request->input('student_email') !== '') {

            if ($request->input('student_email')) {
                $rule = array('student_email' => 'required|email|unique:conditions');
                $validation = Validator::make($request->all(), $rule);

                if (!$validation->fails()) {
                    die('true');
                }
            }
        }
        die('false');

    }

    public function remote()
    {
        return view('test_remote');
    }

    public function checkEmail(Request $request)
    {
        if($request->input('student_email') !== '') {
            if($request->input('student_email')){
                $rule = array('student_email' => 'required|email|unique:serials');
                $validation = Validator::make($request->all(), $rule);

                if (!$validation->fails()){
                    die('true');
                }
            }
        }
        die('false');
    }
}
