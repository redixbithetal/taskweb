<aside class="main-sidebar sidebar-dark-primary elevation-4">
   <a href="{{route('dashboard')}}" class="brand-link">
   <img src="{{asset('public/admin_design/dist/img/AdminLTELogo.png')}}" alt="{{env('APP_NAME')}}" class="brand-image img-circle elevation-3" style="opacity: .8">
   <span class="brand-text font-weight-light">{{env('APP_NAME')}}</span>
   </a>
   <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
         <div class="image">
            <img src="{{url('storage/app/public/profile').'/'.Auth::user()->profile_pic}}" class="img-circle elevation-2" alt="">
         </div>
         <div class="info">
            <a href="{{route('dashboard')}}" class="d-block">{{Auth::user()->fullname}}</a>
         </div>
      </div>
      <nav class="mt-2">
         <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" id="sidemenu" data-accordion="false">
            <li class="nav-item">
               <a href="{{route('dashboard')}}" class="nav-link" id="dashboard">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                     Dashboard
                  </p>
               </a>
            </li>
            
           <li class="nav-item">
               <a href="{{route('users')}}" class="nav-link" id="users">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                     Users
                  </p>
               </a>
            </li>
            <li class="nav-item">
               <a href="{{route('birthday')}}" class="nav-link" id="birthday">
                  <i class="nav-icon fas fa-gift"></i>
                  <p>
                     Brithday
                  </p>
               </a>
            </li>
            <li class="nav-item">
               <a href="{{route('anniversary')}}" class="nav-link" id="anniversary">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                     Anniversary
                  </p>
               </a>
            </li>
           
         </ul>
      </nav>
   </div>
</aside>