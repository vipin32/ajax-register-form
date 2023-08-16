<!DOCTYPE html>
<html>
<head>
    <title>User Registration</title>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>
        body {
            background-color: #0a192f;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            max-width: 400px;
            padding: 20px;
            background-color: #1a1f36;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #66d9ef;
        }
        .form-group label {
            color: #c0c5ce;
        }
        .form-control {
            background-color: #313640;
            color: #c0c5ce;
            border-color: #313640;
        }
        .form-control:focus {
            background-color: #262b33;
            border-color: #262b33;
            color: #c0c5ce;
        }
        .btn-primary {
            background-color: #66d9ef;
            border-color: #66d9ef;
        }
        .btn-primary:hover {
            background-color: #40c4d6;
            border-color: #40c4d6;
        }

        .message {
            margin-top: 10px;
            padding: 10px;
            border-radius: 5px;
            font-weight: bold;
        }
        .success {
            background-color: #4caf50;
            color: #fff;
        }
        .error {
            background-color: #f44336;
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>User Registration</h2>
        <form id="registration-form">
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" name="name" placeholder="Enter your name" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" name="email" placeholder="Enter your email" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" name="password" placeholder="Enter a password" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Register</button>
        </form>

        <div id="message" class="text-center mt-3"></div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


    <script>
        $(document).ready(function(){
            $('#registration-form').submit(function(e){

                e.preventDefault();
                
                var formData = $(this).serialize();
                
                $.ajax({
                    type: 'POST',
                    url: "{{route('register')}}",
                    data: formData,
                    success: function(response){

                        $('#message').html(response.message).removeClass().addClass('message success');
                    },
                    error: function(response){
                        var errors = response.responseJSON.errors;
                        var errorHtml = '<ul>';
                        $.each(errors, function(key, value){
                            errorHtml += '<li>' + value + '</li>';
                        });
                        errorHtml += '</ul>';
                        $('#message').html(errorHtml).removeClass().addClass('message error');
                    }
                });
            });
        });
    </script>
</body>
</html>
