<div class="auth verify-coded-content container-fluid">
    <div class="content">
        <div class="content-header">
            <div class="text-center">
                <div>ระบบลงทะเบียน</div>
            </div>
        </div>

        @if($data['student_code'] !== NULL)
            <div class="alert alert-success" role="alert">
                <div class="text-center">รหัสยืนยันสิทธิ์ได้ส่งไปยัง {{$data['student_email']}} แล้ว</div>
            </div>

            @section('script')
            <script type="text/javascript">
                $('.alert').delay(4000).slideUp(200, function(){
                    $(this).alert('close');
                });


            </script>
                @endsection
        @endif

        <div class="verify-coded">

            <form action="{{ route('auth.registration.confirmation') }}" method="post" class="verify-coded-form" autocomplete="off" id="registration_form">
                @csrf
                <!-- Form Group One -->

                <div class="group-form">
                    <fieldset class="border rounded custom-fieldset">
                        <legend class="w-auto legend">ส่วนที่ 1 รหัสยืนยันสิทธิ์</legend>
                        <div class="grid-container">
                            <div class="form-group">
                                <label for="registration_code">รหัสยืนยันสิทธิ์</label>
                                <input type="text" class="form-control" name="registration_code" value="{{ old('registration_code') }}" placeholder="กรุณากรอกรหัสยีนยีนสิทธิ์">
                            </div>
                            <div class="form-group">
                                <label for="student_code">รหัสนักศึกษา</label>
                                @if($data['student_code'] !== NULL)
                                    <input type="text" name="student_code" class="form-control" disabled value="{{$data['student_code']}}" placeholder="ระบุรหัสนักศึกษา">
                                    <input type="hidden" name="student_code" class="form-control"  value="{{$data['student_code']}}" placeholder="ระบุรหัสนักศึกษา">
                                @else
                                    <input type="text" name="student_code" class="form-control"  value="{{$data['student_code']}}" placeholder="ระบุรหัสนักศึกษา">
                                @endif

                            </div>

                            <div class="form-group">
                                <label for="student_email">ที่อยู่อีเมล์</label>
                                @if($data['student_email'] !== NULL)
                                    <input type="email" name="student_email" class="form-control" value="{{$data['student_email']}}" placeholder="ระบุที่อยู่อีเมล์" disabled>
                                    <input type="hidden" name="student_email" class="form-control" value="{{$data['student_email']}}" placeholder="ระบุที่อยู่อีเมล์" >
                                @else
                                    <input type="email" name="student_email" class="form-control" value="{{$data['student_email']}}" placeholder="ระบุที่อยู่อีเมล์">
                                @endif

                            </div>
                        </div>
                    </fieldset>
                </div>

                <!-- End Form Group One -->


                <!-- Form Group Two -->

                <div class="group-form">
                    <fieldset class="border rounded custom-fieldset">
                        <legend class="w-auto legend">ส่วนที่ 2 ข้อมูลนักศึกษา</legend>
                        <div class="grid-container">
                            <div class="form-group">
                                <label for="student_name">ชื่อ/สกุล</label>
                                <input type="text" name="student_name" class="form-control" value="{{ old('student_name') }}" placeholder="ชื่อ - นามสกุล">
                            </div>
                            <div class="form-group">
                                <label for="student_branch">สาขาวิชาเอก</label>
                                <input type="text" name="student_branch" value="{{ old('student_branch') }}" class="form-control" placeholder="สาขาวิชาที่กำลังศึกษา">
                            </div>

                            <div class="form-group">
                                <label for="student_faculty">คณะ</label>
                                <input type="text" class="form-control" name="student_faculty" value="{{ old('student_faculty') }}" placeholder="คณะที่กำลังศึกษา">
                            </div>

                        </div>
                    </fieldset>
                </div>

                <!-- End Form Group Two -->


                <!-- Form Group Three -->

                <div class="group-form">
                    <fieldset class="border rounded custom-fieldset">
                        <legend class="w-auto legend">ส่วนที่ 3 สร้างรหัสผู้ใช้งาน</legend>
                        <div class="grid-container">
                            <div class="form-group">
                                <label for="name">รหัสผู้ใช้งาน @if($username !== NULL)<span class="text-danger">***เปลี่ยนได้</span> @endif</label>
                                <input type="text" name="name" class="form-control" value="{{ $username}}" placeholder="กำหนดรหัสผู้ใช้งาน">
                            </div>
                            <div class="form-group">
                                <label for="password">รหัสผ่าน</label>
                                <input type="password" name="password" id="password" placeholder="กำหนดรหัสผ่านใหม่" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password-confirm">ยืนยันรหัสผ่าน</label>
                                <input type="password" name="password_confirmation" placeholder="ยืนยันรหัสผ่านอีกครั้ง" class="form-control">
                            </div>
                        </div>

                    </fieldset>
                </div>

                <!-- End Form Group Three -->

                <div class="register-btn">
                    <input type="submit" class="btn btn-outline-secondary btn-lg" value="ส่งข้อมูล">
                </div>

            </form>
        </div>


    </div>
</div>

