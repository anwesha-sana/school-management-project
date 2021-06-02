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
					<h4 class="box-title">Student Roll <strong>Generator</strong></h4>
					</div>
		
					<div class="box-body">
						{{-- <form method="post" action="{{ route('roll.generate.store') }}"> --}}
						<form>
						@csrf
						<div class="row">
                                    
							<div class="col-md-4">
								<div class="form-group">
									<h5>Class <span class="text-danger">*</span></h5>
									<div class="controls">
									 <select name="class_id" id="class_id" required class="form-control">
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
									 <select name="year_id" id="year_id" required class="form-control">
										<option value="" selected="" disabled>Select Year</option>
										@foreach ($year as $each_year)
										<option value="{{ $each_year->id }}">{{ $each_year->name }}</option>  
										@endforeach
									 </select>
								   </div>
							   </div>
						   </div>
						   <div class="col-md-4">
							<div class="text-xs-right mt-20">
								<a id="search" class="btn btn-rounded btn-info" name="search">Search</a>
							 </div>
						   </div>
						</div>
						
					</div>
				</div>
			</div>
		</div>
			<div class="row d-none" id="roll-generate">
				<div class="col-12 table-responsive">
					<table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>ID No</th>
								<th>Name</th>
								<th>Father name</th>
								<th>Gender</th>
								<th>Roll</th>
							</tr>
						</thead>
						<tbody id="roll-generate-tr">
					
						</tbody>
						
					  </table>
				</div>
			</div>
			<input type="button" class="btn btn-rounded btn-info" value="Roll Generator" id="role_submit">
			<div class="alert alert-info success_role d-none mt-10 text-center" role="alert"> </div>
			</form>
		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->
	  
	  </div>
  </div>
  <!-- /.content-wrapper -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script type="text/javascript">
	$(document).on('click','#search',function(){
	  var year_id = $('#year_id').val();
	  var class_id = $('#class_id').val();
	   $.ajax({
		url: "{{ route('student.registration.getstudents')}}",
		type: "GET",
		data: {'year_id':year_id,'class_id':class_id},
		success: function (data) {
			//console.log(response);
			
		  $('#roll-generate').removeClass('d-none');
		  var html = '';
		  $.each( data, function(key, v){
			//console.log(v.student_id);
			html +=
			'<tr>'+
			'<td>'+v.student.id_no+'<input type="hidden" id="student-id" name="student_id[]" value="'+v.student_id+'"></td>'+
			'<td>'+v.student.name+'</td>'+
			'<td>'+v.student.fname+'</td>'+
			'<td>'+v.student.gender+'</td>'+
			'<td><input type="text" class="form-control form-control-sm" name="roll[]"  value="'+v.roll+'" ></td>'+
			'</tr>';
		  });
		 
		  html = $('#roll-generate-tr').html(html);
		  console.log(html);
		}
	  });

	$("#role_submit").click(function(){
    	var student_id = $("input[name='student_id[]']")
              .map(function(){return $(this).val();}).get();
		var roll = $("input[name='roll[]']")
              .map(function(){return $(this).val();}).get();
        var token = "{{ csrf_token() }}" ;
		$.ajax({
			url: "{{ route('roll.generate.store')}}",
			type: "POST",
			data: {'year_id':year_id,'class_id':class_id,'roll':roll,'student_id':student_id,'_token':token},
			success: function (data) {
				console.log(data);
				if(data !=0){
					$('.success_role').removeClass('d-none');
					$(".success_role").html('Roll Generate Successfully') ; 
					//location.reload();
					setTimeout(function(){
						window.location.reload(1);
					}, 2000);
				}else{
					$('.success_role').removeClass('d-none');
					$('.success_role').removeClass('alert-info');
					$('.success_role').addClass('alert-danger');
					$(".success_role").html('Roll Already Exits') ; 
					setTimeout(function(){
						window.location.reload(1);
					}, 2000);
				}
				
			}
	  	});
  	});
	});
  
  </script>

@endsection