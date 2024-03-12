@include('admin.includes.head')
<link rel="stylesheet" href="{{asset('public/frontend/assets/css/alert.css')}}">
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
								<h3 class="page-title">Local Travel Reimbursement Requests</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="admin-dashboard.html">Dashboard</a></li>
									<li class="breadcrumb-item active">Local Travel Reimbursement Requests </li>
								</ul>
							</div>
							
						</div>
					</div>
					<!-- /Page Header -->

			
						<!-- Page Content -->
						<div class="content container-fluid">
				

				<div class="row">
					<div class="col-md-12">
						<div class="table-responsive">
							<table class="table table-striped custom-table mb-0 datatable">
								<thead>
									<tr>
                                        <th>Employee Name</th>
										<th>Purchase Id</th>
										<th>Purchase Date</th>
										<th>Purchase Reason</th>
										<th>Purchase By</th>
										<th>Purchase Amount</th>
										<th>Purchase Document</th>
                                        <th>Approved By</th>
										<th class="text-center">Status</th>
									</tr>
								</thead>
								<tbody>
                                    @if(!empty($get_ltr_details))
                                        @foreach($get_ltr_details as $ltrdetails)
                                        <tr>
                                            <td>{{$ltrdetails->firstname}} {{$ltrdetails->lastname}}</td>
                                            <td>{{strtoupper($ltrdetails->ltrid)}}</td>
                                            <td>{{$ltrdetails->date}}</td>
                                            <td>{{$ltrdetails->reason}}</td>
                                            <td>{{$ltrdetails->paidby}}</td>
                                            <td>{{$ltrdetails->amount}}</td>
                                            <td>

                                            @if($ltrdetails->doc)
                                                @if(pathinfo($ltrdetails->doc, PATHINFO_EXTENSION) == 'pdf')
                                                    <a href="{{url('public/uploads/localpay')}}/{{$ltrdetails->doc}}" class="image-popup">
                                                    <img class="embedclick" src="https://png.pngtree.com/png-clipart/20220612/original/pngtree-pdf-file-icon-png-png-image_7965915.png" alt="Word Document" width="50px" height="50px">
                                                    </a>
                                                @elseif(in_array(pathinfo($ltrdetails->doc, PATHINFO_EXTENSION), ['doc', 'docx']))
                                                    <a href="{{url('public/uploads/localpay')}}/{{$ltrdetails->doc}}" class="image-popup">
                                                        <img class="embedclick" src="word_icon.png" alt="Word Document" width="50px" height="50px">
                                                    </a>
                                                @elseif(in_array(pathinfo($ltrdetails->doc, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png', 'gif']))
                                                <a href="{{url('public/uploads/localpay')}}/{{$ltrdetails->doc}}" class="image-popup">
                                                    <img style="width:50px; height:50px" src="{{url('public/uploads/localpay')}}/{{$ltrdetails->doc}}" alt=""
                                                    ></a>
                                                @else
                                                    Unsupported File Type
                                                @endif
                                            @endif
                                               
                                            </td>
                                            <td>@if(!empty($ltrdetails->name)) {{$ltrdetails->name}} @endif</td>
                                            <td class="text-center">
                                                    <div class="dropdown action-label">
                                                    <a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">
																@if($ltrdetails->status=='C')
																	<i class="fa-regular fa-circle-dot text-success"></i> Cancled
																@elseif($ltrdetails->status=='P')
																	<i class="fa-regular fa-circle-dot text-danger"></i> Pending
																@elseif($ltrdetails->status=='R')
																	<i class="fa-regular fa-circle-dot text-info"></i> Reimbursement
																
																@endif
															</a>

															<div class="dropdown-menu dropdown-menu-right status-dropdown">
																<a class="dropdown-item" tr-id="{{$ltrdetails->id}}" uid="{{$ltrdetails->userid}}" data-status="P" href="#">Pending</a>
																<a class="dropdown-item" tr-id="{{$ltrdetails->id}}" uid="{{$ltrdetails->userid}}" data-status="C" href="#">Cancled</a>
																<a class="dropdown-item" tr-id="{{$ltrdetails->id}}" uid="{{$ltrdetails->userid}}" data-status="R" href="#">Reimbursement</a>
															</div>
                                                    </div>
                                                </td>
                                            
                                        </tr>
                                        @endforeach
									@else 
                                    No data Found
                                    @endif
									
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>

				
            </div>
			<!-- /Page Wrapper -->
			
        </div>
		<!-- /Main Wrapper -->

		@include('admin.includes.footer')
        <script src="{{asset('public/frontend/assets/js/alert.js')}}"></script>
		<script>
        $(document).ready(function(){
            $('.status-dropdown .dropdown-item').on('click', function(event) {
                event.preventDefault();
                
                const selectedStatus = $(this).data('status');
                const trId = $(this).attr('tr-id');
                const userId = $(this).attr('uid');
                var csrfToken = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url: '/update-local-pay-reimbursement',
                    type: 'POST',
                    data: {
                        "_token": csrfToken,
                        "trId": trId,
                        "userId": userId,
                        "status": selectedStatus,
                        "type" :"update_status"
                    },
                    success: function(response) {
                        if (response.success) {
                            triggerAlert('You have successfully changed travel reimbursement status', 'success');
                            location.reload(true);
                        } else {
                            triggerAlert('Somthing went wrong!', 'error');
                        }
                    },
                    error: function(error) {
                        triggerAlert('Somthing went wrong!', 'error');
                    }
                });
            });
        });
        </script>

