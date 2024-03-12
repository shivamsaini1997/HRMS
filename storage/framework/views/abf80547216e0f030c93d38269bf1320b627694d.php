<?php echo $__env->make('frontend.include.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<link rel="stylesheet" href="<?php echo e(asset('public/frontend/assets/css/alert.css')); ?>">
		<!-- Main Wrapper -->
        <div class="main-wrapper">
			

		<?php echo $__env->make('frontend.include.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

			
			<!-- Page Wrapper -->
            <div class="page-wrapper">
			
				<!-- Page Content -->
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">Profile</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="admin-dashboard.html">Dashboard</a></li>
									<li class="breadcrumb-item active">Profile</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<div class="card mb-0">
						<div class="card-body">
							<div class="row">
							<?php
							$fullName = $getuser->firstname;

							$words = explode(' ', $fullName);

						
							$initials = '';

							
							foreach ($words as $word) {
								$initials .= strtoupper(substr($word, 0, 1));
							}
						?>
								<div class="col-md-12">
									<div class="profile-view">
										<div class="profile-img-wrap">
											<div class="profile-img">
												<a href="#" class="welcome-img em-dashboard">
												<?php if($getuser->image != null): ?>
													<img src="<?php echo e(url('public/uploads/profile')); ?>/<?php echo e($getuser->image); ?>" alt="<?php echo e($getuser->firstname); ?>">
													<?php else: ?>
													<span class="em-name-show"><?php echo e($initials); ?></span>
												<?php endif; ?>
												</a>
											</div>
										</div>
										<div class="profile-basic">
											<div class="row">
												<div class="col-md-5">
													<div class="profile-info-left">
														<h3 class="user-name m-t-0 mb-0"><?php echo e($getuser->firstname); ?></h3>
														<h6 class="text-muted"><?php echo e($getuser->dept); ?></h6>
														<small class="text-muted"><?php echo e($getuser->design); ?></small>
														<div class="staff-id">Employee ID : <?php echo e($getuser->emp_id); ?></div>
														<div class="small doj text-muted"><?php echo e($getuser->orgname); ?></div>
														<div class="small text-muted">Joining date : <?php if($get_emp_details != null): ?> <?php echo e($get_emp_details->doj); ?> <?php else: ?> -- <?php endif; ?></div>
														<?php if($get_assigned_emp_manager_teamlead != null && $get_assigned_emp_manager_teamlead->managername != null): ?>
															<div class="small doj text-muted">Manager: <?php echo e($get_assigned_emp_manager_teamlead->managername); ?></div>
														<?php endif; ?>
														<?php if($get_assigned_emp_manager_teamlead != null && $get_assigned_emp_manager_teamlead->teamleadname != null): ?>
															<div class="small doj text-muted">Team Lead : <?php echo e($get_assigned_emp_manager_teamlead->teamleadname); ?></div>
														<?php endif; ?>
													</div>
												</div>
												<div class="col-md-7">
													<ul class="personal-info">
														<li>
															<div class="title">Phone:</div>
															<div class="text"><a href="#"><?php echo e($getuser->phone_no); ?></a></div>
														</li>
														<li>
															<div class="title">Email:</div>
															<div class="text"><a href="#"><?php echo e($getuser->email); ?></a></div>
														</li>
														<li>
															<div class="title">Birthday:</div>
															<div class="text"><?php if($get_emp_details != null): ?> <?php echo e($get_emp_details->dob); ?> <?php else: ?> -- <?php endif; ?></div>
														</li>
														<li>
															<div class="title">Address:</div>
															<div class="text"><?php if($get_emp_details != null): ?> <?php echo e($get_emp_details->address); ?> <?php else: ?> -- <?php endif; ?></div>
														</li>
														<li>
															<div class="title">Gender:</div>
															<div class="text"><?php if($get_emp_details != null): ?> <?php echo e($get_emp_details->gender); ?> <?php else: ?> -- <?php endif; ?></div>
														</li>
														
													</ul>
												</div>
											</div>
										</div>
										<?php if($get_emp_details == null): ?>
											<div class="pro-edit"><a data-bs-target="#profile_info" data-bs-toggle="modal" class="edit-icon editprof" href="#"><i class="fa-solid fa-pencil"></i></a></div>
										<?php endif; ?>
									</div>
								</div>
							</div>
						</div>
					</div>
					
					<div class="card tab-box">
						<div class="row user-tabs">
							<div class="col-lg-12 col-md-12 col-sm-12 line-tabs">
								<ul class="nav nav-tabs nav-tabs-bottom">
									<li class="nav-item"><a href="#emp_profile" data-bs-toggle="tab" class="nav-link active">Profile</a></li>
									<!-- <li class="nav-item"><a href="#emp_projects" data-bs-toggle="tab" class="nav-link">Projects</a></li> -->
									<!-- <li class="nav-item"><a href="#bank_statutory" data-bs-toggle="tab" class="nav-link">Bank & Statutory <small class="text-danger">(Admin Only)</small></a></li> -->
									<!-- <li class="nav-item"><a href="#emp_assets" data-bs-toggle="tab" class="nav-link">Assets</a></li> -->
								</ul>
							</div>
						</div>
					</div>
					
					<div class="tab-content">
					
						<!-- Profile Info Tab -->
						<div id="emp_profile" class="pro-overview tab-pane fade show active">
							<div class="row">
								<div class="col-md-6 d-flex">
									<div class="card profile-box flex-fill">
										<div class="card-body">
											<h3 class="card-title">Personal Informations 
											<?php if($get_emp_details == null): ?>
												<a href="#" class="edit-icon editpi" data-bs-toggle="modal" data-bs-target="#personal_info_modal"><i class="fa-solid fa-pencil"></i></a>
											<?php endif; ?>
											</h3>
											<ul class="personal-info">
												
												<li>
													<div class="title">Nationality</div>
													<div class="text"><?php if($get_emp_details == null): ?> -- <?php else: ?> <?php echo e($get_emp_details->nationality); ?> <?php endif; ?></div>
												</li>
												<li>
													<div class="title">State</div>
													<div class="text"><?php if($get_emp_details == null): ?> -- <?php else: ?> <?php echo e($get_emp_details->state); ?> <?php endif; ?></div>
												</li>
												<li>
													<div class="title">Religion</div>
													<div class="text"><?php if($get_emp_details == null): ?> -- <?php else: ?> <?php echo e($get_emp_details->religion); ?> <?php endif; ?></div>
												</li>
												<li>
													<div class="title">Marital status</div>
													<div class="text"><?php if($get_emp_details == null): ?> -- <?php else: ?> <?php echo e($get_emp_details->maritalstatus); ?> <?php endif; ?></div>
												</li>
												
												<li>
													<div class="title">No. of children</div>
													<div class="text"><?php if($get_emp_details == null): ?> -- <?php else: ?> <?php echo e($get_emp_details->noofchildren); ?> <?php endif; ?></div>
												</li>
											</ul>
										</div>
									</div>
								</div>
								<div class="col-md-6 d-flex">
									<div class="card profile-box flex-fill">
										<div class="card-body">
											<h3 class="card-title">Emergency Contact 
											<?php if($get_emp_emargency_contact ==null): ?>	
												<a href="#" class="edit-icon editec" data-bs-toggle="modal" data-bs-target="#emergency_contact_modal"><i class="fa-solid fa-pencil"></i></a>
											<?php endif; ?>
											</h3>
											<h5 class="section-title">Primary</h5>
											<ul class="personal-info">
												<li>
													<div class="title">Name</div>
													<div class="text"><?php if($get_emp_emargency_contact !=null): ?> <?php echo e($get_emp_emargency_contact->primary_name); ?> <?php else: ?> -- <?php endif; ?></div>
												</li>
												<li>
													<div class="title">Relationship</div>
													<div class="text"><?php if($get_emp_emargency_contact !=null): ?> <?php echo e($get_emp_emargency_contact->primary_relationship); ?> <?php else: ?> -- <?php endif; ?></div>
												</li>
												<li>
													<div class="title">Phone </div>
													<div class="text"><?php if($get_emp_emargency_contact !=null): ?> <?php echo e($get_emp_emargency_contact->	primary_contact); ?> <?php else: ?> -- <?php endif; ?></div>
												</li>
											</ul>
											<hr>
											<h5 class="section-title">Secondary</h5>
											<ul class="personal-info">
												<li>
													<div class="title">Name</div>
													<div class="text"><?php if($get_emp_emargency_contact !=null): ?> <?php echo e($get_emp_emargency_contact->secondary_name); ?> <?php else: ?> -- <?php endif; ?></div>
												</li>
												<li>
													<div class="title">Relationship</div>
													<div class="text"><?php if($get_emp_emargency_contact !=null): ?> <?php echo e($get_emp_emargency_contact->secondary_relationship); ?> <?php else: ?> -- <?php endif; ?></div>
												</li>
												<li>
													<div class="title">Phone </div>
													<div class="text"><?php if($get_emp_emargency_contact !=null): ?> <?php echo e($get_emp_emargency_contact->secondary_contact); ?> <?php else: ?> -- <?php endif; ?></div>
												</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6 d-flex">
									<div class="card profile-box flex-fill">
										<div class="card-body">
											<h3 class="card-title">Bank information
											<?php if($get_emp_bank_details == null): ?>
												<a href="#" class="edit-icon editacd" data-bs-toggle="modal" data-bs-target="#bank_contact_modal"><i class="fa-solid fa-pencil"></i></a>
											<?php endif; ?>
											</h3>
											<ul class="personal-info">
												<li>
													<div class="title">Account Holder Name</div>
													<div class="text"><?php if($get_emp_bank_details != null): ?><?php echo e($get_emp_bank_details->account_holder_name); ?> <?php else: ?> -- <?php endif; ?></div>
												</li>
												<li>
													<div class="title">Bank name</div>
													<div class="text"><?php if($get_emp_bank_details != null): ?><?php echo e($get_emp_bank_details->bankname); ?> <?php else: ?> -- <?php endif; ?></div>
												</li>
												<li>
													<div class="title">Bank account No.</div>
													<div class="text"><?php if($get_emp_bank_details != null): ?><?php echo e($get_emp_bank_details->bankaccount); ?> <?php else: ?> -- <?php endif; ?></div>
												</li>
												<li>
													<div class="title">IFSC Code</div>
													<div class="text"><?php if($get_emp_bank_details != null): ?><?php echo e($get_emp_bank_details->ifsccode); ?> <?php else: ?> -- <?php endif; ?></div>
												</li>
												<li>
													<div class="title">PAN No</div>
													<div class="text"><?php if($get_emp_bank_details != null): ?><?php echo e($get_emp_bank_details->panno); ?> <?php else: ?> -- <?php endif; ?></div>
												</li>
												<li>
													<div class="title">PAN Documents</div>
													<div class="text"><img src="<?php if($get_emp_bank_details != null): ?> <?php echo e(url('public/uploads/pandocument')); ?>/<?php echo e($get_emp_bank_details->pandocument); ?> <?php endif; ?>" alt=""></div>
												</li>
												<li>
													<div class="title">Bank Statement</div>
													<div class="text"><img src="<?php if($get_emp_bank_details != null): ?> <?php echo e(url('public/uploads/bankstatement')); ?>/<?php echo e($get_emp_bank_details->bankstatement); ?> <?php endif; ?>" alt=""></div>
												</li>
											</ul>
										</div>
									</div>
								</div>
								<!-- <div class="col-md-6 d-flex">
									<div class="card profile-box flex-fill">
										<div class="card-body">
											<h3 class="card-title">Family Informations <a href="#" class="edit-icon" data-bs-toggle="modal" data-bs-target="#family_info_modal"><i class="fa-solid fa-pencil"></i></a></h3>
											<div class="table-responsive">
												<table class="table table-nowrap">
													<thead>
														<tr>
															<th>Name</th>
															<th>Relationship</th>
															<th>Date of Birth</th>
															<th>Phone</th>
															<th></th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td>Leo</td>
															<td>Brother</td>
															<td>Feb 16th, 2019</td>
															<td>9876543210</td>
															<td class="text-end">
																<div class="dropdown dropdown-action">
																	<a aria-expanded="false" data-bs-toggle="dropdown" class="action-icon dropdown-toggle" href="#"><i class="material-icons">more_vert</i></a>
																	<div class="dropdown-menu dropdown-menu-right">
																		<a href="#" class="dropdown-item"><i class="fa-solid fa-pencil m-r-5"></i> Edit</a>
																		<a href="#" class="dropdown-item"><i class="fa-regular fa-trash-can m-r-5"></i> Delete</a>
																	</div>
																</div>
															</td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div> -->
							</div>
							<!-- <div class="row">
								<div class="col-md-6 d-flex">
									<div class="card profile-box flex-fill">
										<div class="card-body">
											<h3 class="card-title">Education Informations <a href="#" class="edit-icon" data-bs-toggle="modal" data-bs-target="#education_info"><i class="fa-solid fa-pencil"></i></a></h3>
											<div class="experience-box">
												<ul class="experience-list">
													<li>
														<div class="experience-user">
															<div class="before-circle"></div>
														</div>
														<div class="experience-content">
															<div class="timeline-content">
																<a href="#/" class="name">International College of Arts and Science (UG)</a>
																<div>Bsc Computer Science</div>
																<span class="time">2000 - 2003</span>
															</div>
														</div>
													</li>
													<li>
														<div class="experience-user">
															<div class="before-circle"></div>
														</div>
														<div class="experience-content">
															<div class="timeline-content">
																<a href="#/" class="name">International College of Arts and Science (PG)</a>
																<div>Msc Computer Science</div>
																<span class="time">2000 - 2003</span>
															</div>
														</div>
													</li>
												</ul>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-6 d-flex">
									<div class="card profile-box flex-fill">
										<div class="card-body">
											<h3 class="card-title">Experience <a href="#" class="edit-icon" data-bs-toggle="modal" data-bs-target="#experience_info"><i class="fa-solid fa-pencil"></i></a></h3>
											<div class="experience-box">
												<ul class="experience-list">
													<li>
														<div class="experience-user">
															<div class="before-circle"></div>
														</div>
														<div class="experience-content">
															<div class="timeline-content">
																<a href="#/" class="name">Web Designer at Zen Corporation</a>
																<span class="time">Jan 2013 - Present (5 years 2 months)</span>
															</div>
														</div>
													</li>
													<li>
														<div class="experience-user">
															<div class="before-circle"></div>
														</div>
														<div class="experience-content">
															<div class="timeline-content">
																<a href="#/" class="name">Web Designer at Ron-tech</a>
																<span class="time">Jan 2013 - Present (5 years 2 months)</span>
															</div>
														</div>
													</li>
													<li>
														<div class="experience-user">
															<div class="before-circle"></div>
														</div>
														<div class="experience-content">
															<div class="timeline-content">
																<a href="#/" class="name">Web Designer at Dalt Technology</a>
																<span class="time">Jan 2013 - Present (5 years 2 months)</span>
															</div>
														</div>
													</li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div> -->
						</div>
						<!-- /Profile Info Tab -->
						
						<!-- Projects Tab -->
						<!-- <div class="tab-pane fade" id="emp_projects">
							<div class="row">
								<div class="col-lg-4 col-sm-6 col-md-4 col-xl-3">
									<div class="card">
										<div class="card-body">
											<div class="dropdown profile-action">
												<a aria-expanded="false" data-bs-toggle="dropdown" class="action-icon dropdown-toggle" href="#"><i class="material-icons">more_vert</i></a>
												<div class="dropdown-menu dropdown-menu-right">
													<a data-bs-target="#edit_project" data-bs-toggle="modal" href="#" class="dropdown-item"><i class="fa-solid fa-pencil m-r-5"></i> Edit</a>
													<a data-bs-target="#delete_project" data-bs-toggle="modal" href="#" class="dropdown-item"><i class="fa-regular fa-trash-can m-r-5"></i> Delete</a>
												</div>
											</div>
											<h4 class="project-title"><a href="project-view.html">Office Management</a></h4>
											<small class="block text-ellipsis m-b-15">
												<span class="text-xs">1</span> <span class="text-muted">open tasks, </span>
												<span class="text-xs">9</span> <span class="text-muted">tasks completed</span>
											</small>
											<p class="text-muted">Lorem Ipsum is simply dummy text of the printing and
												typesetting industry. When an unknown printer took a galley of type and
												scrambled it...
											</p>
											<div class="pro-deadline m-b-15">
												<div class="sub-title">
													Deadline:
												</div>
												<div class="text-muted">
													17 Apr 2019
												</div>
											</div>
											<div class="project-members m-b-15">
												<div>Project Leader :</div>
												<ul class="team-members">
													<li>
														<a href="#" data-bs-toggle="tooltip" title="Jeffery Lalor"><img src="assets/img/profiles/avatar-16.jpg" alt="User Image"></a>
													</li>
												</ul>
											</div>
											<div class="project-members m-b-15">
												<div>Team :</div>
												<ul class="team-members">
													<li>
														<a href="#" data-bs-toggle="tooltip" title="John Doe"><img src="assets/img/profiles/avatar-02.jpg" alt="User Image"></a>
													</li>
													<li>
														<a href="#" data-bs-toggle="tooltip" title="Richard Miles"><img src="assets/img/profiles/avatar-09.jpg" alt="User Image"></a>
													</li>
													<li>
														<a href="#" data-bs-toggle="tooltip" title="John Smith"><img src="assets/img/profiles/avatar-10.jpg" alt="User Image"></a>
													</li>
													<li>
														<a href="#" data-bs-toggle="tooltip" title="Mike Litorus"><img src="assets/img/profiles/avatar-05.jpg" alt="User Image"></a>
													</li>
													<li>
														<a href="#" class="all-users">+15</a>
													</li>
												</ul>
											</div>
											<p class="m-b-5">Progress <span class="text-success float-end">40%</span></p>
											<div class="progress progress-xs mb-0">
												<div class="w-40" title="" data-bs-toggle="tooltip" role="progressbar" class="progress-bar bg-success" data-original-title="40%"></div>
											</div>
										</div>
									</div>
								</div>
								
								<div class="col-lg-4 col-sm-6 col-md-4 col-xl-3">
									<div class="card">
										<div class="card-body">
											<div class="dropdown profile-action">
												<a aria-expanded="false" data-bs-toggle="dropdown" class="action-icon dropdown-toggle" href="#"><i class="material-icons">more_vert</i></a>
												<div class="dropdown-menu dropdown-menu-right">
													<a data-bs-target="#edit_project" data-bs-toggle="modal" href="#" class="dropdown-item"><i class="fa-solid fa-pencil m-r-5"></i> Edit</a>
													<a data-bs-target="#delete_project" data-bs-toggle="modal" href="#" class="dropdown-item"><i class="fa-regular fa-trash-can m-r-5"></i> Delete</a>
												</div>
											</div>
											<h4 class="project-title"><a href="project-view.html">Project Management</a></h4>
											<small class="block text-ellipsis m-b-15">
												<span class="text-xs">2</span> <span class="text-muted">open tasks, </span>
												<span class="text-xs">5</span> <span class="text-muted">tasks completed</span>
											</small>
											<p class="text-muted">Lorem Ipsum is simply dummy text of the printing and
												typesetting industry. When an unknown printer took a galley of type and
												scrambled it...
											</p>
											<div class="pro-deadline m-b-15">
												<div class="sub-title">
													Deadline:
												</div>
												<div class="text-muted">
													17 Apr 2019
												</div>
											</div>
											<div class="project-members m-b-15">
												<div>Project Leader :</div>
												<ul class="team-members">
													<li>
														<a href="#" data-bs-toggle="tooltip" title="Jeffery Lalor"><img src="assets/img/profiles/avatar-16.jpg" alt="User Image"></a>
													</li>
												</ul>
											</div>
											<div class="project-members m-b-15">
												<div>Team :</div>
												<ul class="team-members">
													<li>
														<a href="#" data-bs-toggle="tooltip" title="John Doe"><img src="assets/img/profiles/avatar-02.jpg" alt="User Image"></a>
													</li>
													<li>
														<a href="#" data-bs-toggle="tooltip" title="Richard Miles"><img src="assets/img/profiles/avatar-09.jpg" alt="User Image"></a>
													</li>
													<li>
														<a href="#" data-bs-toggle="tooltip" title="John Smith"><img src="assets/img/profiles/avatar-10.jpg" alt="User Image"></a>
													</li>
													<li>
														<a href="#" data-bs-toggle="tooltip" title="Mike Litorus"><img src="assets/img/profiles/avatar-05.jpg" alt="User Image"></a>
													</li>
													<li>
														<a href="#" class="all-users">+15</a>
													</li>
												</ul>
											</div>
											<p class="m-b-5">Progress <span class="text-success float-end">40%</span></p>
											<div class="progress progress-xs mb-0">
												<div class="w-40" title="" data-bs-toggle="tooltip" role="progressbar" class="progress-bar bg-success" data-original-title="40%"></div>
											</div>
										</div>
									</div>
								</div>
								
								<div class="col-lg-4 col-sm-6 col-md-4 col-xl-3">
									<div class="card">
										<div class="card-body">
											<div class="dropdown profile-action">
												<a aria-expanded="false" data-bs-toggle="dropdown" class="action-icon dropdown-toggle" href="#"><i class="material-icons">more_vert</i></a>
												<div class="dropdown-menu dropdown-menu-right">
													<a data-bs-target="#edit_project" data-bs-toggle="modal" href="#" class="dropdown-item"><i class="fa-solid fa-pencil m-r-5"></i> Edit</a>
													<a data-bs-target="#delete_project" data-bs-toggle="modal" href="#" class="dropdown-item"><i class="fa-regular fa-trash-can m-r-5"></i> Delete</a>
												</div>
											</div>
											<h4 class="project-title"><a href="project-view.html">Video Calling App</a></h4>
											<small class="block text-ellipsis m-b-15">
												<span class="text-xs">3</span> <span class="text-muted">open tasks, </span>
												<span class="text-xs">3</span> <span class="text-muted">tasks completed</span>
											</small>
											<p class="text-muted">Lorem Ipsum is simply dummy text of the printing and
												typesetting industry. When an unknown printer took a galley of type and
												scrambled it...
											</p>
											<div class="pro-deadline m-b-15">
												<div class="sub-title">
													Deadline:
												</div>
												<div class="text-muted">
													17 Apr 2019
												</div>
											</div>
											<div class="project-members m-b-15">
												<div>Project Leader :</div>
												<ul class="team-members">
													<li>
														<a href="#" data-bs-toggle="tooltip" title="Jeffery Lalor"><img src="assets/img/profiles/avatar-16.jpg" alt="User Image"></a>
													</li>
												</ul>
											</div>
											<div class="project-members m-b-15">
												<div>Team :</div>
												<ul class="team-members">
													<li>
														<a href="#" data-bs-toggle="tooltip" title="John Doe"><img src="assets/img/profiles/avatar-02.jpg" alt="User Image"></a>
													</li>
													<li>
														<a href="#" data-bs-toggle="tooltip" title="Richard Miles"><img src="assets/img/profiles/avatar-09.jpg" alt="User Image"></a>
													</li>
													<li>
														<a href="#" data-bs-toggle="tooltip" title="John Smith"><img src="assets/img/profiles/avatar-10.jpg" alt="User Image"></a>
													</li>
													<li>
														<a href="#" data-bs-toggle="tooltip" title="Mike Litorus"><img src="assets/img/profiles/avatar-05.jpg" alt="User Image"></a>
													</li>
													<li>
														<a href="#" class="all-users">+15</a>
													</li>
												</ul>
											</div>
											<p class="m-b-5">Progress <span class="text-success float-end">40%</span></p>
											<div class="progress progress-xs mb-0">
												<div class="w-40" title="" data-bs-toggle="tooltip" role="progressbar" class="progress-bar bg-success" data-original-title="40%"></div>
											</div>
										</div>
									</div>
								</div>
								
								<div class="col-lg-4 col-sm-6 col-md-4 col-xl-3">
									<div class="card">
										<div class="card-body">
											<div class="dropdown profile-action">
												<a aria-expanded="false" data-bs-toggle="dropdown" class="action-icon dropdown-toggle" href="#"><i class="material-icons">more_vert</i></a>
												<div class="dropdown-menu dropdown-menu-right">
													<a data-bs-target="#edit_project" data-bs-toggle="modal" href="#" class="dropdown-item"><i class="fa-solid fa-pencil m-r-5"></i> Edit</a>
													<a data-bs-target="#delete_project" data-bs-toggle="modal" href="#" class="dropdown-item"><i class="fa-regular fa-trash-can m-r-5"></i> Delete</a>
												</div>
											</div>
											<h4 class="project-title"><a href="project-view.html">Hospital Administration</a></h4>
											<small class="block text-ellipsis m-b-15">
												<span class="text-xs">12</span> <span class="text-muted">open tasks, </span>
												<span class="text-xs">4</span> <span class="text-muted">tasks completed</span>
											</small>
											<p class="text-muted">Lorem Ipsum is simply dummy text of the printing and
												typesetting industry. When an unknown printer took a galley of type and
												scrambled it...
											</p>
											<div class="pro-deadline m-b-15">
												<div class="sub-title">
													Deadline:
												</div>
												<div class="text-muted">
													17 Apr 2019
												</div>
											</div>
											<div class="project-members m-b-15">
												<div>Project Leader :</div>
												<ul class="team-members">
													<li>
														<a href="#" data-bs-toggle="tooltip" title="Jeffery Lalor"><img src="assets/img/profiles/avatar-16.jpg" alt="User Image"></a>
													</li>
												</ul>
											</div>
											<div class="project-members m-b-15">
												<div>Team :</div>
												<ul class="team-members">
													<li>
														<a href="#" data-bs-toggle="tooltip" title="John Doe"><img src="assets/img/profiles/avatar-02.jpg" alt="User Image"></a>
													</li>
													<li>
														<a href="#" data-bs-toggle="tooltip" title="Richard Miles"><img src="assets/img/profiles/avatar-09.jpg" alt="User Image"></a>
													</li>
													<li>
														<a href="#" data-bs-toggle="tooltip" title="John Smith"><img src="assets/img/profiles/avatar-10.jpg" alt="User Image"></a>
													</li>
													<li>
														<a href="#" data-bs-toggle="tooltip" title="Mike Litorus"><img src="assets/img/profiles/avatar-05.jpg" alt="User Image"></a>
													</li>
													<li>
														<a href="#" class="all-users">+15</a>
													</li>
												</ul>
											</div>
											<p class="m-b-5">Progress <span class="text-success float-end">40%</span></p>
											<div class="progress progress-xs mb-0">
												<div class="w-40" title="" data-bs-toggle="tooltip" role="progressbar" class="progress-bar bg-success" data-original-title="40%"></div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div> -->
						<!-- /Projects Tab -->
						
						<!-- Bank Statutory Tab -->
						<!-- <div class="tab-pane fade" id="bank_statutory">
							<div class="card">
								<div class="card-body">
									<h3 class="card-title"> Basic Salary Information</h3>
									<form>
										<div class="row">
											<div class="col-sm-4">
												<div class="input-block mb-3">
													<label class="col-form-label">Salary basis <span class="text-danger">*</span></label>
													<select class="select">
														<option>Select salary basis type</option>
														<option>Hourly</option>
														<option>Daily</option>
														<option>Weekly</option>
														<option>Monthly</option>
													</select>
											   </div>
											</div>
											<div class="col-sm-4">
												<div class="input-block mb-3">
													<label class="col-form-label">Salary amount <small class="text-muted">per month</small></label>
													<div class="input-group">
														<span class="input-group-text">$</span>
														<input type="text" class="form-control" placeholder="Type your salary amount" value="0.00">
													</div>
												</div>
											</div>
											<div class="col-sm-4">
												<div class="input-block mb-3">
													<label class="col-form-label">Payment type</label>
													<select class="select">
														<option>Select payment type</option>
														<option>Bank transfer</option>
														<option>Check</option>
														<option>Cash</option>
													</select>
											   </div>
											</div>
										</div>
										<hr>
										<h3 class="card-title"> PF Information</h3>
										<div class="row">
											<div class="col-sm-4">
												<div class="input-block mb-3">
													<label class="col-form-label">PF contribution</label>
													<select class="select">
														<option>Select PF contribution</option>
														<option>Yes</option>
														<option>No</option>
													</select>
												</div>
											</div>
											<div class="col-sm-4">
												<div class="input-block mb-3">
													<label class="col-form-label">PF No. <span class="text-danger">*</span></label>
													<select class="select">
														<option>Select PF contribution</option>
														<option>Yes</option>
														<option>No</option>
													</select>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-sm-4">
												<div class="input-block mb-3">
													<label class="col-form-label">Employee PF rate</label>
													<select class="select">
														<option>Select PF contribution</option>
														<option>Yes</option>
														<option>No</option>
													</select>
												</div>
											</div>
											<div class="col-sm-4">
												<div class="input-block mb-3">
													<label class="col-form-label">Additional rate <span class="text-danger">*</span></label>
													<select class="select">
														<option>Select additional rate</option>
														<option>0%</option>
														<option>1%</option>
														<option>2%</option>
														<option>3%</option>
														<option>4%</option>
														<option>5%</option>
														<option>6%</option>
														<option>7%</option>
														<option>8%</option>
														<option>9%</option>
														<option>10%</option>
													</select>
												</div>
											</div>
											<div class="col-sm-4">
												<div class="input-block mb-3">
													<label class="col-form-label">Total rate</label>
													<input type="text" class="form-control" placeholder="N/A" value="11%">
												</div>
											</div>
									   </div>
										<div class="row">
											<div class="col-sm-4">
												<div class="input-block mb-3">
													<label class="col-form-label">Employee PF rate</label>
													<select class="select">
														<option>Select PF contribution</option>
														<option>Yes</option>
														<option>No</option>
													</select>
												</div>
											</div>
											<div class="col-sm-4">
												<div class="input-block mb-3">
													<label class="col-form-label">Additional rate <span class="text-danger">*</span></label>
													<select class="select">
														<option>Select additional rate</option>
														<option>0%</option>
														<option>1%</option>
														<option>2%</option>
														<option>3%</option>
														<option>4%</option>
														<option>5%</option>
														<option>6%</option>
														<option>7%</option>
														<option>8%</option>
														<option>9%</option>
														<option>10%</option>
													</select>
												</div>
											</div>
											<div class="col-sm-4">
												<div class="input-block mb-3">
													<label class="col-form-label">Total rate</label>
													<input type="text" class="form-control" placeholder="N/A" value="11%">
												</div>
											</div>
										</div>
										
										<hr>
										<h3 class="card-title"> ESI Information</h3>
										<div class="row">
											<div class="col-sm-4">
												<div class="input-block mb-3">
													<label class="col-form-label">ESI contribution</label>
													<select class="select">
														<option>Select ESI contribution</option>
														<option>Yes</option>
														<option>No</option>
													</select>
												</div>
											</div>
											<div class="col-sm-4">
												<div class="input-block mb-3">
													<label class="col-form-label">ESI No. <span class="text-danger">*</span></label>
													<select class="select">
														<option>Select ESI contribution</option>
														<option>Yes</option>
														<option>No</option>
													</select>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-sm-4">
												<div class="input-block mb-3">
													<label class="col-form-label">Employee ESI rate</label>
													<select class="select">
														<option>Select ESI contribution</option>
														<option>Yes</option>
														<option>No</option>
													</select>
												</div>
											</div>
											<div class="col-sm-4">
												<div class="input-block mb-3">
													<label class="col-form-label">Additional rate <span class="text-danger">*</span></label>
													<select class="select">
														<option>Select additional rate</option>
														<option>0%</option>
														<option>1%</option>
														<option>2%</option>
														<option>3%</option>
														<option>4%</option>
														<option>5%</option>
														<option>6%</option>
														<option>7%</option>
														<option>8%</option>
														<option>9%</option>
														<option>10%</option>
													</select>
												</div>
											</div>
											<div class="col-sm-4">
												<div class="input-block mb-3">
													<label class="col-form-label">Total rate</label>
													<input type="text" class="form-control" placeholder="N/A" value="11%">
												</div>
											</div>
									   </div>
										
										<div class="submit-section">
											<button class="btn btn-primary submit-btn" type="submit">Save</button>
										</div>
									</form>
								</div>
							</div>
						</div> -->
						<!-- /Bank Statutory Tab -->
						
						<!-- Assets -->
						<!-- <div class="tab-pane fade" id="emp_assets">
							<div class="table-responsive table-newdatatable">
								<table class="table table-new custom-table mb-0 datatable">
									<thead>
										<tr>
											<th>#</th>
											<th>Name</th>
											<th>Asset ID</th>
											<th>Assigned Date</th>
											<th>Assignee</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>1</td>
											<td>
												<a href="assets-details.html" class="table-imgname">
													<img src="assets/img/laptop.png" class="me-2" alt="Laptop Image">
													<span>Laptop</span>
												</a>
											</td>
											<td>AST - 001</td>
											<td>22 Nov, 2022    10:32AM</td>
											<td class="table-namesplit">
												<a href="javascript:void(0);" class="table-profileimage">
													<img src="assets/img/profiles/avatar-02.jpg" class="me-2" alt="User Image">
												</a>
												<a href="javascript:void(0);" class="table-name">
													<span>John Paul Raj</span>
													<p><span class="__cf_email__" data-cfemail="ee84818680ae8a9c8b8f83899b979d9a8b8d86c08d8183">[email&#160;protected]</span></p>
												</a>
											</td>
											<td>
												<div class="table-actions d-flex">
													<a class="delete-table me-2" href="user-asset-details.html">
													   <img src="assets/img/icons/eye.svg" alt="Eye Icon">
													</a>
												</div>
											</td>
										</tr>
										<tr>
											<td>2</td>
											<td>
												<a href="assets-details.html" class="table-imgname">
													<img src="assets/img/laptop.png" class="me-2" alt="Laptop Image">
													<span>Laptop</span>
												</a>
											</td>
											<td>AST - 002</td>
											<td>22 Nov, 2022    10:32AM</td>
											<td class="table-namesplit">
												<a href="javascript:void(0);" class="table-profileimage" data-bs-toggle="modal" data-bs-target="#edit-asset">
													<img src="assets/img/profiles/avatar-05.jpg" class="me-2" alt="User Image">
												</a>
												<a href="javascript:void(0);" class="table-name">
													<span>Vinod Selvaraj</span>
													<p><span class="__cf_email__" data-cfemail="fb8d9295949fd588bb9f899e9a969c8e82888f9e9893d5989496">[email&#160;protected]</span></p>
												</a>
											</td>
											<td>
												<div class="table-actions d-flex">
													<a class="delete-table me-2" href="user-asset-details.html">
													   <img src="assets/img/icons/eye.svg" alt="Eye Icon">
													</a>
												</div>
											</td>
										</tr>
										<tr>
											<td>3</td>
											<td>
												<a href="assets-details.html" class="table-imgname">
													<img src="assets/img/keyboard.png" class="me-2" alt="Keyboard Image">
													<span>Dell Keyboard</span>
												</a>
											</td>
											<td>AST - 003</td>
											<td>22 Nov, 2022    10:32AM</td>
											<td class="table-namesplit">
												<a href="javascript:void(0);" class="table-profileimage" data-bs-toggle="modal" data-bs-target="#edit-asset">
													<img src="assets/img/profiles/avatar-03.jpg" class="me-2" alt="User Image">
												</a>
												<a href="javascript:void(0);" class="table-name">
													<span>Harika </span>
													<p><span class="__cf_email__" data-cfemail="e58d84978c8e84cb93a5819780848882909c969180868dcb868a88">[email&#160;protected]</span></p>
												</a>
											</td>
											<td>
												<div class="table-actions d-flex">
													<a class="delete-table me-2" href="user-asset-details.html">
													   <img src="assets/img/icons/eye.svg" alt="Eye Icon">
													</a>
												</div>
											</td>
										</tr>
										<tr>
											<td>4</td>
											<td>
												<a href="#" class="table-imgname">
													<img src="assets/img/mouse.png" class="me-2" alt="Mouse Image">
													<span>Logitech Mouse</span>
												</a>
											</td>
											<td>AST - 0024</td>
											<td>22 Nov, 2022    10:32AM</td>
											<td class="table-namesplit">
												<a href="assets-details.html" class="table-profileimage" >
													<img src="assets/img/profiles/avatar-02.jpg" class="me-2" alt="User Image">
												</a>
												<a href="assets-details.html" class="table-name">
													<span>Mythili</span>
													<p><span class="__cf_email__" data-cfemail="4825313c20212421082c3a2d29252f3d313b3c2d2b20662b2725">[email&#160;protected]</span></p>
												</a>
											</td>
											<td>
												<div class="table-actions d-flex">
													<a class="delete-table me-2" href="user-asset-details.html">
													   <img src="assets/img/icons/eye.svg" alt="Eye Icon">
													</a>
												</div>
											</td>
										</tr>
										<tr>
											<td>5</td>
											<td>
												<a href="#" class="table-imgname">
													<img src="assets/img/laptop.png" class="me-2" alt="Laptop Image">
													<span>Laptop</span>
												</a>
											</td>
											<td>AST - 005</td>
											<td>22 Nov, 2022    10:32AM</td>
											<td class="table-namesplit">
												<a href="assets-details.html" class="table-profileimage" >
													<img src="assets/img/profiles/avatar-02.jpg" class="me-2" alt="User Image">
												</a>
												<a href="assets-details.html" class="table-name">
													<span>John Paul Raj</span>
													<p><span class="__cf_email__" data-cfemail="03696c6b6d43677166626e64767a707766606b2d606c6e">[email&#160;protected]</span></p>
												</a>
											</td>
											<td>
												<div class="table-actions d-flex">
													<a class="delete-table me-2" href="user-asset-details.html">
													   <img src="assets/img/icons/eye.svg" alt="Eye Icon">
													</a>
												</div>
											</td>
										</tr>
										<tr>
											<td>6</td>
											<td>
												<a href="#" class="table-imgname">
													<img src="assets/img/laptop.png" class="me-2" alt="Laptop Image">
													<span>Laptop</span>
												</a>
											</td>
											<td>AST - 006</td>
											<td>22 Nov, 2022    10:32AM</td>
											<td class="table-namesplit">
												<a href="javascript:void(0);" class="table-profileimage" >
													<img src="assets/img/profiles/avatar-05.jpg" class="me-2" alt="User Image">
												</a>
												<a href="javascript:void(0);" class="table-name">
													<span>Vinod Selvaraj</span>
													<p><span class="__cf_email__" data-cfemail="f7819e999893d984b7938592969a90828e848392949fd994989a">[email&#160;protected]</span></p>
												</a>
											</td>
											<td>
												<div class="table-actions d-flex">
													<a class="delete-table me-2" href="user-asset-details.html">
													   <img src="assets/img/icons/eye.svg" alt="Eye Icon">
													</a>
												</div>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div> -->
						<!-- /Assets -->
						
					</div>
                </div>
				<!-- /Page Content -->
				
				<!-- Profile Modal -->
				<div id="profile_info" class="modal custom-modal fade" role="dialog">
					<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Profile Information</h5>
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form action="javascript:void(0)"  id="myForm2" method="post" enctype="multipart/form-data">
									<div class="row">
										<div class="col-md-12">
											<div class="profile-img-wrap edit-img">
												<img class="inline-block" src="<?php echo e(url('public/uploads/profile')); ?>/<?php echo e($getuser->image); ?>" alt="User Image">
												<div class="fileupload btn">
													<span class="btn-text">edit</span>
													<input class="upload" type="file" id="profileImageInput" name="profileImage">
												</div>
											</div>
											<div class="row">
												<div class="col-md-12">
													<div class="input-block mb-3">
														<label class="col-form-label">Full Name<span class="text-danger">*</span></label>
														<input type="text" class="form-control" name="fname" id="fname" value="">
													</div>
												</div>
												
												<div class="col-md-6">
													<div class="input-block mb-3">
														<label class="col-form-label">Birth Date<span class="text-danger">*</span></label>
														<div class="cal-icon">
															<input class="form-control" type="date" name="dob" id="dob" value="">
														</div>
													</div>
												</div>
												<div class="col-md-6">
													<div class="input-block mb-3">
														<label class="col-form-label">Gender<span class="text-danger">*</span></label>
														<input type="text" class="form-control" name="gen" id="gen" value="">
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="input-block mb-3">
												<label class="col-form-label">Address<span class="text-danger">*</span></label>
												<input type="text" class="form-control" name="add" id="add" value="">
											</div>
										</div>
										<div class="col-md-6">
											<div class="input-block mb-3">
												<label class="col-form-label">State<span class="text-danger">*</span></label>
												<input type="text" class="form-control" name="st" id="st" value="">
											</div>
										</div>
										<div class="col-md-6">
											<div class="input-block mb-3">
												<label class="col-form-label">Country<span class="text-danger">*</span></label>
												<input type="text" class="form-control" name="cn" id="cn" value="">
											</div>
										</div>
										<div class="col-md-6">
											<div class="input-block mb-3">
												<label class="col-form-label">Pin Code<span class="text-danger">*</span></label>
												<input type="text" class="form-control" name="pin" id="pin" value="">
											</div>
										</div>
										<div class="col-md-6">
											<div class="input-block mb-3">
												<label class="col-form-label">Phone Number<span class="text-danger">*</span></label>
												<input type="text" class="form-control" name="phno" id="phno" value="">
											</div>
										</div>
										<div class="col-md-6">
											<div class="input-block mb-3">
												<label class="col-form-label">Designation <span class="text-danger">*</span></label>
												<input type="text" class="form-control" name="deg" id="deg" value="">
											</div>
										</div>
										<div class="col-md-6">
													<div class="input-block mb-3">
														<label class="col-form-label">Joining Date<span class="text-danger">*</span></label>
														<div class="cal-icon">
															<input class="form-control" type="date" name="dj" id="dj" value="">
														</div>
													</div>
												</div>
									</div>
									<div class="submit-section">
										<button class="btn btn-primary submit-btn subpr">Submit</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<!-- /Profile Modal -->
				
				<!-- Personal Info Modal -->
				<div id="personal_info_modal" class="modal custom-modal fade" role="dialog">
					<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Personal Information</h5>
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form action="javascript:void(0)"  id="myForm3" method="post">
									<div class="row">
										
										<div class="col-md-6">
											<div class="input-block mb-3">
												<label class="col-form-label">Nationality <span class="text-danger">*</span></label>
												<input class="form-control" type="text" name="nat" id="nat">
											</div>
										</div>
										<div class="col-md-6">
											<div class="input-block mb-3">
												<label class="col-form-label">State<span class="text-danger">*</span></label>
												<input class="form-control" type="text" name="sta" id="sta">
											</div>
										</div>
										<div class="col-md-6">
											<div class="input-block mb-3">
												<label class="col-form-label">Religion<span class="text-danger">*</span></label>
												
													<input class="form-control" type="text" name="rel" id="rel">
												
											</div>
										</div>
										<div class="col-md-6">
											<div class="input-block mb-3">
												<label class="col-form-label">Marital status <span class="text-danger">*</span></label>
												
													<input class="form-control" type="text" name="ms" id="ms">
												
											</div>
										</div>
										
										<div class="col-md-6">
											<div class="input-block mb-3">
												<label class="col-form-label">No. of children <span class="text-danger">*</span></label>
												<input class="form-control" type="text" name="noc" id="noc">
											</div>
										</div>
									</div>
									<div class="submit-section">
										<button class="btn btn-primary submit-btn subpi">Submit</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<!-- /Personal Info Modal -->
				
				<!-- Family Info Modal -->
				<div id="family_info_modal" class="modal custom-modal fade" role="dialog">
					<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title"> Family Informations</h5>
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form>
									<div class="form-scroll">
										<div class="card">
											<div class="card-body">
												<h3 class="card-title">Family Member <a href="javascript:void(0);" class="delete-icon"><i class="fa-regular fa-trash-can"></i></a></h3>
												<div class="row">
													<div class="col-md-6">
														<div class="input-block mb-3">
															<label class="col-form-label">Name <span class="text-danger">*</span></label>
															<input class="form-control" type="text">
														</div>
													</div>
													<div class="col-md-6">
														<div class="input-block mb-3">
															<label class="col-form-label">Relationship <span class="text-danger">*</span></label>
															<input class="form-control" type="text">
														</div>
													</div>
													<div class="col-md-6">
														<div class="input-block mb-3">
															<label class="col-form-label">Date of birth <span class="text-danger">*</span></label>
															<input class="form-control" type="text">
														</div>
													</div>
													<div class="col-md-6">
														<div class="input-block mb-3">
															<label class="col-form-label">Phone <span class="text-danger">*</span></label>
															<input class="form-control" type="text">
														</div>
													</div>
												</div>
											</div>
										</div>
										
										<div class="card">
											<div class="card-body">
												<h3 class="card-title">Education Informations <a href="javascript:void(0);" class="delete-icon"><i class="fa-regular fa-trash-can"></i></a></h3>
												<div class="row">
													<div class="col-md-6">
														<div class="input-block mb-3">
															<label class="col-form-label">Name <span class="text-danger">*</span></label>
															<input class="form-control" type="text">
														</div>
													</div>
													<div class="col-md-6">
														<div class="input-block mb-3">
															<label class="col-form-label">Relationship <span class="text-danger">*</span></label>
															<input class="form-control" type="text">
														</div>
													</div>
													<div class="col-md-6">
														<div class="input-block mb-3">
															<label class="col-form-label">Date of birth <span class="text-danger">*</span></label>
															<input class="form-control" type="text">
														</div>
													</div>
													<div class="col-md-6">
														<div class="input-block mb-3">
															<label class="col-form-label">Phone <span class="text-danger">*</span></label>
															<input class="form-control" type="text">
														</div>
													</div>
												</div>
												<div class="add-more">
													<a href="javascript:void(0);"><i class="fa-solid fa-plus-circle"></i> Add More</a>
												</div>
											</div>
										</div>
									</div>
									<div class="submit-section">
										<button class="btn btn-primary submit-btn">Submit</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<!-- /Family Info Modal -->
				
				<!-- Emergency Contact Modal -->
				<div id="emergency_contact_modal" class="modal custom-modal fade" role="dialog">
					<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Emergency Contact</h5>
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form action="javascript:void(0)"  id="myForm4" method="post">
									<div class="card">
										<div class="card-body">
											<h3 class="card-title">Primary Contact</h3>
											<div class="row">
												<div class="col-md-6">
													<div class="input-block mb-3">
														<label class="col-form-label">Name <span class="text-danger">*</span></label>
														<input type="text" class="form-control" name="pn" id="pn">
													</div>
												</div>
												<div class="col-md-6">
													<div class="input-block mb-3">
														<label class="col-form-label">Relationship <span class="text-danger">*</span></label>
														<input class="form-control" type="text" name="pr" id="pr">
													</div>
												</div>
												<div class="col-md-12">
													<div class="input-block mb-3">
														<label class="col-form-label">Phone <span class="text-danger">*</span></label>
														<input class="form-control" type="text" name="pp" id="pp">
													</div>
												</div>
												
											</div>
										</div>
									</div>
									
									<div class="card">
										<div class="card-body">
											<h3 class="card-title">Secondary Contact</h3>
											<div class="row">
												<div class="col-md-6">
													<div class="input-block mb-3">
														<label class="col-form-label">Name <span class="text-danger">*</span></label>
														<input type="text" class="form-control" name="sn" id="sn">
													</div>
												</div>
												<div class="col-md-6">
													<div class="input-block mb-3">
														<label class="col-form-label">Relationship <span class="text-danger">*</span></label>
														<input class="form-control" type="text" name="sr" id="sr">
													</div>
												</div>
												<div class="col-md-12">
													<div class="input-block mb-3">
														<label class="col-form-label">Phone <span class="text-danger">*</span></label>
														<input class="form-control" type="text" name="sp" id="sp">
													</div>
												</div>
												
											</div>
										</div>
									</div>
									<div class="submit-section">
										<button class="btn btn-primary submit-btn subec">Submit</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<!-- /Emergency Contact Modal -->
				

					<!-- Bank information Modal -->
					<div id="bank_contact_modal" class="modal custom-modal fade" role="dialog">
					<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Bank information</h5>
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form action="javascript:void(0)"  id="myForm5" method="post" enctype="multipart/form-data">
									<div class="card">
										<div class="card-body">
											<h3 class="card-title">Bank information</h3>
											<div class="row">
												<div class="col-md-6">
													<div class="input-block mb-3">
														<label class="col-form-label">Account Holder name <span class="text-danger">*</span></label>
														<input type="text" class="form-control" id="ahn" name="ahn">
													</div>
												</div>
												<div class="col-md-6">
													<div class="input-block mb-3">
														<label class="col-form-label">Bank name <span class="text-danger">*</span></label>
														<input type="text" class="form-control" id="bankname" name="bankname">
													</div>
												</div>
												<div class="col-md-6">
													<div class="input-block mb-3">
														<label class="col-form-label">Bank account No. <span class="text-danger">*</span></label>
														<input class="form-control" type="text" id="bankaccount" name="bankaccount">
													</div>
												</div>
												<div class="col-md-6">
													<div class="input-block mb-3">
														<label class="col-form-label">IFSC Code <span class="text-danger">*</span></label>
														<input class="form-control" type="text" id="ifsccode" name="ifsccode">
													</div>
												</div>
												<div class="col-md-6">
													<div class="input-block mb-3">
														<label class="col-form-label">PAN No<span class="text-danger">*</span></label>
														<input class="form-control" type="text" id="panno" name="panno">
													</div>
												</div>
												<div class="col-md-6">
													<div class="input-block mb-3">
														<label class="col-form-label">PAN Documents</label>
														<input class="form-control" type="file" id="pandocument" name="pandocument">
													</div>
												</div>
												<div class="col-md-6">
													<div class="input-block mb-3">
														<label class="col-form-label">Account Frontpage</label>
														<input class="form-control" type="file" id="bankstatement" name="bankstatement">
													</div>
												</div>
												
											</div>
										</div>
									</div>
									
									
									<div class="submit-section">
										<button class="btn btn-primary submit-btn subac">Submit</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<!-- Education Modal -->
				<!-- <div id="education_info" class="modal custom-modal fade" role="dialog">
					<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title"> Education Informations</h5>
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form>
									<div class="form-scroll">
										<div class="card">
											<div class="card-body">
												<h3 class="card-title">Education Informations <a href="javascript:void(0);" class="delete-icon"><i class="fa-regular fa-trash-can"></i></a></h3>
												<div class="row">
													<div class="col-md-6">
														<div class="input-block mb-3 form-focus focused">
															<input type="text" value="Oxford University" class="form-control floating">
															<label class="focus-label">Institution</label>
														</div>
													</div>
													<div class="col-md-6">
														<div class="input-block mb-3 form-focus focused">
															<input type="text" value="Computer Science" class="form-control floating">
															<label class="focus-label">Subject</label>
														</div>
													</div>
													<div class="col-md-6">
														<div class="input-block mb-3 form-focus focused">
															<div class="cal-icon">
																<input type="text" value="01/06/2002" class="form-control floating datetimepicker">
															</div>
															<label class="focus-label">Starting Date</label>
														</div>
													</div>
													<div class="col-md-6">
														<div class="input-block mb-3 form-focus focused">
															<div class="cal-icon">
																<input type="text" value="31/05/2006" class="form-control floating datetimepicker">
															</div>
															<label class="focus-label">Complete Date</label>
														</div>
													</div>
													<div class="col-md-6">
														<div class="input-block mb-3 form-focus focused">
															<input type="text" value="BE Computer Science" class="form-control floating">
															<label class="focus-label">Degree</label>
														</div>
													</div>
													<div class="col-md-6">
														<div class="input-block mb-3 form-focus focused">
															<input type="text" value="Grade A" class="form-control floating">
															<label class="focus-label">Grade</label>
														</div>
													</div>
												</div>
											</div>
										</div>
										
										<div class="card">
											<div class="card-body">
												<h3 class="card-title">Education Informations <a href="javascript:void(0);" class="delete-icon"><i class="fa-regular fa-trash-can"></i></a></h3>
												<div class="row">
													<div class="col-md-6">
														<div class="input-block mb-3 form-focus focused">
															<input type="text" value="Oxford University" class="form-control floating">
															<label class="focus-label">Institution</label>
														</div>
													</div>
													<div class="col-md-6">
														<div class="input-block mb-3 form-focus focused">
															<input type="text" value="Computer Science" class="form-control floating">
															<label class="focus-label">Subject</label>
														</div>
													</div>
													<div class="col-md-6">
														<div class="input-block mb-3 form-focus focused">
															<div class="cal-icon">
																<input type="text" value="01/06/2002" class="form-control floating datetimepicker">
															</div>
															<label class="focus-label">Starting Date</label>
														</div>
													</div>
													<div class="col-md-6">
														<div class="input-block mb-3 form-focus focused">
															<div class="cal-icon">
																<input type="text" value="31/05/2006" class="form-control floating datetimepicker">
															</div>
															<label class="focus-label">Complete Date</label>
														</div>
													</div>
													<div class="col-md-6">
														<div class="input-block mb-3 form-focus focused">
															<input type="text" value="BE Computer Science" class="form-control floating">
															<label class="focus-label">Degree</label>
														</div>
													</div>
													<div class="col-md-6">
														<div class="input-block mb-3 form-focus focused">
															<input type="text" value="Grade A" class="form-control floating">
															<label class="focus-label">Grade</label>
														</div>
													</div>
												</div>
												<div class="add-more">
													<a href="javascript:void(0);"><i class="fa-solid fa-plus-circle"></i> Add More</a>
												</div>
											</div>
										</div>
									</div>
									<div class="submit-section">
										<button class="btn btn-primary submit-btn">Submit</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div> -->
				<!-- /Education Modal -->
				
				<!-- Experience Modal -->
				<!-- <div id="experience_info" class="modal custom-modal fade" role="dialog">
					<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Experience Informations</h5>
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form>
									<div class="form-scroll">
										<div class="card">
											<div class="card-body">
												<h3 class="card-title">Experience Informations <a href="javascript:void(0);" class="delete-icon"><i class="fa-regular fa-trash-can"></i></a></h3>
												<div class="row">
													<div class="col-md-6">
														<div class="input-block mb-3 form-focus">
															<input type="text" class="form-control floating" value="Digital Devlopment Inc">
															<label class="focus-label">Company Name</label>
														</div>
													</div>
													<div class="col-md-6">
														<div class="input-block mb-3 form-focus">
															<input type="text" class="form-control floating" value="United States">
															<label class="focus-label">Location</label>
														</div>
													</div>
													<div class="col-md-6">
														<div class="input-block mb-3 form-focus">
															<input type="text" class="form-control floating" value="Web Developer">
															<label class="focus-label">Job Position</label>
														</div>
													</div>
													<div class="col-md-6">
														<div class="input-block mb-3 form-focus">
															<div class="cal-icon">
																<input type="text" class="form-control floating datetimepicker" value="01/07/2007">
															</div>
															<label class="focus-label">Period From</label>
														</div>
													</div>
													<div class="col-md-6">
														<div class="input-block mb-3 form-focus">
															<div class="cal-icon">
																<input type="text" class="form-control floating datetimepicker" value="08/06/2018">
															</div>
															<label class="focus-label">Period To</label>
														</div>
													</div>
												</div>
											</div>
										</div>
										
										<div class="card">
											<div class="card-body">
												<h3 class="card-title">Experience Informations <a href="javascript:void(0);" class="delete-icon"><i class="fa-regular fa-trash-can"></i></a></h3>
												<div class="row">
													<div class="col-md-6">
														<div class="input-block mb-3 form-focus">
															<input type="text" class="form-control floating" value="Digital Devlopment Inc">
															<label class="focus-label">Company Name</label>
														</div>
													</div>
													<div class="col-md-6">
														<div class="input-block mb-3 form-focus">
															<input type="text" class="form-control floating" value="United States">
															<label class="focus-label">Location</label>
														</div>
													</div>
													<div class="col-md-6">
														<div class="input-block mb-3 form-focus">
															<input type="text" class="form-control floating" value="Web Developer">
															<label class="focus-label">Job Position</label>
														</div>
													</div>
													<div class="col-md-6">
														<div class="input-block mb-3 form-focus">
															<div class="cal-icon">
																<input type="text" class="form-control floating datetimepicker" value="01/07/2007">
															</div>
															<label class="focus-label">Period From</label>
														</div>
													</div>
													<div class="col-md-6">
														<div class="input-block mb-3 form-focus">
															<div class="cal-icon">
																<input type="text" class="form-control floating datetimepicker" value="08/06/2018">
															</div>
															<label class="focus-label">Period To</label>
														</div>
													</div>
												</div>
												<div class="add-more">
													<a href="javascript:void(0);"><i class="fa-solid fa-plus-circle"></i> Add More</a>
												</div>
											</div>
										</div>
									</div>
									<div class="submit-section">
										<button class="btn btn-primary submit-btn">Submit</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div> -->
				<!-- /Experience Modal -->
				
            </div>
			<!-- /Page Wrapper -->

        </div>
		<!-- /Main Wrapper -->

	
		


<?php echo $__env->make('frontend.include.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>\
<script src="<?php echo e(asset('public/frontend/assets/js/profile.js')); ?>"></script>
<script src="<?php echo e(asset('public/frontend/assets/js/alert.js')); ?>"></script><?php /**PATH /home/accessas/public_html/hrms/resources/views/frontend/profile.blade.php ENDPATH**/ ?>