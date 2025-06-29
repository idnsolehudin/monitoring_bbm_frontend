<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Wings Corp | {{ $title }}</title>
    <link rel="icon" href="/images/wings-logo.png" type="image/x-icon">
    <!-- Bootstrap -->
    <link href="/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- NProgress -->
    <link href="/nprogress/nprogress.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="/build/css/custom.min.css" rel="stylesheet">
  </head>
 <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>
      
      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form action="{{ route('auth.login') }}" method="POST">
              <h1>Halaman Login</h1>
              @csrf
              <div class="mb-3">
                <input type="number" name="nik" class="form-control" placeholder="NIK" required="" style="-moz-appearance: textfield" />
                
              </div>
              <div>
                <input type="password" name="password" class="form-control" placeholder="Password" required="" />
              </div>
              <div>
                <button type="submit" class="btn btn-default btn-info">Log in</button>
                <a class="reset_pass" href="#">Lupa password?</a>
              </div>
            </form>
              <div class="clearfix"></div>
                 @if ($errors->has('login_error'))
                    <div style="color: red;">
                        {{ $errors->first('login_error') }}
                    </div>
                @endif
              <div class="separator">
                <p class="change_link">Belum Punya Akun
                  <a href="#signup" class="to_register"> Silakan Hubungi Admin </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><img src="/images/wings-logo.png" alt="" class="w-25"> Wings Corp</h1>
                  {{-- <p>©2025</p> --}}
                </div>
              </div>
           
         
          </section>
        </div>
      </div>
    </div>
  </body>
</html>