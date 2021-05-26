@extends('admin.admin_master')
@section('admin')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <div class="container-full">
      <section class="content">
         <!-- Basic Forms -->
         <div class="box">
            <div class="box-header with-border">
               <h4 class="box-title">Edit Student</h4>
               
            </div>
            <!-- /.box-header -->
            <div class="box-body">
               <div class="row">
                  <div class="col">
                     <form method="post" action="{{ route('student.registration.update',$editData->student_id) }}" enctype="multipart/form-data">
                         @csrf
                         <input type="hidden" name="id" value="{{ $editData->id}}">
                        <div class="row">
                           <div class="col-12">
                                <div class="row">
                                    
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>Student Name <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="name" value="{{ $editData['student']['name'] }}" class="form-control" autocomplete="off"> 
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
                                               <input type="text" name="fname" value="{{ $editData['student']['fname'] }}"  class="form-control" autocomplete="off"> 
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
                                            <input type="text" name="mname" value="{{ $editData['student']['mname'] }}" class="form-control" autocomplete="off"> 
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
                                             <input type="text" name="mobile" value="{{ $editData['student']['mobile'] }}" class="form-control" autocomplete="off"> 
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
                                            <input type="text" name="address" value="{{ $editData['student']['address'] }}" class="form-control" autocomplete="off"> 
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
                                          <option value="Male" {{ ($editData['student']['gender'] == 'Male') ? 'selected' : '' }}>Male</option>
                                          <option value="Female" {{ ($editData['student']['gender'] == 'Female') ? 'selected' : '' }}>Female</option>
                                          <option value="Others" {{ ($editData['student']['gender'] == 'Others') ? 'selected' : '' }}>Others</option>
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
                                          <input type="text" name="religion" value="{{ $editData['student']['religion'] }}" class="form-control" autocomplete="off"> 
                                      
                                      </div>
                                  </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                     <h5>Date Of Birth <span class="text-danger">*</span></h5>
                                     <div class="controls">
                                         <input type="date" name="dob" value="{{ $editData['student']['dob'] }}" class="form-control" autocomplete="off"> 
                                     
                                     </div>
                                 </div>
                             </div>
                             <div class="col-md-4">
                              <div class="form-group">
                                  <h5>Discount <span class="text-danger">*</span></h5>
                                  <div class="controls">
                                    <input type="text" name="discount" value="{{ $editData['discount']['discount'] }}" class="form-control" autocomplete="off"> 
                                  
                                  </div>
                              </div>
                           </div>
                          </div>
                          <div class="row">
                                    
                           <div class="col-md-4">
                               <div class="form-group">
                                   <h5>Class <span class="text-danger">*</span></h5>
                                   <div class="controls">
                                    <select name="class_id" required class="form-control">
                                       <option value="" selected="" disabled>Select Class</option>
                                       @foreach ($class as $each_class)
                                       <option value="{{ $each_class->id }}" {{ ($editData->class_id == $each_class->id) ? 'selected' : '' }}>{{ $each_class->name }}</option>  
                                       @endforeach
                                       
                                    </select>
                                   
                                   </div>
                               </div>
                           </div>
                           <div class="col-md-4">
                              <div class="form-group">
                                  <h5>Year <span class="text-danger">*</span></h5>
                                  <div class="controls">
                                    <select name="year_id" required class="form-control">
                                       <option value="" selected="" disabled>Select Year</option>
                                       @foreach ($year as $each_year)
                                       <option value="{{ $each_year->id }}" {{ ($editData->year_id == $each_year->id) ? 'selected' : '' }}>{{ $each_year->name }}</option>  
                                       @endforeach
                                    </select>
                                  </div>
                              </div>
                          </div>
                          <div class="col-md-4">
                           <div class="form-group">
                               <h5>Group <span class="text-danger">*</span></h5>
                               <div class="controls">
                                 <select name="group_id" required class="form-control">
                                    <option value="" selected="" disabled>Select Group</option>
                                    @foreach ($group as $each_group)
                                    <option value="{{ $each_group->id }}" {{ ($editData->group_id == $each_group->id) ? 'selected' : '' }}>{{ $each_group->name }}</option>  
                                    @endforeach
                                 </select>
                               </div>
                           </div>
                        </div>
                       </div>

                       <div class="row">
                           <div class="col-md-4">
                              <div class="form-group">
                                 <h5>Class <span class="text-danger">*</span></h5>
                                 <div class="controls">
                                    <select name="shift_id" required class="form-control">
                                       <option value="" selected="" disabled>Select Shift</option>
                                       @foreach ($shifts as $each_shift)
                                       <option value="{{ $each_shift->id }}" {{ ($editData->shift_id == $each_shift->id) ? 'selected' : '' }}>{{ $each_shift->name }}</option>  
                                       @endforeach
                                    </select>
                                 
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="form-group">
                                 <h5>Upoload Image <span class="text-danger">*</span></h5>
                                 <div class="controls">
                                     <input type="file" name="image"  class="form-control" id="getImage" > 
                                 </div>
                             </div>
                           </div>
                           <div>
                              <div class="form-group">
                                 <div class="controls">
                                 <img id="showImage" src="{{ (!empty($editData['student']['image'])) ? url('upload/student_images/'.$editData['student']['image']): url('upload/images/blank-profile-picture.png') }}" style="height:100px; width:100px; border:1px solid #000;">
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