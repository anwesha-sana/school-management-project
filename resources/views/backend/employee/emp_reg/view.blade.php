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

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Employee List</h3>
                  <a href="{{ route('employee.registration.add') }}" style="float:right;" class="btn btn-rounded btn-success mb-5">Add Employee</a>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Sl</th>
								<th>ID No</th>
								<th>Name</th>
								<th>Mobile</th>
								<th>Gender</th>
								<th>Joining Date</th>
								<th>Salary</th>
								@if (Auth::user()->role == "Admin")
								<th>Code</th>	
								@endif
								
								<th>Action</th>
								
							</tr>
						</thead>
						<tbody>
                            @foreach($all_data as $key => $emp)
							<tr>
								<td>{{ $key+1 }}</td>
								<td>{{ $emp->id_no}}</td>
								<td>{{ $emp->name}}</td>
								<td>{{ $emp->mobile}}</td>
								<td>{{ $emp->gender}}</td>
								<td>{{ $emp->join_date}}</td>
								<td>{{ $emp->salary}}</td>
        						<td>{{ $emp->code}}</td>
								
								<td>
                                    <a href="{{ route('employee.registration.edit',$emp->id) }}" class="btn btn-rounded btn-info mb-5">Edit</a>
                                    <a href="{{ route('designation.delete',$emp->id) }}" class="btn btn-rounded btn-danger mb-5" id="del_btn">Delete</a>
                                </td>
								
							</tr>
                            @endforeach
						</tbody>
						
					  </table>
					</div>
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