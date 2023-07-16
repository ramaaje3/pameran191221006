<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental - login</title>

    <link rel="stylesheet" href="css/login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">    <!--Replace with your tailwind.css once created-->
    <script src="https://kit.fontawesome.com/3107302f4a.js" crossorigin="anonymous"></script>

    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Arvo&family=Josefin+Sans:wght@600&family=Karla:wght@500&family=Lobster&family=Overpass:wght@300&display=swap" rel="stylesheet">

    <link href="{{ asset('img/logo.webp') }}" rel="icon" type="image/webp">
</head>
<body>
    @if ($errors->any())
        <div class="alert alert-danger border-left-danger" role="alert">
            <ul class="pl-4 my-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <img class="wave" src="img/Mentahan.png" alt="">
    <div class="row container">
        <div class="col img">
            <img src="img/washh.png" alt="" width="700">
        </div>
        <div class="col form">
            <form method="POST" action="{{ route('login') }}" class="container" >
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <img class="avatar" src="img/mobil1.webp" alt="wash">
                <h2>Reminder</h2>
                <div class="input-div one">
                    <div class="i">
                        <i class="fa fa-user"></i>
                    </div>
                    <div>
                        <h5>Email</h5>
                        <input class="input" type="text" name="email" value="{{ old('email') }}" required autofocus>
                    </div>
                </div>
                <div class="input-div two">
                    <div class="i">
                        <i class="fa fa-lock"></i>
                    </div>
                    <div>
                        <h5>Password</h5>
                        <input class="input" type="password" name="password" required>
                    </div>
                </div>
                <button type="submit" class="tombol shadow">             
                {{ __('Login') }}
                </button>
            </form>
        </div>
    </div>

    <script>
        const inputs = document.querySelectorAll('.input');

        function focusFunc(){
            let parent = this.parentNode.parentNode;
            parent.classList.add('focus');
        }

        function blurFunc(){
            let parent = this.parentNode.parentNode;
            if(this.value == ""){
                parent.classList.remove('focus');
            }
        }

        inputs.forEach(input => {
            input.addEventListener('focus', focusFunc);
            input.addEventListener('blur', blurFunc);
        });
    </script>
</body>
</html>