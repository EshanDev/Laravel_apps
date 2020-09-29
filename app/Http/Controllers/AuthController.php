<?php

namespace App\Http\Controllers;


use App\Models\Serials;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AuthController extends Controller
{

    // Step one - index Authentication
    public function index()
    {
        return view('system.auth', ['route' => 'default']);
    }


    // Step two - Create Serial Number and Redirect Student Code and Email Address to Registration Page.
    public function store_registration_code(Request $request)
    {

    }


    public function send_registration_code(Request $request)
    {
        $rules = [
            'student_code' => 'required|digits:10|string',
            'student_email' => 'required|email|string|max:255',
        ];
        // Create Validator.
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()){
            return back()->withInput()->withErrors(['fails'=>'ไม่สามารถดำเนินการได้ โปรดตรวจทานข้อมูลอีกครั้ง']);
        } else{
            $counts = CountSerials();
            if ($counts == 30){
                return back()->withInput()
                    ->withErrors(['fails' => 'จำนวนผู้ลงทะเบียนครบแล้ว']);
            } else{
                $collection = collect(['student_code' => $request->input('student_code'), 'student_email' => $request->input('student_email')]);
                $serial = getSerial();
                $data = $collection->merge(['registration_code' => $serial]);

                try {
                    $serials = new Serials();
                    $serials->serials = $data['registration_code'];
                    $serials->email = $data['student_email'];
                    $serials->student_code = $data['student_code'];
                        $serials->save();
                        return Redirect::route('auth.register')->with('send_code', $data);
                } catch (\Exception $e){
                    return back()->withInput()
                        ->withErrors(['fails' => 'บันทึกข้อมูลไม่สำเร็จ ฐานข้อมูลเกิดข้อผิดพลาด']);
                }
            }
        }
    }


    // Step three Receipt Student Code and Email Address from Step two and Show the Registration Form.
    public function show_register_form()
    {

        // Check Session
        if (Session::get('send_code')) {
            $data = Session::get('send_code');
            $registration_code = getSerial();
            $username = generateUserName();

            // If Session has send_code then return to Route Switch at register name with value.
            return view('system.auth', ['route' => 'register'], compact('data', 'registration_code', 'username'))
                ->with('success', 'รหัสลงทะเบียนได้ส่งไปยังที่อยู่อีเมล์เรียบร้อย');
        } // If Not follow by condition form  return to normal view to Route Switch at register name without any value.
        else {
            $data = [
                'student_code' => null,
                'student_email' => null,
            ];
            $registration_code = null;
            $username = null;
            return view('system.auth', ['route' => 'register'], compact('data', 'registration_code', 'username'));
        }


    }


    // Verify Registration Code and Redirect to Registration Page.


    public function verify_coded(Request $request)
    {
        $code = $request->input('student_code');
        $email = $request->input('student_email');
        $serial = getSerial();

        $data['verify'] = $request->all();
        return Redirect::route('auth.register', $data);

//        return Redirect::route('auth.register')
//            ->with('student_code', $code)
//            ->with('student_email', $email)
//            ->with('serial', $serial);
    }


    // Verify Email

    public function verify_email(Request $request)
    {
        $Exists_email = Serials::all()->where('email', $request->input('student_email'))->first();

        if ($Exists_email) {
            echo 'false';
        } else {
            echo 'true';
        }
    }

    // Verify Student Code

    public function verify_student_code(Request $request)
    {
        $Exists_code = Serials::all()->where('student_code', $request->input('student_code'))->first();
        if ($Exists_code) {
            echo 'false';
        } else {
            echo 'true';
        }
    }
}
