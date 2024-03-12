@include('frontend.include.head')







		<!-- Main Wrapper -->
        <div class="main-wrapper">
		
			<!-- Header -->
            @include('frontend.include.header')
			<!-- /Header -->
			
			<!-- Sidebar -->
			@include('frontend.include.sidebar')

			<!-- /Sidebar -->
			

			
			<!-- Page Wrapper -->
            <div class="page-wrapper">
			
				<!-- Page Content -->
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row align-items-center">
							<div class="col">
								<h3 class="page-title">Employee Salary</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="admin-dashboard.html">Dashboard</a></li>
									<li class="breadcrumb-item active">Salary</li>
								</ul>
							</div>
							<!-- <div class="col-auto float-end ms-auto">
								<a href="#" class="btn add-btn" data-bs-toggle="modal" data-bs-target="#add_salary"><i class="fa-solid fa-plus"></i> Add Salary</a>
							</div> -->
						</div>
					</div>
					<!-- /Page Header -->
					<?php 
						$year = date('Y');
						$month = date('m');
					?>
					<!-- Search Filter -->
					<form action="" method="GET">
						<div class="row filter-row">
							<div class="col-sm-6 col-md-3"> 
								<div class="input-block mb-3 form-focus select-focus">
									<select class="select floating" name="smonth" id="smonth"> 
										@for ($m = 1; $m <= 12; $m++)
											<option value="{{ $m }}" {{ $m == $month ? 'selected' : '' }}>{{ date('F', mktime(0, 0, 0, $m, 1)) }}</option>
										@endfor
									</select>
									<label class="focus-label">Select Month</label>
								</div>
							</div>
							<div class="col-sm-6 col-md-3"> 
								<div class="input-block mb-3 form-focus select-focus">
									<select class="select floating" name="year" id="year"> 
										@for ($y = date('Y'); $y >= date('Y') - 10; $y--)
											<option value="{{ $y }}" {{ $y == $year ? 'selected' : '' }}>{{ $y }}</option>
										@endfor
									</select>
									<label class="focus-label">Select Year</label>
								</div>
							</div>
							<div class="col-sm-6 col-md-3">  
								<div class="d-grid">
									<button type="submit" class="btn btn-success"> Search </button>  
								</div>
							</div>
							<div class="col-sm-6 col-md-3">  
								<div class="d-grid">
									<a href="{{ url('employee-salary') }}" class="btn btn-info"> Reset </a>  
								</div>
							</div>     
						</div>
					</form>

					<!-- /Search Filter -->
					
					<div class="row">
						<div class="col-md-12">
							<div class="table-responsive">
								<table class="table table-striped custom-table datatable">
									<thead>
										<tr>
											<th>Employee</th>
											<th>Employee ID</th>
										
											<th>Join Date</th>
											<th>Role</th>
											<th>Month</th>
											<th>Salary</th>
											<th>Payslip</th>
											<!-- <th class="text-end">Action</th> -->
										</tr>
									</thead>
									<tbody>
										@if(!empty($getall_emp_salary))
											@foreach($getall_emp_salary as $empsalary)
												<tr>
													<td>
														<h2 class="table-avatar">
															<a href="profile.html" class="avatar"><img src="{{url('public/uploads/profile')}}/{{$empsalary->image}}" alt="User Image"></a>
															<a href="javascript:void(0)">{{$empsalary->firstname}}</a>
														</h2>
													</td>
													<td>{{$empsalary->emp_id}}</td>

													<td>{{$empsalary->doj}}</td>
													<td>{{$empsalary->dept}}</td>
													<td>{{ \Carbon\Carbon::parse($empsalary->salary_month)->format('F Y') }}</td>
													<td>INR : {{$empsalary->total_gross_salary}}</td>
													<td><a class="btn btn-sm btn-primary" href="{{ url('employee-salary/salary-view') }}/{{ $empsalary->id }}">Generate Slip</a></td>
													
												</tr>
											@endforeach
											@else
											Data not found
										@endif
										
									</tbody>
								</table>
							</div>
						</div>
					</div>
                </div>
				<!-- /Page Content -->

				
            </div>
			<!-- /Page Wrapper -->

        </div>
		<!-- /Main Wrapper -->
		@include('frontend.include.footer')
