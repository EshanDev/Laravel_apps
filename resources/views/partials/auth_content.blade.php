<div class="auth container-fluid">
    <div class="content">
        <div class="content-header">
            <div class="text-center">
                <div>ข้อตกลง/เงื่อนไข</div>
                <div>และผู้มีสิทธิ์ลงทะเบียน</div>
            </div>
        </div>


        @error('fails')
        <div class="alert alert-danger" role="alert">
            <div class="text-center">{{$message}}</div>
        </div>

        @section('script')
            <script type="text/javascript">
                $('.alert').delay(4000).slideUp(200, function(){
                    $(this).alert('close');
                });


            </script>
    @endsection
        @enderror

        @if(session('status'))
            {{session('status')}}
            @endif

        <!-- Conditions Start -->
        <div class="conditions">
            <div class="conditions-header">
                <div>ผู้มีสิทธิ์ลงทะเบียน</div>
            </div>

            <div class="conditions-list">
                <ul class="conditions-nav">
                    <li class="conditions-item">
                        <span class="text-list">1.</span> ต้องเป็นนักศึกษามหาวิทยาลัยรามคำแหงที่สอบผ่านกระบวนวิชา ECT1301 คอมพิวเตอร์เพื่อการเรียนการสอน
                        และมีคอมพิวเตอร์หรืออุปกรณ์ที่สามารถเข้าใช้งานเว็บฝึกอบรมผ่านระบบอินเทอร์เน็ตได้ สงวนสิทธิ์เฉพาะ
                        นักศึกษาระดับปริญญาตรีเท่านั้น
                    </li>
                </ul>
            </div>
            <div class="conditions-header">
                <div>ข้อตกลง / เงื่อนไข</div>
            </div>

            <div class="conditions-list">
                <ul class="conditions-nav">
                    <li class="conditions-item">
                        <span class="text-list">1.</span> การลงทะเบียนจะถูกจำกัดไว้เพียง 30 สิทธิ์ สำหรับผู้ที่ยืนยันสิทธิ์เรียบร้อยเท่านั้น
                    </li>
                    <li class="conditions-item">
                        <span class="text-list">2.</span> นักศึกษาที่ได้รับสิทธิ์ใช้งานเว็บฝึกอบรม จะได้รับสิทธิ์ การใช้งานในนามของผู้เข้าอบรม และต้องให้ความร่วมมือในการจัดการศึกษาวิจัย โดยดำเนินการใช้งานเว็บฝึกอบรมเป็นไปตามที่ระบบจัดเตรียมไว้ให้
                    </li>
                    <li class="conditions-item">
                        <span class="text-list">3.</span> นักศึกษาที่ได้รับสิทธิ์ใช้งานเว็บฝึกอบรมจะต้องเข้าร่วมกระบวนการศึกษาวิจัยโดยดำเนินการฝึกอบรมจนครบ 18 ชั่วโมง หรือ จบคอร์สสำหรับฝึกอบรมที่ระบบจัดเตรียมไว้ให้
                    </li>
                    <li class="conditions-item">
                        <span class="text-list">4.</span> เมื่อนักศึกษาเข้าร่วมการศึกษาวิจัยจนครบ 18 ชั่วโมง หรือ จบคอร์สฝึกอบรม ระบบจะปรับสิทธิ์ผู้ใช้งานเป็น ผู้ใช้งานทั่วไปและยังใช้งานเว็บฝึกอบรมได้ต่อไป จนกว่า เว็บฝึกอบรมจะมีการเปลี่ยนแปลง
                    </li>
                </ul>
            </div>
        </div>
        <!-- Conditions Stop -->
    </div>
</div>

@include('partials.auth_conditions')


