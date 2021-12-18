
<html>
<head>
    <title>Thrive</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600&display=swap"
          rel="stylesheet">
    <link rel="stylesheet" href="{{asset('website/css/login.css')}}">
</head>
<body>
<div class="wrapper fadeInDown"
     style="background-color:aliceblue; background-size: cover">
    <form method="post" action="{{ route('register') }}" enctype="multipart/form-data">
        @csrf
        <div id="formContent">
            <!-- Tabs Titles -->

            <!-- Icon -->
            <div class="fadeIn first">
                <img src="{{asset('website/images/ui/logo@2x.png')}}"
                     style="width: 7em;margin-top: 2em; margin-bottom: 2em" id="icon" alt="User Icon"/>
            </div>


            <p align="middle" style="font-size: 1em;font-family: 'Montserrat"> Join our growing community</p>
            <hr/>
            <!-- Login Form -->
            @if(Session::has('successmessage'))
                <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('successmessage') }}</p>
            @endif
            @if(Session::has('errors'))
                <div class="alert alert-danger">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Error!</strong> {{ $errors->first() }}
                </div>
            @endif
            @csrf
            <label for="avatar">Enter Full Name</label>
            <input required type="text" id="login" class="fadeIn second" name="name" value="{{old('name')}}"
                   placeholder="">
            <br/>
            <br/>

            <label for="avatar">Enter Email</label>
            <input required type="email" id="login" class="fadeIn second" name="email" value="{{old('email')}}"
                   placeholder="">
            <br/>
            <br/>

            <label for="avatar">Enter Phone</label>
            <input required type="number" id="login" class="fadeIn second" name="phone_number" value="{{old('phone_number')}}"
                   placeholder="">
            <br/>
            <br/>

            <label for="avatar">Enter Password</label>
            <input required type="password" id="password" class="fadeIn third" name="password" value="{{old('password')}}"
                   placeholder="">
            <br/>
            <br/>

            <label for="avatar">Enter Confirm Password</label>
            <input required type="password" id="password" class="fadeIn third" name="password_confirmation" value="{{old('password_confirmation')}}"
                   placeholder="">
            <br/>
            <br/>

            <input type="hidden" name="role_id" value="3">


            <div id="avatar">
                <label for="avatar">Upload Profile Picture</label>
                <input required type="file" id="avatar" class="fadeIn second" name="avatar">
            </div>
            <br/>
            <br/>

            <input type="submit" class="fadeIn fourth" value="REGISTER">

            <!-- Remind Password -->
            <div id="formFooter">
                <a class="underlineHover" href="{{route('register')}}">Become an Customer</a><br>
                <hr/>
                <a class="underlineHover" href="{{route('login')}}">I have an account</a><br>
                <hr/>
                <a class="underlineHover" href="/">Back to Website</a>
            </div>


        </div>


    </form>
</div>
<script src="https:////cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js"
        integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js"
        integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG"
        crossorigin="anonymous"></script>

</body>
</html>
