<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Test Remote</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <script src="{{asset('js/app.js')}}"></script>
</head>
<body>
<div id="app" class="container">
    <h1 class="text-center">Test Remote validate</h1>
    <form action="#" id="form">
        @csrf
        <div class="form-group">
            <label for="student_email">Email</label>
            <input type="email" name="student_email" class="form-control">
        </div>
        <div class="form-group">
            <button class="btn btn-success btn-lg" type="submit">Test</button>
        </div>
    </form>
</div>

<script>
    jQuery('#form').validate({
        rules: {
            student_email: {
                required: true,

                remote: {
                    url: "{{route('test.remote.post')}}",
                    type: "POST",

                    data: {
                        _token: function () {
                            return "{{csrf_token()}}"
                        }
                    }
                },
                messages: {
                    student_email: {
                        remote: "OK"
                    }
                }

            }
        }
    })
</script>
</body>
</html>
