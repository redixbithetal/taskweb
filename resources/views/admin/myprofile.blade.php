@extends('admin.layout.index')
@section('title')
My Profile
@stop
@section('meta-data')
@stop
@section('content')
<div class="content-wrapper">
   <div class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1 class="m-0">My Profile</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                  <li class="breadcrumb-item active">My Profile</li>
               </ol>
            </div>
         </div>
      </div>
   </div>
   <section class="content">
      <div class="container-fluid">
         <div class="row">
            <div class="col-md-6">
               <div class="card card-primary">
                  <div class="card-header">
                     <h3 class="card-title">My Profile</h3>
                  </div>
                  <div class="card-body">
                     @if(Session::has('message'))
                     <div class="col-sm-12">
                        <div class="alert  {{ Session::get('alert-class', 'alert-info') }} alert-dismissible fade show" role="alert">{{ Session::get('message') }}
                           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                           </button>
                        </div>
                     </div>
                     @endif
                     <form action="{{route('update-profile')}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group">
                           <label for="name">Name <span class="reqfield">*</span></label>
                           <input type="text" id="name" name="name" class="form-control" required="" value="{{Auth::user()->name}}">
                        </div>
                        <div class="form-group">
                           <label for="name">Email <span class="reqfield">*</span></label>
                           <input type="email" id="email" name="email" class="form-control" required="" value="{{Auth::user()->email}}">
                        </div>
                        <div class="form-group">
                           <label for="name">Profile Image<span class="reqfield">*</span></label>
                           <div id="uploaded_image">
                              <div class="upload-btn-wrapper">
                                 <button class="btn imgcatlog">
                                 <?php 
                                    if(isset(Auth::user()->profile_pic)&&Auth::user()->profile_pic!=""){
                                        $path=url("storage/app/public/profile")."/".Auth::user()->profile_pic;
                                    }
                                    else{
                                        $path=asset('public/upload/default.jpg');
                                    }
                                    ?>
                                 <img src="{{$path}}" alt="..." class="img-thumbnail imgsize"  id="basic_img" >
                                 </button>
                                 <input type="hidden" id="basic_img1"/>
                                 @if(isset(Auth::user()->profile_pic))
                                 <input type="file" name="upload_image" id="upload_image" />
                                 @else
                                 <input type="file" required="" name="upload_image" id="upload_image" />
                                 @endif
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-12">
                                <input type="submit" value='Save profile' class="btn btn-success float-right">
                           </div>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
</div>
@stop
@section('footer')
@stop