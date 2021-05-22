@extends('admin.admin_master')
@section('admin')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->

		<!-- Main content -->
		<section class="content">
		  <div class="row"> 
			<div class="col-12">
				<div class="box bl-3 border-primary">
					<div class="box-header">
					<h4 class="box-title">Student <strong>Search</strong></h4>
					</div>
		
					<div class="box-body">
						<form method="GET" action="{{ route('student.class.year.wise.data')}}">
						<div class="row">
                                    
							<div class="col-md-4">
								<div class="form-group">
									<h5>Class <span class="text-danger">*</span></h5>
									<div class="controls">
									 <select name="class_id" required class="form-control">
										<option value="" selected="" disabled>Select Class</option>
										@foreach ($class as $each_class)
										<option value="{{ $each_class->id }}" {{ (@$class_id == $each_class->id) ? "selected" : "" }}>{{ $each_class->name }}</option>  
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
										<option value="{{ $each_year->id }}" {{ (@$year_id == $each_year->id) ? "selected" : "" }}>{{ $each_year->name }}</option>  
										@endforeach
									 </select>
								   </div>
							   </div>
						   </div>
						   <div class="col-md-4">
							<div class="text-xs-right mt-20">
								<input type="submit" class="btn btn-rounded btn-info" name="search" value="Search">
							 </div>
						   </div>
						</div>
						</form>
					</div>
				</div>
			</div>

			<div class="col-12">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Student List</h3>
                  <a href="{{ route('student.registration.add') }}" style="float:right;" class="btn btn-rounded btn-success mb-5">Add Student</a>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					@if(!@search)
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Sl</th>
								<th>Name</th>
								<th>ID No</th>
								<th>Roll</th>
								<th>Class</th>
								<th>Year</th>
								<th>Image</th>
								@if (Auth::user()->role == 'Admin')
								<th>Code</th>	
								@endif
								<th>Action</th>
								
							</tr>
						</thead>
						<tbody>
                            @foreach($all_data as $key => $user)
							<tr>
								<td>{{ $key+1 }}</td>
								<td>{{ $user['student']['name'] }}</td>
								<td>{{ $user['student']['id_no'] }}</td>
								<td>{{ $user['roll'] }}</td>
        						<td>{{ $user['student_class']['name']}}</td>
								<td>{{ $user['student_year']['name'] }} </td>
								<td>
								<img src="{{ (!empty($user['student']['image'])) ? url('upload/student_images/'.$user['student']['image']): url('upload/images/blank-profile-picture.png') }}" style="height:100px; width:100px; border:1px solid #000;">
								</td>
								<td>
                                    <a href="{{ route('student.year.edit',$user->id) }}" class="btn btn-rounded btn-info mb-5">Edit</a>
                                    <a href="{{ route('student.year.delete',$user->id) }}" class="btn btn-rounded btn-danger mb-5" id="del_btn">Delete</a>
                                </td>
								
							</tr>
                            @endforeach
						</tbody>
						
					  </table>
					</div>
					@else 
					<div class="table-responsive">
						<table id="example1" class="table table-bordered table-striped">
						  <thead>
							  <tr>
								  <th>Sl</th>
								  <th>Name</th>
								  <th>ID No</th>
								  <th>Roll</th>
								  <th>Class</th>
								  <th>Year</th>
								  <th>Image</th>
								  @if (Auth::user()->role == 'Admin')
								  <th>Code</th>	
								  @endif
								  <th>Action</th>
								  
							  </tr>
						  </thead>
						  <tbody>
							  @foreach($all_data as $key => $user)
							  <tr>
								  <td>{{ $key+1 }}</td>
								  <td>{{ $user['student']['name'] }}</td>
								  <td>{{ $user['student']['id_no'] }}</td>
								  <td>{{ $user['roll'] }}</td>
								  <td>{{ $user['student_class']['name']}}</td>
								  <td>{{ $user['student_year']['name'] }} </td>
								  <td>
								  <img src="{{ (!empty($user['student']['image'])) ? url('upload/student_images/'.$user['student']['image']): url('upload/images/blank-profile-picture.png') }}" style="height:100px; width:100px; border:1px solid #000;">
								  </td>
								  <td>
									  <a href="{{ route('student.year.edit',$user->id) }}" class="btn btn-rounded btn-info mb-5">Edit</a>
									  <a href="{{ route('student.year.delete',$user->id) }}" class="btn btn-rounded btn-danger mb-5" id="del_btn">Delete</a>
								  </td>
								  
							  </tr>
							  @endforeach
						  </tbody>
						  
						</table>
					</div>

					@endif
				</div>
				<!-- /.box-body -->
			  </div>
			
			  <!-- /.box -->          
			</div>
			<!-- /.col -->
		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->
	  
	  </div>
  </div>
  <!-- /.content-wrapper -->

@endsection