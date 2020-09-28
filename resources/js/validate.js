require('./bootstrap');


// Custom Function.

// Validation
//For Conditions System.

const condition = document.getElementById('conditions_form');
$(condition).validate({
    rules: {
        student_code: {
            required: true,
            number: true,
            maxlength: 10,
        },
        student_email: {
            required: true,
            email: true,
        }
    },
    messages: {
        student_code: {
            required: "กรุณากรอกรหัสนักศึกษา",
            number: "รูปแบบรหัสผ่านไม่ถูกต้อง",
            maxlength: "รูปแบบรหัสผ่านไม่ถูกต้อง",
        },
        student_email: {
            required: "กรุณากรอกที่อยู่อีเมล์",
        },


    },

});



// Validator for registration system
const registration = document.getElementById('registration_form');
$(registration).validate({
    rules: {
        student_code: {
            required: true,
        },
        student_email: {
            required: true,
        },
        student_name: {
            required: true,
        },
        student_branch: {
            required: true,
        },
        student_faculty: {
            required: true,
        },
        password: {
            required: true,
        },

        password_confirmation: {
            required: true,
            equalTo: "#password",
        },

        registration_code: {
            required: true,
        },
        name: {
            required: true,
        },
    },
    messages: {
        student_name: {
            required: "กรุณากรอกข้อมูล",
        },
        student_branch: {
            required: "กรุณากรอกข้อมูล",
        },
        student_faculty: {
            required: "กรุณากรอกข้อมูล",
        },
        password: {
            required: "กรุณาระบุรหัสผ่าน",
        },

        password_confirmation: {
            required: "ระบุรหัสผ่านอีกครั้ง",
            equalTo: "รหัสผ่านไม่ตรงกัน",
        },
        registration_code: {
            required: "กรุณากรอกรหัสลงทะเบียน",
        },
        student_email: {
            required: "กรุณากรอกอีเมล์",
        },
        student_code: {
            required: "กรุณากรอกรหัสนักศึกษา",
        },
        name: {
            required: "กรุณาตั้งชื่อผู้ใช้งาน",
        },
    }
});

