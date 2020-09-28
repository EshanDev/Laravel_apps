<div class="auth container-fluid">
    <div class="conditions-form">
        <div class="form-header">
            <div class="text-center">กรอกข้อมูลเพื่อรับรหัสลงทะเบียน</div>
        </div>
        <form action="{{route('auth.registration_code_send')}}" class="form" id="conditions_form" method="POST" >
            @csrf
            <div class="group-form">
                <div class="form-group">
                    <label for="student_code">ระบุรหัสนักศึกษา</label>
                    <input type="text" class="form-control" name="student_code" id="student_code" value="{{old('student_code')}}">
                </div>
                <div class="form-group">
                    <label for="student_email">ระบุที่อยู่อีเมล์</label>
                    <input type="email" class="form-control" name="student_email" id="student_email" value="{{old('student_email')}}" >
                </div>
            </div>
            <div class="form-footer">
                <div class="form-group">
                    <input type="submit" class="btn btn-secondary" value="ส่งรหัสยืนยันสิทธิ์">
                </div>
            </div>
        </form>

    </div>
</div>

@section('script')
    <script>
        $(document).ready(function () {
            $('form').bind("keypress", function (e) {
                if(e.keyCode == 13){
                    return false;
                }
            });



        })
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove();
            });
        }, 5000);

    </script>
@endsection
