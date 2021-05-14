@extends('admin.layout.index')
@section('title')
Users
@stop
@section('meta-data')
@stop
@section('content')
<div class="content-wrapper">
   <div class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1 class="m-0">Users</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                  <li class="breadcrumb-item active">Users</li>
               </ol>
            </div>
         </div>
      </div>
   </div>
   <section class="content">
      <div class="container-fluid">
         <div class="row">
            <div class="col-12">
               <div class="card">
                  <div class="card-header">
                     <h3 class="card-title">Users</h3>
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
                     <div class="row">
                         <button type="button" onclick="actionuser('1')" class="btn btn-success" style="margin-right: 10px;float: left">Accept</button>
                         <button type="button" onclick="actionuser('2')" class="btn btn-danger">Reject</button>
                     </div>
                       <div class="table-responsive">
                     <table id="UsersTable" class="table table-bordered table-hover">
                        <thead>
                           <tr>
                              <th> <input name="select_all" value="1" id="select-all" type="checkbox" onchange="allselect('related')" /></th>
                              <th>Image</th>
                              <th>Full Name</th>
                              <th>Email</th>
                              <th>Gender</th>
                              <th>DOB</th>
                              <th>Status</th>
                           </tr>
                        </thead>
                        <tbody>
                        </tbody>
                        <tfoot>
                           <tr>
                              <th></th>
                              <th>Image</th>
                              <th>Full Name</th>
                              <th>Email</th>
                              <th>Gender</th>
                              <th>DOB</th>
                              <th>Status</th>
                           </tr>
                        </tfoot>
                     </table>
                  </div>
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