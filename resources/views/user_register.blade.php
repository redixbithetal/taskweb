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
      <style type="text/css">
         .error{
         color:red;
         }
      </style>
   </head>
   <body class="hold-transition login-page">
      <div class="login-box">
         <div class="card card-outline card-primary">
            <div class="card-header text-center">
               <a href="{{route('login')}}" class="h1"><b>{{env('APP_NAME')}} </b></a>
            </div>
            <div class="card-body">
               <p class="login-box-msg">Sign in to start your session</p>
               <form id="form"  method="post" enctype="multipart/form-data">
                  {{csrf_field()}}
                  <div id="error"></div>
                  <div class="form-group">
                     <label for="name">Profile Image<span class="reqfield">*</span></label>
                     <div id="uploaded_image">
                        <div class="upload-btn-wrapper">
                           <button class="btn imgcatlog" type="button">
                           <img src="{{asset('public/upload/default.jpg')}}" alt="..." class="img-thumbnail imgsize"  id="basic_img" >
                           </button>
                           <input type="hidden" id="basic_img1"/>
                           <input type="file"  name="upload_image" accept="image/*" id="upload_image" />
                        </div>
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="fullname">Full Name<span class="reqfield">*</span></label>
                     <input type="text" class="form-control" name="fullname" id="fullname" placeholder="Enter fullname">
                  </div>
                  <div class="form-group">
                     <label for="useremail">Email<span class="reqfield">*</span></label>
                     <input type="email" class="form-control" name="email" id="email" placeholder="Enter email">        
                  </div>
                  <div class="form-group">
                     <label for="useremail">Gender<span class="reqfield">*</span></label>
                     <select id="gender" name="gender" class="form-control" >
                        <option value="">Select Gender</option>
                        <option>Male</option>
                        <option>Female</option>
                     </select>
                  </div>
                  <div class="form-group">
                     <label for="dob">Date Of Birth<span class="reqfield">*</span></label>
                     <input type="date" class="form-control" id="dob" name="dob" >
                  </div>
                  <div class="form-group">
                     <label for="dob">Anniversary Date</label>
                     <input type="date" class="form-control" id="anniversary_date" name="anniversary_date" >
                  </div>
                  <div class="form-group">
                     <label for="userpassword">Password<span class="reqfield">*</span></label>
                     <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">        
                  </div>
                  <div class="mt-3 text-right">
                     <button class="btn btn-primary w-sm waves-effect waves-light" type="submit" id="btn-submit">Register</button>
                  </div>
               </form>
               <p class="mb-0">
                  <a href="{{route('login')}}" class="text-center">Login</a>
               </p>
            </div>
         </div>
      </div>
      <script src="{{asset('public/admin_design/plugins/jquery/jquery.min.js')}}"></script>
      <script src="{{asset('public/admin_design/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
      <script src="{{asset('public/admin_design/dist/js/adminlte.min.js')}}"></script>
      <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
      <script type="text/javascript">
         $(document).ready(function () {
         $('#upload_image').on('change', function (e) {
         readURL(this, "basic_img");
         });
         });
         
         function readURL(input, field) {
         if (input.files && input.files[0]) {
         var reader = new FileReader();
         
         reader.onload = function (e) {
         $("#basic_img1").val(e.target.result);
         $('#' + field).attr('src', e.target.result);
         }
         reader.readAsDataURL(input.files[0]);
         }
         }
              $('document').ready(function()
               {
                   /* validation */
                   $("#form").validate({
                       rules:
                       {
                           fullname: {
                               required: true
                           },
                           email: {
                               required: true,
                               email: true
                           },
                           gender: {
                               required: true
                           },
                           dob: {
                               required: true
                           },
                           password: {
                               required: true,
                               minlength: 8,
                               maxlength: 15
                           },
                           upload_image: {
                               required: true
                           }
                       },
                       messages:
                       {
                           user_name: "Enter Your Full Name",
                           password:{
                               required: "Provide a Password",
                               minlength: "Password Needs To Be Minimum of 8 Characters"
                           },
                           email: "Enter a Valid Email",
                           gender: "Please Select Your Gender",
                           dob : "Select Your Dob"
                       }       
                   });    
               });
              $(document).ready(function(){
                $('#form').on('submit', function(event){
                     event.preventDefault();
                     $.ajax({
                      url:"{{ route('postregister') }}",
                      method:"POST",
                      data:new FormData(this),
                      dataType:'JSON',
                      contentType: false,
                      cache: false,
                      processData: false,
                      success:function(data)
                      {
                        if(data==0){
                           alert("Email Is Already Exists");
                        }else{
                           alert("Thanks For Registation");
                           window.location.reload();
                        }                          
                      }
                     })
                });
               });
      </script>
   </body>
</html>