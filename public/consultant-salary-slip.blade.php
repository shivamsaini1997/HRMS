@include('admin.includes.head')

		<!-- Main Wrapper -->
        <div class="main-wrapper">
			<!-- Header -->
			@include('admin.includes.header')
			<!-- /Header -->
			
			<!-- Sidebar -->
			@include('admin.includes.sidebar')

			<!-- /Sidebar -->
			
			
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
									<li class="breadcrumb-item"><a href="admin-dashboard.html">Dashboard</a></li>
									<li class="breadcrumb-item active">Payslip</li>
								</ul>
							</div>
							<div class="col-auto float-end ms-auto">
								<div class="btn-group btn-group-sm">
									<!-- <button class="btn btn-white">CSV</button>
									<button class="btn btn-white">PDF</button> -->
									<a class="btn btn-white print-slip" href="{{url('/admin/consultant-salary/generate-pdf')}}"><i class="fa-solid fa-print fa-lg"></i> Print</a>
								</div>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<table id="consultant_slip">
								<style>
										ul.list-unstyled li h5 {
											position: relative;
											display: flex;
											justify-content: space-between;
											padding-bottom: 5px;
										}
										thead tr {
										border: 2px solid #000 !important;
										border-right: 0 !important;
										border-left: 0 !important;
									}
									tbody tr{
										border:0;
									}
									th ,td {
										border: 0 !important;
									}
									th {
										width: 25%;
										padding: 2px 8px !important;

									}

									</style>
								<tbody>
										<tr>
											<td>
											<div class="card-body" >
									<!-- <div class="row">
										<div class="col-12 text-center mb-3">
											<h3 class="page-title">Access Assist</h3>
										</div>
									</div> -->
									<h4 class="payslip-title">Payslip for the month of Jan 2024</h4>
									<div class="row">
										<div class="col-12 text-center border-top border-bottom py-2">
											<h4 class="m-0">Shivam Saini</h4>

										</div>
									</div>
									<div class="row">
										<div class="col-sm-6">
											<img src="https://accessassist.in/public/frontend/assets/images/Access-assist-logo-01.png" class="inv-logo" alt="Logo">
											
										</div>
										<div class="col-sm-6 m-b-20 mt-3">
											<div class="invoice-details">
												<h3 class="text-uppercase">Payslip #49029</h3>
												<ul class="list-unstyled">
													<li>Salary Month: <span>Jan, 2024</span></li>
												</ul>
											</div>
										</div>
									</div>
									<div class="" style="display:flex;">
										<div class="col-lg-6 m-b-20" style="padding: 0 7px; width:50%">
											<ul class="list-unstyled">
												<li>
													<h5 class="mb-0"><strong>Department</strong> <span>Designer</span></h5>
												</li>
												<li>
													<h5 class="mb-0"><strong>Gander</strong> <span>Male</span></h5>
												</li>
												<li>
													<h5 class="mb-0"><strong>PAN</strong> <span>CHHIP897P</span></h5>
												</li>
												<li>
													<h5 class="mb-0"><strong>Days  Payable</strong> <span>26</span></h5>
												</li>
												<li>
													<h5 class="mb-0"><strong>DOJ</strong> <span>01/03/2022</span></h5>
												</li>
												<li>
													<h5 class="mb-0"><strong>A/C No.</strong> <span> 895384905890485</span></h5>
												</li>
												<li>
													<h5 class="mb-0"><strong>Level</strong> <span> </span></h5>
												</li>
											</ul>
										</div>
										<div class="col-lg-6 m-b-20" style="padding: 0 7px; width:50%">
											<ul class="list-unstyled">
												<li>
													<h5 class="mb-0"><strong>Emp. code</strong> <span>AA000012</span></h5>
												</li>
												<li>
													<h5 class="mb-0"><strong>Designation</strong> <span>Frontend Developer</span></h5>
												</li>
												<li>
													<h5 class="mb-0"><strong>UAN No</strong> <span></span></h5>
												</li>
												<li>
													<h5 class="mb-0"><strong>ESI No.</strong> <span>N/A</span></h5>
												</li>
												<li>
													<h5 class="mb-0"><strong>PF No.</strong> <span>N/A</span></h5>
												</li>
												<li>
													<h5 class="mb-0"><strong>Location</strong> <span>Delhi</span></h5>
												</li>
												<li>
													<h5 class="mb-0"><strong>Father/Husband Name</strong> <span></span></h5>
												</li>
											</ul>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-12">
											<div>
												<div class="d-flex  justify-content-around">
													<h4 class="m-b-10"><strong>Earnings</strong></h4>
													<h4 class="m-b-10"><strong>Description</strong></h4>
												</div>
												<table class="table table-bordered">
													<thead>
														<tr>
															<th>Description</th>
															<th class="text-end">Amount</th>
															<th>Description</th>
															<th class="text-end">Amount</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td>Consolidated Fee</td>
															<td><span class="float-end">$6500</span></td>
															
															<td>TDS</td>
															<td><span class="float-end">2,800</span></td>
														
														</tr>
														
													</tbody>
													<thead>
														<tr>
															<th>Gross Pay (A)</th>
															<th class="text-end">28,000</th>
															<th>Gross Deductions(B)</th>
															<th class="text-end">4,800</th>
														</tr>
													</thead>
													<tbody style="border-bottom: 5px double;">
														<tr>
															<td><strong>Net Paid (A - B) </strong></td>
															<td><span class="float-end">23,056 (in words)</span></td>
															<td>Rs. Twenty Three thousand fifty Six only.</td>
															
														</tr>
														<tr>
															<td><strong>(After Roundoff)</strong></td>
														
														</tr>
														
													</tbody>
												</table>
											</div>
										</div>
										
										<div class="col-sm-12">
											<p><i>Remarks : This Is Computer Generated Payslip and does not require any signature.</i></p>
										</div>
									</div>
								</div>
											</td>
										</tr>
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

		@include('admin.includes.footer')
		<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>

		<script>
    function printPayslip() {
        var pdf = new jsPDF(); // Create new jsPDF instance
        var printContent = document.getElementById("consultant_slip").innerHTML;
        
        pdf.fromHTML(printContent, 10, 10); // Convert HTML to PDF

        pdf.save("payslip.pdf"); // Save PDF with a filename
    }
</script> -->