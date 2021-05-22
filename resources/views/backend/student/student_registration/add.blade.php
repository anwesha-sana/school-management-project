@extends('admin.admin_master')
@section('admin')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <div class="container-full">
      <section class="content">
         <!-- Basic Forms -->
         <div class="box">
            <div class="box-header with-border">
               <h4 class="box-title">Add Student</h4>
               
            </div>
            <!-- /.box-header -->
            <div class="box-body">
               <div class="row">
                  <div class="col">
                     <form method="post" action="{{ route('student.registration.store') }}" enctype="multipart/form-data">
                         @csrf
                        <div class="row">
                           <div class="col-12">
                                <div class="row">
                                    
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>Student Name <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="name" class="form-control" autocomplete="off"> 
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
                                               <input type="text" name="fname" class="form-control" autocomplete="off"> 
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
                                            <input type="text" name="mname" class="form-control" autocomplete="off"> 
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
                                             <input type="text" name="mobile" class="form-control" autocomplete="off"> 
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
                                            <input type="text" name="address" class="form-control" autocomplete="off"> 
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
                                          <option value="Male">Male</option>
                                          <option value="Female">Female</option>
                                          <option value="Others">Others</option>
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
                                          <input type="text" name="religion" class="form-control" autocomplete="off"> 
                                      
                                      </div>
                                  </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                     <h5>Date Of Birth <span class="text-danger">*</span></h5>
                                     <div class="controls">
                                         <input type="date" name="dob" class="form-control" autocomplete="off"> 
                                     
                                     </div>
                                 </div>
                             </div>
                             <div class="col-md-4">
                              <div class="form-group">
                                  <h5>Discount <span class="text-danger">*</span></h5>
                                  <div class="controls">
                                    <input type="text" name="discount" class="form-control" autocomplete="off"> 
                                  
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
                                       <option value="{{ $each_class->id }}">{{ $each_class->name }}</option>  
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
                                       <option value="{{ $each_year->id }}">{{ $each_year->name }}</option>  
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
                                    <option value="{{ $each_group->id }}">{{ $each_group->name }}</option>  
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
                                       <option value="{{ $each_shift->id }}">{{ $each_shift->name }}</option>  
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
                                 <img id="showImage" src="{{ url('upload/images/blank-profile-picture.png') }}" style="height:100px; width:100px; border:1px solid #000;">
                                 </div>
                              </div>
                           </div>
                        </div>
                        
                                
                              
                        <div class="text-xs-right">
                           <input type="submit" class="btn btn-rounded btn-info" value="Submit">
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