@extends('admin.admin_master')
@section('admin')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <div class="container-full">
      <section class="content">
         <!-- Basic Forms -->
         <div class="box">
            <div class="box-header with-border">
               <h4 class="box-title">Update User</h4>
               
            </div>
            <!-- /.box-header -->
            <div class="box-body">
               <div class="row">
                  <div class="col">
                     <form method="post" action="{{ route('user.update',$get_user_details->id) }}">
                         @csrf
                        <div class="row">
                           <div class="col-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h5>User Role <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select name="user_type" id="user_type" required class="form-control">
                                                    <option value="" selected="" disabled>Select Role</option>
                                                    <option value="Admin" {{ ($get_user_details->user_type == "Admin" ? "selected" : "") }}>Admin</option>
                                                    <option value="User" {{ ($get_user_details->user_type == "User" ? "selected" : "") }}>User</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h5>User Name <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="name" value="{{ $get_user_details->name}}" class="form-control" autocomplete="off" required data-validation-required-message="This field is required"> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h5>User Email <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="email" name="email" value="{{ $get_user_details->email}}" class="form-control" autocomplete="off" required data-validation-required-message="This field is required"> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        
                                    </div>
                                </div>
                              
                        <div class="text-xs-right">
                           <input type="submit" class="btn btn-rounded btn-info" value="Update">
                        </div>
                     </form>
                  </div>
                  <!-- /.col -->
               </div>
               <!-- /.row -->
            </div>
            <!-- /.box-body -->
         </div>
         <!-- /.box -->
      </section>
      <!-- /.content -->
   </div>
</div>



@endsection