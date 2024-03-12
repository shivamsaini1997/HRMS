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
							<h3 class="page-title">Holidays 2024</h3>
							<ul class="breadcrumb">
								<li class="breadcrumb-item"><a href="admin-dashboard.html">Dashboard</a></li>
								<li class="breadcrumb-item active">Holidays</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- /Page Header -->
				
				<div class="row">
					<div class="col-md-12">
						<div class="table-responsive">
							<table class="table table-striped custom-table mb-0">
								<thead>
									<tr>
										<th>#</th>
										<th>Holiday Name </th>
										<th>Holiday Date</th>
										<th>Day</th>
										<th class="text-end">Type</th>
									</tr>
								</thead>
								<tbody>
									<tr class="holiday-completed">
										<td>1</td>
										<td>Republic Day</td>
										<td>26 Jan</td>
										<td>Friday</td>
										<td class="text-end">GH</td>
									</tr>
									<tr class="holiday-completed">
										<td>2</td>
										<td>Holi</td>
										<td>25 Mar</td>
										<td>Monday</td>
										<td class="text-end">GH</td>
									</tr>
									<tr class="holiday-completed">
										<td>3</td>
										<td>Eid-ul-Fitar (Tentative Date)</td>
										<td>11 Apr</td>
										<td>Thursday</td>
										<td  class="text-end">
										GH
										</td>
									</tr>
									<tr class="holiday-completed">
										<td>4</td>
										<td>Bakrid/Eid ul-Adha (Tentative Date)</td>
										<td>17 Jun</td>
										<td>Monday</td>
										<td  class="text-end">
											GH
										</td>
									</tr>
									<tr class="holiday-completed">
										<td>5</td>
										<td>Independence Day</td>
										<td>15 Aug</td>
										<td>Thursday</td>
										<td  class="text-end">
											GH
										</td>
									</tr>
									<tr class="holiday-upcoming">
										<td>6</td>
										<td>Mahatma Gandhi Jayanti</td>
										<td>2 Oct</td>
										<td>Wednesday</td>
										<td class="text-end">
										GH
										</td>
									</tr>
									<tr class="holiday-upcoming">
										<td>7</td>
										<td>Maha Navami</td>
										<td>11 Oct</td>
										<td>Friday</td>
										<td class="text-end">
										GH
										</td>
									</tr>
									<tr class="holiday-upcoming">
										<td>8</td>
										<td>Diwali/Deepavali</td>
										<td>31 Oct</td>
										<td>Thursday</td>
										<td class="text-end">
										GH
										</td>
									</tr>
									<tr class="holiday-upcoming">
										<td>9</td>
										<td>Christmas</td>
										<td>25 Dec</td>
										<td>Wednesday</td>
										<td class="text-end">
										GH
										</td>
									</tr>
								</tbody>
							</table>
							<p class="mt-2"><b>These holidays are as per the Circular issued by the Ministry of Personnel</b>, Public Grievances and Pensions.</p>
							<p class="mt-3"><b>Note</b>: 'GH' denotes Gazetted Holiday and 'RH' denotes Restricted Holiday.</p>
							<p class="mt-5">In addition to the above 9 compulsory holiday (excluding holiday’s falling on Saturday and Sunday) Mentioned above, each employee is free to avail of 2 restricted holiday from the mentioned below.</p>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="table-responsive">
							<table class="table table-striped custom-table mb-0">
								<thead>
									<tr>
										<th>#</th>
										<th>Holiday Name </th>
										<th>Holiday Date</th>
										<th>Day</th>
										<th class="text-end">Type</th>
									</tr>
								</thead>
								<tbody>
									<tr class="holiday-completed">
										<td>1</td>
										<td>New Year's Day</td>
										<td>1 Jan</td>
										<td>Monday</td>
										<td class="text-end">RH</td>
									</tr>
									<tr class="holiday-completed">
										<td>2</td>
										<td>Basant Panchami </td>
										<td>14 Feb</td>
										<td>Wednesday</td>
										<td class="text-end">RH</td>
									</tr>
									<tr class="holiday-completed">
										<td>3</td>
										<td>Maha Shivratri </td>
										<td>08 Mar</td>
										<td>Friday</td>
										<td  class="text-end">
										RH
										</td>
									</tr>
									<tr class="holiday-completed">
										<td>4</td>
										<td>Good Friday</td>
										<td>29 Mar</td>
										<td>Friday</td>
										<td  class="text-end">
											RH
										</td>
									</tr>
									<tr class="holiday-completed">
										<td>5</td>
										<td>Raksha Bandhan</td>
										<td>19 Aug</td>
										<td>Monday</td>
										<td  class="text-end">
											RH
										</td>
									</tr>
									<tr class="holiday-upcoming">
										<td>6</td>
										<td>Janmashtami</td>
										<td>26 Aug</td>
										<td>Monday</td>
										<td class="text-end">
										RH
										</td>
									</tr>
									<tr class="holiday-upcoming">
										<td>7</td>
										<td>Chhat Puja</td>
										<td>07 Nov</td>
										<td>Thursday</td>
										<td class="text-end">
										RH
										</td>
									</tr>
									<tr class="holiday-upcoming">
										<td>8</td>
										<td>Guru Nanak Jayanti</td>
										<td>15 Nov</td>
										<td>Friday</td>
										<td class="text-end">
										RH
										</td>
									</tr>
									
								</tbody>
							</table>
							<p class="mt-2"><b>Any other religious festivals.</b></p>
						
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
