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
					<span id="error_email"></span>
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


        // Validate Condition Form.
        jQuery('.form').validate({
           rules: {
               student_code: {
                   required: true,
               },
               student_email: {
                   required: true,
                   email: true,

                   remote: {
                       url: "{{route('auth.verify.email')}}",
                       type: "post",

                       data: {
                           _token: function()
                           {
                               return "{{csrf_token()}}";
                           }
                       }
                   }

               }

           }
        });
		
					// Validate Email.
$(document).ready(function(){

 $('#student_email').blur(function(){
  var error_email = '';
  var email = $('#email').val();
  var _token = $('input[name="_token"]').val();
  var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  if(!filter.test(email))
  {    
   $('#error_email').html('<label class="text-danger">Invalid Email</label>');
   $('#email').addClass('has-error');
   $('#register').attr('disabled', 'disabled');
  }
  else
  {
   $.ajax({
    url:"{{ route('auth.verify.email') }}",
    method:"POST",
    data:{email:email, _token:_token},
    success:function(result)
    {
     if(result == 'no_unique')
     {
      $('#error_email').html('<label class="text-success">Email Available</label>');
      $('#email').removeClass('has-error');
      $('#register').attr('disabled', false);
     }
     else
     {
      $('#error_email').html('<label class="text-danger">Email not Available</label>');
      $('#email').addClass('has-error');
      $('#register').attr('disabled', 'disabled');
     }
    }
   })
  }
 });
 
});

    </script>
@endsection
