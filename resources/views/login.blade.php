<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{asset('login-assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('login-assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('login-assets/css/style.css')}}">
    <title>Giriş Yap | Laravel Demo Muhasebe Programı</title>
  </head>
  <body>


  <div class="d-lg-flex half">
    <div class="bg order-1 order-md-2" style="background-image: url('{{asset('login-assets/images/bg_1.jpg')}}');"></div>
    <div class="contents order-2 order-md-1">
      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-7">
            <h3>Giriş Yap <strong>| Laravel Demo Muhasebe Programı</strong></h3>
            <p class="mb-4"><b>Giriş Bilgileri</b> <br> Email : selimcangursu@demo.com <br> Şifre : muhasebe123</p>
            <form action="/login" method="post">
                @csrf
              <div class="form-group first">
                <label for="username">Username</label>
                <input type="text" class="form-control" placeholder="selimcangursu@demo.com" id="email" name="email">
              </div>
              <div class="form-group last mb-3">
                <label for="password">Password</label>
                <input type="password" class="form-control" placeholder="********" id="password" name="password">
              </div>
              <div class="d-flex mb-5 align-items-center">
                <label class="control control--checkbox mb-0"><span class="caption">Beni Hatırla</span>
                  <input type="checkbox" checked="checked"/>
                  <div class="control__indicator"></div>
                </label>
                <span class="ml-auto"><a href="#" class="forgot-pass">Şifremi Unuttum</a></span>
              </div>
              <button type="submit" class="btn btn-primary w-100">Giriş Yap</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
    <script src="{{asset('login-assets/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('login-assets/js/popper.min.js')}}"></script>
    <script src="{{asset('login-assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('login-assets/js/main.js')}}"></script>

  </body>
</html>
