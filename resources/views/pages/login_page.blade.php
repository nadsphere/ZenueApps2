@extends('layout.app')
@section('content')
<body>
<main class="main_log">
        <div class="container conts">
            <div class="signup-content">
                <form method="POST" id="signup-form" class="form-signin">
                  <!--  -->
                  <h2 class="form-title">Login</h2>
                  <br/>
                  <div class="form-label-group">
                      <input type="text" id="inputEmail" class="form-input form-control" placeholder="Email address" required autofocus>
                      <label for="inputEmail"><i class="fa fa-envelope"></i> Email/Username</label>
                  </div>
              
                  <div class="form-label-group">
                      <input type="password" id="inputPassword" class="form-input form-control" placeholder="Password" required>
                      <label for="inputPassword"><i class="fa fa-lock"></i> Password</label>
                  </div>

                  <div class="form-group">
                      <p class="term-service">
                        <a href="#" class="term-service-link">Lupa Password?</a>
                      </p>
                  </div>
                  <div class="form-group">
                      <input type="submit" name="submit" id="submit" class="form-submit" value="Masuk"/>
                  </div>                                       
                </form>
                <p class="loginhere">
                    Belum Punya Akun?<a href="register" class="loginhere-link"> Daftar di Sini</a>
                </p>                                        
            </div>
        </div>
    </main>
</body>
</html>
@endsection
