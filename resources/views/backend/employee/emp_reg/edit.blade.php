@extends('admin.admin_master')
@section('admin')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <div class="container-full">
      <section class="content">
         <!-- Basic Forms -->
         <div class="box">
            <div class="box-header with-border">
               <h4 class="box-title">Edit Employee</h4>
               
            </div>
            <!-- /.box-header -->
            <div class="box-body">
               <div class="row">
                  <div class="col">
                     <form method="post" action="{{ route('employee.registration.update',$editData->id)}} " enctype="multipart/form-data">
                         @csrf
                        <div class="row">
                           <div class="col-12">
                                <div class="row">
                                    
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>Employee Name <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="name" class="form-control" value="{{ $editData->name}}" autocomplete="off"> 
                                            @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                       <div class="form-group">
                                           <h5>Father's Name <span class="text-danger">*</span></h5>
                                           <div class="controls">
                                               <input type="text" name="fname" value="{{ $editData->fname}}" class="form-control" autocomplete="off"> 
                                           @error('name')
                                           <span class="text-danger">{{ $message }}</span>
                                           @enderror
                                           </div>
                                       </div>
                                   </div>
                                   <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Mother's Name <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="mname" value="{{ $editData->mname}}" class="form-control" autocomplete="off"> 
                                        @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        </div>
                                    </div>
                                 </div>
                                </div>
                                <div class="row">
                                    
                                 <div class="col-md-4">
                                     <div class="form-group">
                                         <h5>Mobile Number <span class="text-danger">*</span></h5>
                                         <div class="controls">
                                             <input type="text" name="mobile" value="{{ $editData->mobile}}" class="form-control" autocomplete="off"> 
                                         @error('name')
                                         <span class="text-danger">{{ $message }}</span>
                                         @enderror
                                         </div>
                                     </div>
                                 </div>
                                 <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Address <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="address" value="{{ $editData->address}}" class="form-control" autocomplete="off"> 
                                        @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                 <div class="form-group">
                                     <h5>Gender <span class="text-danger">*</span></h5>
                                     <div class="controls">
                                       <select name="gender" id="gender" required class="form-control">
                                          <option value="" selected="" disabled>Select Gender</option>
                                          <option value="Male" {{ $editData->gender == 'Male' ? 'selected' : ''}}>Male</option>
                                          <option value="Female" {{ $editData->gender == 'Female' ? 'selected' : ''}}>Female</option>
                                          <option value="Others" {{ $editData->gender == 'Others' ? 'selected' : ''}}>Others</option>
                                      </select>
                                     
                                     </div>
                                 </div>
                              </div>
                             </div>
                             <div class="row">
                                    
                              <div class="col-md-4">
                                  <div class="form-group">
                                      <h5>Religion <span class="text-danger">*</span></h5>
                                      <div class="controls">
                                          <input type="text" name="religion" value="{{ $editData->religion}}" class="form-control" autocomplete="off"> 
                                      
                                      </div>
                                  </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                     <h5>Date Of Birth <span class="text-danger">*</span></h5>
                                     <div class="controls">
                                         <input type="date" name="dob" value="{{ $editData->dob}}" class="form-control" autocomplete="off"> 
                                     
                                     </div>
                                 </div>
                             </div>
                             <div class="col-md-4">
                              <div class="form-group">
                                  <h5>Designation <span class="text-danger">*</span></h5>
                                  <div class="controls">
                                    <select name="designation_id" required class="form-control">
                                       <option value="" selected="" disabled>Select Designation</option>
                                       @foreach ($designation as $design)
                                       <option value="{{ $design->id }}" {{ ($editData->designation_id == $design->id) ? 'selected': '' }}>{{ $design->name }}</option>  
                                       @endforeach
                                    </select>
                                  </div>
                              </div>
                           </div>
                          </div>
                          <div class="row">
                           @if (!@editData)
                           <div class="col-md-3">
                               <div class="form-group">
                                   <h5>Salary <span class="text-danger">*</span></h5>
                                   <div class="controls">
                                    <input type="text" name="salary" value="{{ $editData->salary}}" class="form-control" autocomplete="off"> 
                                   </div>
                               </div>
                           </div>
                           <div class="col-md-3">
                              <div class="form-group">
                                  <h5>Joining Date <span class="text-danger">*</span></h5>
                                  <div class="controls">
                                    <input type="date" name="join_date" value="{{ $editData->join_date}}" class="form-control" autocomplete="off"> 
                                  </div>
                              </div>
                          </div>
                          @endif
                          <div class="col-md-3">
                              <div class="form-group">
                                 <h5>Upoload Image <span class="text-danger">*</span></h5>
                                 <div class="controls">
                                    <input type="file" name="image"  class="form-control" id="getImage" > 
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-3">
                              <div class="form-group">
                                 <div class="controls">
                                    <img id="showImage" src="{{ (!empty($editData->image)) ? url('upload/employee_images/'.$editData->image): url('upload/images/blank-profile-picture.png') }}" style="height:100px; width:100px; border:1px solid #000;">
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