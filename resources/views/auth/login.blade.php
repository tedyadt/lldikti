<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Log In</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,400i,600,700,800,900" rel="stylesheet">
    <link href="{{ asset('dist-assets/css/themes/lite-blue.min.css') }}" rel="stylesheet">

    <link rel="icon" href="{{ asset('dist-assets/images/logo.png') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('dist-assets/images/logo.png') }}" type="image/x-icon">

</head>
<div class="auth-layout-wrap" style="background-image: url(../../dist-assets/images/photo-wide-4.jpg)">
    <div class="auth-content">
        <div class="card o-hidden">
            <div class="row">
                <div class="col-md-6">
                    <div class="p-4">
                        <div class=" text-center mb-4" ><img src="{{ asset('dist-assets/images/logo.png') }}" style="height: 100px" alt=""></div>
                        <h1 class=" text-center mb-2 text-17">Welcome to LLDIKTI VII <br> Sign in to Your Account</h1>
                        <form method="post" action="{{ route('login') }}" >
                            @csrf
                            <div class="form-group">
                                <label for="email">NIP</label>
                                <input class="form-control form-control-rounded" id="email" type="email" name="email">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input class="form-control form-control-rounded" id="password" type="password" name="password">
                            </div>
                            <button class="btn btn-rounded btn-primary btn-block mt-2">Log In</button>
                        </form>
                       
                    </div>
                </div>
                <div class="col-md-6 text-center" style="background-size: cover;background-image: url(../../dist-assets/images/photo-long-3.jpg)">
                    
                </div>
            </div>
        </div>
    </div>
</div>