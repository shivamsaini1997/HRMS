@include('admin.includes.head')
		<!-- Main Wrapper -->
        <div class="main-wrapper">
		
			<!-- Header -->
			@include('admin.includes.header')
			<!-- /Header -->
			
			<!-- Sidebar -->
			@include('admin.includes.sidebar')
			
		<!-- /Two Col Sidebar -->
			
			
			<!-- Page Wrapper -->
            <div class="page-wrapper">
			
				<!-- Page Content -->
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row align-items-center">
							<div class="col">
								<h3 class="page-title">Payslip</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
									<li class="breadcrumb-item active">Payslip</li>
								</ul>
							</div>
							<div class="col-auto float-end ms-auto">
								<div class="btn-group btn-group-sm">
									<button class="btn btn-white btn-pdf">PDF</button>
									<button class="btn btn-white"><i class="fa-solid fa-print fa-lg"></i> Print</button>
								</div>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<div class="row" id="payslip-container">
						<div class="col-md-12">
							<div class="card">
								<div class="card-body">
									<h4 class="payslip-title">Payslip for the month of {{$getall_emp_salary->salary_month}}</h4>
									<div class="row">
										<div class="col-sm-6 m-b-20">
											<img src="https://accessassist.in/public/frontend/assets/images/Access-assist-logo-01.png" class="inv-logo" alt="Logo">
											<ul class="list-unstyled mb-0">
												<li>Access Asist</li>
												<li>Plot No 6, 3rd Floor, Right Side Lane 2,</li>
												<li>Saidulajaib, Saket Metro Station, New Delhi-110030</li>
											</ul>
										</div>
										<div class="col-sm-6 m-b-20">
											<div class="invoice-details">
												<h3 class="text-uppercase">Payslip #{{$getall_emp_salary->id}}</h3>
												<ul class="list-unstyled">
													<li>Salary Month: <span>{{$getall_emp_salary->salary_month}}</span></li>
												</ul>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-12 m-b-20">
											<ul class="list-unstyled">
												<li><h5 class="mb-0"><strong>{{$getall_emp_salary->firstname}}</strong></h5></li>
												<li><span>{{$getall_emp_salary->dept}}</span></li>
												<li>Employee ID: {{$getall_emp_salary->emp_id}}</li>
												<li>Joining Date: {{$getall_emp_salary->doj}}</li>
											</ul>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-6">
											<div>
												<h4 class="m-b-10"><strong>Earnings</strong></h4>
												<table class="table table-bordered">
													<tbody>
														<tr>
															<td><strong>Gross Salary</strong> <span class="float-end">{{$getall_emp_salary->gross_salary}}</span></td>
														</tr>
														<tr>
															<td><strong>Basic Salary</strong> <span class="float-end">{{$getall_emp_salary->basic_salary}}</span></td>
														</tr>
														<tr>
															<td><strong>DA</strong> <span class="float-end">{{$getall_emp_salary->da}}</span></td>
														</tr>
														<tr>
															<td><strong>House Rent Allowance (H.R.A.)</strong> <span class="float-end">{{$getall_emp_salary->hra}}</span></td>
														</tr>
														
														<tr>
															<td><strong>Arreas / OT Salary</strong> <span class="float-end">{{$getall_emp_salary->areas_ot_salary}}</span></td>
														</tr>
														<tr>
															<td><strong>Allowance</strong> <span class="float-end">{{$getall_emp_salary->allowance}}</span></td>
														</tr>
														<tr>
															<td><strong>Insentive</strong> <span class="float-end">{{$getall_emp_salary->insentive}}</span></td>
														</tr>
														<tr>
															<td><strong>Bonus</strong> <span class="float-end">{{$getall_emp_salary->bonus}}</span></td>
														</tr>
														<tr>
															<td><strong>Total Earnings</strong> <span class="float-end"><strong>{{$getall_emp_salary->total_gross_salary}}</strong></span></td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>
										<div class="col-sm-6">
											<div>
												<h4 class="m-b-10"><strong>Deductions</strong></h4>
												<table class="table table-bordered">
													<tbody>
														<tr>
															<td><strong>Tax Deducted at Source (T.D.S.)</strong> <span class="float-end">{{$getall_emp_salary->tds}}</span></td>
														</tr>
														<tr>
															<td><strong>Provident Fund</strong> <span class="float-end">{{$getall_emp_salary->pf}}</span></td>
														</tr>
														<tr>
															<td><strong>ESI</strong> <span class="float-end">{{$getall_emp_salary->esi}}</span></td>
														</tr>
														<tr>
															<td><strong>Insurance Deduction</strong> <span class="float-end">{{$getall_emp_salary->insurance_deduction}}</span></td>
														</tr>
														<tr>
															<td><strong>Profession Tax</strong> <span class="float-end">{{$getall_emp_salary->prof_tax}}</span></td>
														</tr>
														<tr>
															<td><strong>Staff Conv Deduction</strong> <span class="float-end">{{$getall_emp_salary->staf_conv_deduc}}</span></td>
														</tr>
														<tr>
															<td><strong>Others</strong> <span class="float-end">{{$getall_emp_salary->others}}</span></td>
														</tr>
														<tr>
															<td><strong>Total Deductions</strong> <span class="float-end"><strong>{{$getall_emp_salary->total_deduction_salary}}</strong></span></td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>
										<?php

											function numberToWords($number) {
												$words = array('',
													'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine',
													'ten', 'eleven', 'twelve', 'thirteen', 'fourteen', 'fifteen', 'sixteen', 'seventeen', 'eighteen', 'nineteen'
												);
												$tens = array('', '', 'twenty', 'thirty', 'forty', 'fifty', 'sixty', 'seventy', 'eighty', 'ninety');
												
												if ($number < 20) {
													return $words[$number];
												} elseif ($number < 100) {
													return $tens[($number / 10)] . (($number % 10 !== 0) ? ' ' . $words[$number % 10] : '');
												} elseif ($number < 1000) {
													return $words[$number / 100] . ' hundred' . (($number % 100 !== 0) ? ' and ' . numberToWords($number % 100) : '');
												} elseif ($number < 1000000) {
													return numberToWords($number / 1000) . ' thousand' . (($number % 1000 !== 0) ? ' ' . numberToWords($number % 1000) : '');
												}
											}
								
											$textualRepresentation = numberToWords($getall_emp_salary->net_pay_salary);
										
											?>

										<div class="col-sm-12">
											<p><strong>Net Salary: {{$getall_emp_salary->net_pay_salary}}</strong> ({{$textualRepresentation}} only.)</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
                </div>
				<!-- /Page Content -->
				
            </div>
			<!-- /Page Wrapper -->

        </div>
		<!-- /Main Wrapper -->

		@include('admin.includes.footer')


<!-- Add these scripts at the end of your HTML file, just before closing </body> tag -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>

<script>
    $(document).ready(function () {
        // Check if jsPDF is defined
        if (typeof jsPDF !== 'undefined') {
            var doc = new jsPDF();
            var specialElementHandlers = {
                '#editor': function (element, renderer) {
                    return true;
                }
            };

            $('.btn-pdf').click(function () {
                doc.fromHTML($('#payslip-container').html(), 15, 15, {
                    'width': 190,
                    'elementHandlers': specialElementHandlers
                });
                doc.save('sample-page.pdf');
            });
        } else {
            console.error('Error: jsPDF is not defined. Make sure the library is loaded.');
        }
    });
</script>

<script>
    $(window).on('load', function() {
        // Make an AJAX request to generate the PDF
        $.get('{{ URL::to('admin/emp-salary/generate-pdf') }}', function(response) {
            // Once the PDF is generated, trigger its download
            //window.location.href = response.download_link;
        });
    });
</script>