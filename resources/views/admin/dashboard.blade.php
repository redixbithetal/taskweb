@extends('admin.layout.index')
@section('title')
Dashboard
@stop
@section('meta-data')
@stop
@section('content')
<div class="content-wrapper">
   <div class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1 class="m-0">Dashboard</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                  <li class="breadcrumb-item active">Dashboard</li>
               </ol>
            </div>
         </div>
      </div>
   </div>
   <section class="content">
      <div class="container-fluid">
         <div class="row">
                 <div class="col-md-3 col-sm-6 col-12">
                     <div class="info-box">
                        <span class="info-box-icon bg-warning"><i class="fab fa-user"></i></span>
                        <div class="info-box-content">
                           <span class="info-box-text">Total User</span>
                           <span class="info-box-number">{{$total_users}}</span>
                        </div>
                        <!-- /.info-box-content -->
                     </div>
                     <!-- /.info-box -->
                  </div>
                 
         </div>
      </div>
   </section>
</div>
@stop
@section('footer')
@stop