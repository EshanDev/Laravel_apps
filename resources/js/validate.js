require('./bootstrap');

//Disable Enter Key
$('form').bind("keypress", function (e) {
    if(e.keyCode == 13){
        return false;
    }
});


// get base url
var getUrl = window.location;
var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
console.log("this is a "+baseUrl + "/verify_email");
// Validation
//For Conditions System.

const condition = document.getElementById('conditions_form');
$(condition).validate({
    rules: {
        student_code: {
            required: true,
            number: true,
            maxlength: 10,
            minlength: 10,
            remote:{
                url: baseUrl + "/verify_student_code",
                type: "get",
            }
        },
        student_email: {
            required: true,
            email: true,
            remote: {
                url: baseUrl + "/verify_email",
                type: "get",
            }
        }
    },
    messages: {
        student_code: {
            required: "กรุณากรอกรหัสนักศึกษา",
            number: "รูปแบบรหัสผ่านไม่ถูกต้อง",
            maxlength: "รูปแบบรหัสผ่านไม่ถูกต้อง",
            minlength: "รูปแบบรหัสผ่านไม่ถูกต้อง",
            remote: "รหัสนักศึกษานี้ได้ลงทะเบียนแล้ว",
        },
        student_email: {
            required: "กรุณากรอกที่อยู่อีเมล์",
            remote: "อีเมล์นี้ได้ลงทะเบียนไว้แล้ว",
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

