<?php

namespace App\Http\Controllers\Reg;

use App\Models\Serials;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class RegController extends Controller
{
    public function index()
    {
        return view('reg.index', ['reg' => 'default']);
    }








    public function condition(Request $request)
    {
        $rule = [
            'student_code' => 'required|string|digits:10',
            'student_email' => 'required|string|email|max:255',
        ];



        // Create Validator
        $validator = Validator::make($request->all(), $rule);


        // Verif Validator
        if($validator->fails()){
            return back()
            ->withInput()
            ->withErrors(['fails' => 'ไม่สามารถดำเนินการต่อได้ กรุณาตรวจทานข้อมูลอีกครั้ง']);
        }
        else {
            $counts = CountSerials();
            if($counts == 30){
                return back()
                ->withInput()
                ->withErrors(['fails' => 'จำนวนผู้ลงทะเบียนครบแล้ว']);
            }
            else{
                $collect = collect(['student_code' => $request->input('student_code'), 'student_email' => $request->input('student_email')]);
                $serial = getSerial();
                $data = $collect->merge(['registration' => $serial]);

                try{
                    $serials = new Serials();
                    $serials->serials = $data['registration_code'];
                    $serials->email = $data['student_email'];
                    $serials->student_code = $data['student_code'];
                    $serials->save();

                    return Redirect::route('reg.register')->with('send_code', $data);
                }
                catch(\Exception $e)
                {
                    return back()
                    ->withInput()
                    ->withErrors(['fails' => 'บันทึกข้อมูลไม่สำเร็จ ฐานข้อมูลเกิดข้อผิดพลาด']);
                }
            }
        }
    }








    public function verify_code()
    {
        $reg = DB::table('serials')->distinct()->get();
        //return response()->json($reg);
        return Redirect::route('reg.register', ['reg'=> 'code']);
    }


    public function show_form()
    {
        return view('test', ['code'=> 'create']);
    }
    public function regCode_create(Request $request)
    {
        $data = $request->all();
        return Redirect::route('form.reg', ['reg'=> 'code']);
    }
}
