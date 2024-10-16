<!-- <x-message-banner /> -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="shortcut icon" href="{{asset('storage/favicon.ico') }}">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" />

</head>

<body>
    <div class="container" id="main">
        <div class="col-md-4 offset-md-4">
            <form method="post" action="login" id="login">
                @csrf
                    
                @if (Session('msg'))
                    <div class="alert alert-danger">
                        <strong>{{Session('error')}}</strong>
                    </div>
                @endif
                <div class="row">
                    <div class="col-md-12">
                        <img src="{{asset('storage/logo(b).png') }}" alt="">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-10 offset-md-1">
                        <i id="person" class="ri-user-fill"></i>
                        <input class="box" type="text" id="username" name="username" placeholder="Enter Username"
                            required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-10 offset-md-1">
                        <i id="lock" class="ri-lock-fill"></i>
                        <input class="box" type="password" id="password" name="password" placeholder="Enter password"
                            required><br>
                    </div>
                </div>
                <button>Login</button>

            </form>
        </div>
    </div>
</body>

</html>