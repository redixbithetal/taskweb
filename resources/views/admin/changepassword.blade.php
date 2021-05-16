@extends('admin.layout.index')
@section('title')
Change Password
@stop
@section('meta-data')
@stop
@section('content')
<div class="content-wrapper">
   <div class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1 class="m-0">Change Password</h1>
            </div>
            <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active">Change Password</li>
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
                     <h3 class="card-title">Change Password</h3>
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
                    <form action="{{route('update-change-password')}}" method="post">
                      {{csrf_field()}}
                     
                     <div class="form-group">
                        <label for="name">Current Password<span class="reqfield">*</span></label>
                        <input type="password" id="cpwd" name="cpwd" class="form-control" required="" placeholder="****" onchange="checkcurrentpwd(this.value)">
                     </div>
                     <div class="form-group">
                        <label for="name">New Password<span class="reqfield">*</span></label>
                        <input type="password" id="npwd" name="npwd" class="form-control" required="" placeholder="****">
                     </div>
                     <div class="form-group">
                        <label for="name">Re-Enter Password<span class="reqfield">*</span></label>
                        <input type="password" id="renpwd" name="renpwd" class="form-control" required="" placeholder="****" onchange="checkbothpassword(this.value)">
                     </div>
                     <div class="row">
                        <div class="col-12"> 
                           <input type="submit" value='Update Password' class="btn btn-success float-right">
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