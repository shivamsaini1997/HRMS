F@include('admin.includes.head')

		<!-- Main Wrapper -->
        <div class="main-wrapper">
			<!-- Header -->
			<?php echo $__env->make('admin.includes.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			<!-- /Header -->
			
			<!-- Sidebar -->
			<?php echo $__env->make('admin.includes.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

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
									<a class="btn btn-white print-slip" id="print-pdf" href="<?php echo e(url('admin/consultant-salary/generate-pdf')); ?>/<?php echo e($getall_emp_salary->emp_id); ?>/<?php echo e($getall_emp_salary->id); ?>"><i class="fa-solid fa-print fa-lg"></i> Print</a>
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
												
									<div class="row">
										<div class="col-12 text-center mb-3">
										<img src="https://accessassist.in/public/frontend/assets/images/Access-assist-logo-01.png" class="inv-logo" alt="Logo">

										</div>
									</div>
									<h4 class="payslip-title">Payslip for the month of <?php echo e(\Carbon\Carbon::createFromFormat('Y-m-d', $getall_emp_salary->sal_month)->format('F Y')); ?></h4>
									<div class="row">
										<div class="col-12 text-center border-top border-bottom py-2">
											<h4 class="m-0"><?php echo e($getall_emp_salary->firstname); ?> <?php echo e($getall_emp_salary->lastname); ?></h4>

										</div>
									</div>
									<div class="row">
										<div class="col-lg-3 m-b-20 mt-3 ps-3">
										<p style="font-size:14px;"><b>Access Asist</b></p>
                               			 <p style="font-size:14px;">Plot No 6, 3rd Floor, Right Side Lane 2, Saidulajaib, Saket Metro Station, New Delhi-110030</p>
										</div>
										<div class="col-lg-3"></div>
										<div class="col-lg-6 m-b-20 mt-3">
											<div class="invoice-details">
												<h3 class="text-uppercase">Payslip #<?php echo e($getall_emp_salary->id); ?></h3>
												<ul class="list-unstyled">
													<li>Salary Month: <span><?php echo e(\Carbon\Carbon::createFromFormat('Y-m-d', $getall_emp_salary->sal_month)->format('F Y')); ?></span></li>
												</ul>
											</div>
										</div>
									</div>
									<div class="" style="display:flex;">
										<div class="col-lg-6 m-b-20" style="padding: 0 7px; width:50%">
											<ul class="list-unstyled">
												<li>
													<h5 class="mb-0"><strong>Department</strong> <span><?php echo e($getall_emp_salary->dept); ?></span></h5>
												</li>
												<li>
													<h5 class="mb-0"><strong>Gender</strong> <span><?php echo e($getall_emp_salary->gender); ?></span></h5>
												</li>
												<li>
													<h5 class="mb-0"><strong>PAN</strong> <span><?php echo e($getall_emp_salary->panno); ?></span></h5>
												</li>
												<li>
													<h5 class="mb-0"><strong>Days  Payable</strong> <span><?php echo e($getall_emp_salary->payable_days); ?></span></h5>
												</li>
												<li>
													<h5 class="mb-0"><strong>DOJ</strong> <span><?php echo e($getall_emp_salary->doj); ?></span></h5>
												</li>
												<li>
													<h5 class="mb-0"><strong>A/C No.</strong> <span><?php echo e($getall_emp_salary->bankaccount); ?></span></h5>
												</li>
												<li>
													<h5 class="mb-0"><strong>Level</strong> <span> </span></h5>
												</li>
											</ul>
										</div>
										<div class="col-lg-6 m-b-20" style="padding: 0 7px; width:50%">
											<ul class="list-unstyled">
												<li>
													<h5 class="mb-0"><strong>Emp. code</strong> <span><?php echo e($getall_emp_salary->emp_id); ?></span></h5>
												</li>
												<li>
													<h5 class="mb-0"><strong>Designation</strong> <span><?php echo e($getall_emp_salary->design); ?></span></h5>
												</li>
												<li>
													<h5 class="mb-0"><strong>UAN No</strong> <span></span></h5>
												</li>
												<li>
													<h5 class="mb-0"><strong>ESI No.</strong> <span>N/A</span></h5>
												</li>
												<!-- <li>
													<h5 class="mb-0"><strong>PF No.</strong> <span>N/A</span></h5>
												</li> -->
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
															<td><span class="float-end"><?php echo e($getall_emp_salary->consolidated_fee); ?></span></td>
															
															<td>TDS</td>
															<td><span class="float-end"><?php echo e($getall_emp_salary->tds); ?></span></td>
														
														</tr>
														
													</tbody>
													<thead>
														<tr>
															<th>Gross Pay (A)</th>
															<th class="text-end"><?php echo e($getall_emp_salary->net_pay); ?></th>
															<th>Gross Deductions(B)</th>
															<th class="text-end"><?php echo e($getall_emp_salary->tds); ?></th>
														</tr>
													</thead>
													<tbody style="border-bottom: 5px double;">
														<tr>
															<td><strong>Net Paid (A - B) </strong></td>
															<?php 
															$formatter = new NumberFormatter("en", NumberFormatter::SPELLOUT);
															$words = $formatter->format($getall_emp_salary->net_pay);
															?>
															<td><span class="float-end"><?php echo e($getall_emp_salary->net_pay); ?> (in words)</span></td>
															<td>Rs. <?php echo e(ucfirst($words)); ?>.</td>
															
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

		<?php echo $__env->make('admin.includes.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>

		<script>
    function printPayslip() {
        var pdf = new jsPDF(); // Create new jsPDF instance
        var printContent = document.getElementById("consultant_slip").innerHTML;
        
        pdf.fromHTML(printContent, 10, 10); // Convert HTML to PDF

        pdf.save("payslip.pdf"); // Save PDF with a filename
    }
</script> -->

<script>
    // $(window).on('load', function() {
    //     // Make an AJAX request to generate the PDF
    //     $.get('<?php echo e(URL::to('admin/consultant-salary/generate-pdf')); ?>', function(response) {
    //         // Once the PDF is generated, trigger its download
    //         //window.location.href = response.download_link;
    //     });
    // });
</script><?php /**PATH /home/accessas/public_html/hrms/resources/views/admin/consultant-salary-slip.blade.php ENDPATH**/ ?>