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
				  <h3 class="box-title">Student Fee Category List</h3>
                  <a href="{{ route('fee.category.add') }}" style="float:right;" class="btn btn-rounded btn-success mb-5">Add Student Fee Category</a>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Sl</th>
								<th>Name</th>
								<th>Action</th>
								
							</tr>
						</thead>
						<tbody>
                            @foreach($all_data as $key => $user)
							<tr>
								<td>{{ $key+1 }}</td>
        						<td>{{ $user->name}}</td>
								<td>
                                    <a href="{{ route('fee.category.edit',$user->id) }}" class="btn btn-rounded btn-info mb-5">Edit</a>
                                    <a href="{{ route('fee.category.delete',$user->id) }}" class="btn btn-rounded btn-danger mb-5" id="del_btn">Delete</a>
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