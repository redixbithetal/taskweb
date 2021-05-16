<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>{{env('APP_NAME')}}</title>
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
      <link rel="stylesheet" href="{{asset('public/admin_design/plugins/fontawesome-free/css/all.min.css')}}">
      <link rel="stylesheet" href="{{asset('public/admin_design/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
      <link rel="stylesheet" href="{{asset('public/admin_design/dist/css/adminlte.min.css')}}">
      <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.2.1/css/bootstrap.min.css">
   </head>
   <body class="hold-transition login-page">
      <div class="login-box">
         <div class="card card-outline card-primary">
            <div class="card-header text-center">
               <a href="{{route('login')}}" class="h1"><b>{{env('APP_NAME')}} </b></a>
            </div>
            <div class="card-body">
               <p class="login-box-msg">Sign in to start your session</p>
                <form action="{{route('postlogin')}}" method="post">
                  {{csrf_field()}}
                  <div class="input-group mb-3">
                     <input type="email" class="form-control" placeholder="Email" name="email" id="email" required="" value="{{isset($_COOKIE['email'])?$_COOKIE['email']:'admin@gmail.com'}}">
                     <div class="input-group-append">
                        <div class="input-group-text">
                           <span class="fas fa-envelope"></span>
                        </div>
                     </div>
                  </div>
                  <div class="input-group mb-3">
                     <input type="password" class="form-control" placeholder="Password" name="password" id="password" required="" value="{{isset($_COOKIE['password'])?$_COOKIE['password']:'admin@123'}}">
                     <div class="input-group-append">
                        <div class="input-group-text">
                           <span class="fas fa-lock"></span>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-8">
                        <div class="icheck-primary">
                           <?php $class= isset($_COOKIE['remember']) ? "checked" : ''; ?>
                           <input type="checkbox" id="remember" name="remember" value="1" >
                           <label for="remember" {{$class}}>
                           Remember Me
                           </label>
                        </div>
                     </div>
                     <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                     </div>
                     <p class="mb-0">
                       <a href="{{route('user_register')}}" class="text-center">Register a new User</a>
                     </p>
                  </div>
               </form>
            </div>
         </div>
      </div>
      <script src="{{asset('public/admin_design/plugins/jquery/jquery.min.js')}}"></script>
      <script src="{{asset('public/admin_design/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
      <script src="{{asset('public/admin_design/dist/js/adminlte.min.js')}}"></script>
   </body>
</html>