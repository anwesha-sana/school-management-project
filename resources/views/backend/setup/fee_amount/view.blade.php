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
				  <h3 class="box-title">Student Fee Amount List</h3>
                  <a href="{{ route('fee.amount.add') }}" style="float:right;" class="btn btn-rounded btn-success mb-5">Add Fee Amount</a>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Sl</th>
								<th>Fee Category</th>
								<th>Action</th>
								
							</tr>
						</thead>
						<tbody>
                            @foreach($all_data as $key => $fee_cat_amt)
							<tr>
								<td>{{ $key+1 }}</td>
        						<td>{{ $fee_cat_amt['fee_category']['name']}}</td>
								<td>
                                    <a href="{{ route('fee.amount.edit',$fee_cat_amt->fee_category_id ) }}" class="btn btn-rounded btn-info mb-5"><i class="fa fa-edit"></i></a>
                                    <a href="{{ route('fee.amount.details',$fee_cat_amt->fee_category_id)}}" class="btn btn-rounded btn-success mb-5"><i class="fa fa-eye"></i></a>
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