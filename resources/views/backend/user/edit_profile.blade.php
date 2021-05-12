@extends('admin.admin_master')
@section('admin')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <div class="container-full">
      <section class="content">
         <!-- Basic Forms -->
         <div class="box">
            <div class="box-header with-border">
               <h4 class="box-title">Manage Profile</h4>
               
            </div>
            <!-- /.box-header -->
            <div class="box-body">
               <div class="row">
                  <div class="col">
                     <form method="post" action="{{ route('profile.store') }}" enctype="multipart/form-data">
                         @csrf
                        <div class="row">
                           <div class="col-12">
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h5>User Name <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="name" value="{{ $get_user_details->name}}" class="form-control" autocomplete="off" required data-validation-required-message="This field is required"> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                            <h5>User Email <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="email" name="email" value="{{ $get_user_details->email}}" class="form-control" autocomplete="off" required data-validation-required-message="This field is required"> 
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h5>User Phone <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="mobile" value="{{ $get_user_details->mobile}}" class="form-control" autocomplete="off" required data-validation-required-message="This field is required"> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                            <h5>User Address <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="address" value="{{ $get_user_details->address}}" class="form-control" autocomplete="off" required data-validation-required-message="This field is required"> 
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <h5>User Gender <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select name="gender" id="gender" required class="form-control">
                                                    <option value="" selected="" disabled>Select Role</option>
                                                    <option value="male" {{ ($get_user_details->gender == "male" ? "selected" : "") }}>male</option>
                                                    <option value="female" {{ ($get_user_details->gender == "female" ? "selected" : "") }}>female</option>
                                                </select>
                                            </div>
                                          </div>
                                       </div>
      
                                    <div class="col-md-6">
                                       <div class="form-group">
                                            <h5>User Image <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="file" name="image"  class="form-control" id="getImage"> 
                                            </div>
                                        </div>
                                       <div class="form-group">
                                          <div class="controls">
                                          <img id="showImage" src="{{ (!empty($get_user_details->image)) ? url('upload/images/'.$get_user_details->image): url('upload/images/blank-profile-picture.png') }}" style="height:100px; width:100px; border:1px solid #000;">
                                          </div>
                                       </div>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
   $(document).ready(function(){
      $('#getImage').change( function(e){
         var reader = new FileReader();
         reader.onload = function(e){
            $('#showImage').attr('src', e.target.result);
         }
         reader.readAsDataURL(e.target.files['0']);
      });

   });
</script>



@endsection