<nav class="main-header navbar navbar-expand navbar-white navbar-light">
   <ul class="navbar-nav">
      <li class="nav-item">
         <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
   </ul>
     
          <ul class="navbar-nav ml-auto">
     
      <li class="nav-item">
      </li>
      <li class="nav-item">
         <a class="nav-link" data-widget="fullscreen" href="#" role="button">
         <i class="fas fa-expand-arrows-alt"></i>
         </a>
      </li>
      <li class="nav-item dropdown">
         <a class="nav-link" data-toggle="dropdown" href="#">
            <img src="{{url('public/upload/default.jpg')}}" class="img-circle elevation-2" alt="{{Auth::user()->name}}" style="width: 35px">
         </a>
         <div class="dropdown-menu  dropdown-menu-right">           
           
            <a href="{{route('change-password')}}" class="dropdown-item"><i class="fas fa-key"></i> Changes Password</a>
            <a href="{{route('logout')}}" class="dropdown-item"><i class="fas fa-sign-out-alt"></i> Logout</a>
         </div>
      </li>
   </ul>
</nav>