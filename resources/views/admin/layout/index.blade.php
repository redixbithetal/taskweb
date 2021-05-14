<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>@yield('title')</title>
      @yield('meta-data')
      @include('admin.layout.header_link')
      <input type="hidden" name="url_path" id="url_path" value="{{url('/')}}">
      <style type="text/css">
         .row{
               display: flex;
               justify-content: center;
         }
         .reqfield{
            color: red;
         }
      </style>
   </head>
   <body class="hold-transition sidebar-mini layout-fixed">
      <div class="wrapper">
         @include('admin.layout.top_menu')
         @include('admin.layout.side_menu')
         @yield('content')
         <footer class="main-footer">
            <strong>Copyright &copy; {{date('Y')}} <a href="{{route('dashboard')}}">{{env('APP_NAME')}}</a>.</strong>
           All rights reserved
         </footer>
         <aside class="control-sidebar control-sidebar-dark">
         </aside>
      </div>
      <input type="hidden" name="url_path" id="url_path" value="{{url('/')}}">
      @include('admin.layout.footer_script')
      @yield('footer')
   </body>
</html>