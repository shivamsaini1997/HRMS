<?php echo $__env->make('admin.includes.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		<!-- Main Wrapper -->
        <div class="main-wrapper">
		
			<!-- Header -->
			<?php echo $__env->make('admin.includes.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			<!-- /Header -->
			
			<!-- Sidebar -->
			<?php echo $__env->make('admin.includes.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			<!-- /Sidebar -->
			
			<!-- Two Col Sidebar -->
			<div class="two-col-bar" id="two-col-bar">
				<div class="sidebar sidebar-twocol">
					<div class="sidebar-left slimscroll">
						<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
							<a class="nav-link" id="v-pills-dashboard-tab" title="Dashboard" data-bs-toggle="pill" href="#v-pills-dashboard" role="tab" aria-controls="v-pills-dashboard" aria-selected="true">
								<span class="material-icons-outlined">
									home
								</span>
							</a>
							<a class="nav-link" id="v-pills-apps-tab" title="Apps" data-bs-toggle="pill" href="#v-pills-apps" role="tab" aria-controls="v-pills-apps" aria-selected="false">
								<span class="material-icons-outlined">
									dashboard
								</span>
							</a>
							<a class="nav-link active" id="v-pills-employees-tab" title="Employees" data-bs-toggle="pill" href="#v-pills-employees" role="tab" aria-controls="v-pills-employees" aria-selected="false">
								<span class="material-icons-outlined">
									people
								</span>
							</a>
							<a class="nav-link" id="v-pills-clients-tab" title="Clients" data-bs-toggle="pill" href="#v-pills-clients" role="tab" aria-controls="v-pills-clients" aria-selected="false">
								<span class="material-icons-outlined">
									person
								</span>
							</a>
							<a class="nav-link" id="v-pills-projects-tab" title="Projects" data-bs-toggle="pill" href="#v-pills-projects" role="tab" aria-controls="v-pills-projects" aria-selected="false">
								<span class="material-icons-outlined">
									topic
								</span>
							</a>
							<a class="nav-link" id="v-pills-leads-tab" title="Leads" data-bs-toggle="pill" href="#v-pills-leads" role="tab" aria-controls="v-pills-leads" aria-selected="false">
								<span class="material-icons-outlined">
									leaderboard
								</span>
							</a>
							<a class="nav-link" id="v-pills-tickets-tab" title="Tickets" data-bs-toggle="pill" href="#v-pills-tickets" role="tab" aria-controls="v-pills-tickets" aria-selected="false">
								<span class="material-icons-outlined">
									confirmation_number
								</span>
							</a>
							<a class="nav-link" id="v-pills-sales-tab" title="Sales" data-bs-toggle="pill" href="#v-pills-sales" role="tab" aria-controls="v-pills-sales" aria-selected="false">
								<span class="material-icons-outlined">
									shopping_bag
								</span>
							</a>
							<a class="nav-link" id="v-pills-accounting-tab" title="Accounting" data-bs-toggle="pill" href="#v-pills-accounting" role="tab" aria-controls="v-pills-accounting" aria-selected="false">
								<span class="material-icons-outlined">
									account_balance_wallet
								</span>
							</a>
							<a class="nav-link" id="v-pills-payroll-tab" title="Payroll" data-bs-toggle="pill" href="#v-pills-payroll" role="tab" aria-controls="v-pills-payroll" aria-selected="false">
								<span class="material-icons-outlined">
									request_quote
								</span>
							</a>
							<a class="nav-link" id="v-pills-policies-tab" title="Policies" data-bs-toggle="pill" href="#v-pills-policies" role="tab" aria-controls="v-pills-policies" aria-selected="false">
								<span class="material-icons-outlined">
									verified_user
								</span>
							</a>
							<a class="nav-link" id="v-pills-reports-tab" title="Reports" data-bs-toggle="pill" href="#v-pills-reports" role="tab" aria-controls="v-pills-reports" aria-selected="false">
								<span class="material-icons-outlined">
									report_gmailerrorred
								</span>
							</a>
							<a class="nav-link" id="v-pills-performance-tab" title="Performance" data-bs-toggle="pill" href="#v-pills-performance" role="tab" aria-controls="v-pills-performance" aria-selected="false">
								<span class="material-icons-outlined">
									shutter_speed
								</span>
							</a>
							<a class="nav-link" id="v-pills-goals-tab" title="Goals" data-bs-toggle="pill" href="#v-pills-goals" role="tab" aria-controls="v-pills-goals" aria-selected="false">
								<span class="material-icons-outlined">
									track_changes
								</span>
							</a>
							<a class="nav-link" id="v-pills-training-tab" title="Training" data-bs-toggle="pill" href="#v-pills-training" role="tab" aria-controls="v-pills-training" aria-selected="false">
								<span class="material-icons-outlined">
									checklist_rtl
								</span>
							</a>
							<a class="nav-link" id="v-pills-promotion-tab" title="Promotions" data-bs-toggle="pill" href="#v-pills-promotion" role="tab" aria-controls="v-pills-promotion" aria-selected="false">
								<span class="material-icons-outlined">
									auto_graph
								</span>
							</a>
							<a class="nav-link" id="v-pills-resignation-tab" title="Resignation" data-bs-toggle="pill" href="#v-pills-resignation" role="tab" aria-controls="v-pills-resignation" aria-selected="false">
								<span class="material-icons-outlined">
									do_not_disturb_alt
								</span>
							</a>
							<a class="nav-link" id="v-pills-termination-tab" title="Termination" data-bs-toggle="pill" href="#v-pills-termination" role="tab" aria-controls="v-pills-termination" aria-selected="false">
								<span class="material-icons-outlined">
									indeterminate_check_box
								</span>
							</a>
							<a class="nav-link" id="v-pills-assets-tab" title="Assets" data-bs-toggle="pill" href="#v-pills-assets" role="tab" aria-controls="v-pills-assets" aria-selected="false">
								<span class="material-icons-outlined">
									web_asset
								</span>
							</a>
							<a class="nav-link" id="v-pills-jobs-tab" title="Jobs" data-bs-toggle="pill" href="#v-pills-jobs" role="tab" aria-controls="v-pills-jobs" aria-selected="false">
								<span class="material-icons-outlined">
									work_outline
								</span>
							</a>
							<a class="nav-link" id="v-pills-knowledgebase-tab" title="Knowledgebase" data-bs-toggle="pill" href="#v-pills-knowledgebase" role="tab" aria-controls="v-pills-knowledgebase" aria-selected="false">
								<span class="material-icons-outlined">
									school
								</span>
							</a>
							<a class="nav-link" id="v-pills-activities-tab" title="Activities" data-bs-toggle="pill" href="#v-pills-activities" role="tab" aria-controls="v-pills-activities" aria-selected="false">
								<span class="material-icons-outlined">
									toggle_off
								</span>
							</a>
							<a class="nav-link" id="v-pills-users-tab" title="Users" data-bs-toggle="pill" href="#v-pills-users" role="tab" aria-controls="v-pills-users" aria-selected="false">
								<span class="material-icons-outlined">
									group_add
								</span>
							</a>
							<a class="nav-link" id="v-pills-settings-tab" title="Settings" data-bs-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">
								<span class="material-icons-outlined">
									settings
								</span>
							</a>
							<a class="nav-link" id="v-pills-profile-tab" title="Profile" data-bs-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">
								<span class="material-icons-outlined">
									manage_accounts
								</span>
							</a>
							<a class="nav-link" id="v-pills-authentication-tab" title="Authentication" data-bs-toggle="pill" href="#v-pills-authentication" role="tab" aria-controls="v-pills-authentication" aria-selected="false">
								<span class="material-icons-outlined">
									perm_contact_calendar
								</span>
							</a>
							<a class="nav-link" id="v-pills-errorpages-tab" title="Error Pages" data-bs-toggle="pill" href="#v-pills-errorpages" role="tab" aria-controls="v-pills-errorpages" aria-selected="false">
								<span class="material-icons-outlined">
									announcement
								</span>
							</a>
							<a class="nav-link" id="v-pills-subscriptions-tab" title="Subscriptions" data-bs-toggle="pill" href="#v-pills-subscriptions" role="tab" aria-controls="v-pills-subscriptions" aria-selected="false">
								<span class="material-icons-outlined">
									loyalty
								</span>
							</a>
							<a class="nav-link" id="v-pills-pages-tab" title="Pages" data-bs-toggle="pill" href="#v-pills-pages" role="tab" aria-controls="v-pills-pages" aria-selected="false">
								<span class="material-icons-outlined">
									layers
								</span>
							</a>
							<a class="nav-link" id="v-pills-baseui-tab" title="Base-UI" data-bs-toggle="pill" href="#v-pills-baseui" role="tab" aria-controls="v-pills-baseui" aria-selected="false">
								<span class="material-icons-outlined">
									foundation
								</span>
							</a>
							<a class="nav-link" id="v-pills-elements-tab" title="Elements" data-bs-toggle="pill" href="#v-pills-elements" role="tab" aria-controls="v-pills-elements" aria-selected="false">
								<span class="material-icons-outlined">
									bento
								</span>
							</a>
							<a class="nav-link" id="v-pills-charts-tab" title="Charts" data-bs-toggle="pill" href="#v-pills-charts" role="tab" aria-controls="v-pills-charts" aria-selected="false">
								<span class="material-icons-outlined">
									bar_chart
								</span>
							</a>
							<a class="nav-link" id="v-pills-icons-tab" title="Icons" data-bs-toggle="pill" href="#v-pills-icons" role="tab" aria-controls="v-pills-icons" aria-selected="false">
								<span class="material-icons-outlined">
									grading
								</span>
							</a>
							<a class="nav-link" id="v-pills-forms-tab" title="Forms" data-bs-toggle="pill" href="#v-pills-forms" role="tab" aria-controls="v-pills-forms" aria-selected="false">
								<span class="material-icons-outlined">
									view_day
								</span>
							</a>
							<a class="nav-link" id="v-pills-tables-tab" title="Tables" data-bs-toggle="pill" href="#v-pills-tables" role="tab" aria-controls="v-pills-tables" aria-selected="false">
								<span class="material-icons-outlined">
									table_rows
								</span>
							</a>
							<a class="nav-link" id="v-pills-documentation-tab" title="Documentation" data-bs-toggle="pill" href="#v-pills-documentation" role="tab" aria-controls="v-pills-documentation" aria-selected="false">
								<span class="material-icons-outlined">
									description
								</span>
							</a>
							<a class="nav-link" id="v-pills-changelog-tab" title="Changelog" data-bs-toggle="pill" href="#v-pills-changelog" role="tab" aria-controls="v-pills-changelog" aria-selected="false">
								<span class="material-icons-outlined">
									sync_alt
								</span>
							</a>
							<a class="nav-link" id="v-pills-multilevel-tab" title="Multilevel" data-bs-toggle="pill" href="#v-pills-multilevel" role="tab" aria-controls="v-pills-multilevel" aria-selected="false">
								<span class="material-icons-outlined">
									library_add_check
								</span>
							</a>
						</div>
					</div>
					
					<div class="sidebar-right">
						<div class="tab-content" id="v-pills-tabContent">
							<div class="tab-pane fade" id="v-pills-dashboard" role="tabpanel" aria-labelledby="v-pills-dashboard-tab">
								<p>Dashboard</p>
								<ul>
									<li>
										<a href="admin-dashboard.html">Admin Dashboard</a>
									</li>
									<li>
										<a href="employee-dashboard.html">Employee Dashboard</a>
									</li>
								</ul>
							</div>
							<div class="tab-pane fade" id="v-pills-apps" role="tabpanel" aria-labelledby="v-pills-apps-tab">
								<p>App</p>
								<ul>
									<li>
										<a href="chat.html">Chat</a>
									</li>
									<li class="sub-menu">
										<a href="#">Calls <span class="menu-arrow"></span></a>
										<ul>
											<li><a href="voice-call.html">Voice Call</a></li>
											<li><a href="video-call.html">Video Call</a></li>
											<li><a href="outgoing-call.html">Outgoing Call</a></li>
											<li><a href="incoming-call.html">Incoming Call</a></li>
										</ul>
									</li>
									<li>
										<a href="calender.html">Calendar</a>
									</li>
									<li>
										<a href="contacts.html">Contacts</a>
									</li>
									<li>
										<a href="inbox.html">Email</a>
									</li>
									<li>
										<a href="file-manager.html">File Manager</a>
									</li>
								</ul>						
							</div>
							<div class="tab-pane fade show active" id="v-pills-employees" role="tabpanel" aria-labelledby="v-pills-employees-tab">
								<p>Employees</p>
								<ul>
									<li><a href="employees.html">All Employees</a></li>
									<li><a href="holidays.html" >Holidays</a></li>
									<li><a href="leaves.html" >Leaves (Admin) <span class="badge rounded-pill bg-primary float-end">1</span></a></li>
									<li><a href="leaves-employee.html" >Leaves (Employee)</a></li>
									<li><a href="leave-settings.html" class="active">Leave Settings</a></li>
									<li><a href="attendance.html">Attendance (Admin)</a></li>
									<li><a href="attendance-employee.html">Attendance (Employee)</a></li>
									<li><a href="departments.html">Departments</a></li>
									<li><a href="designations.html">Designations</a></li>
									<li><a href="timesheet.html">Timesheet</a></li>
									<li><a href="shift-scheduling.html">Shift & Schedule</a></li>
									<li><a href="overtime.html">Overtime</a></li>
								</ul>
							</div>
							<div class="tab-pane fade" id="v-pills-clients" role="tabpanel" aria-labelledby="v-pills-clients-tab">
								<p>Clients</p>
								<ul>
									<li><a href="clients.html">Clients</a></li>
								</ul>
							</div>
							<div class="tab-pane fade" id="v-pills-projects" role="tabpanel" aria-labelledby="v-pills-projects-tab">
								<p>Projects</p>
								<ul>
									<li><a href="projects.html">Projects</a></li>
									<li><a href="tasks.html">Tasks</a></li>
									<li><a href="task-board.html">Task Board</a></li>
								</ul>
							</div>
							<div class="tab-pane fade" id="v-pills-leads" role="tabpanel" aria-labelledby="v-pills-leads-tab">
								<p>Leads</p>
								<ul>
									<li><a href="leads.html">Leads</a></li>
								</ul>
							</div>
							<div class="tab-pane fade" id="v-pills-tickets" role="tabpanel" aria-labelledby="v-pills-tickets-tab">
								<p>Tickets</p>
								<ul>
									<li><a href="tickets.html">Tickets</a></li>
								</ul>
							</div>
							<div class="tab-pane fade" id="v-pills-sales" role="tabpanel" aria-labelledby="v-pills-sales-tab">
								<p>Sales</p>
								<ul>
									<li><a href="estimates.html">Estimates</a></li>
									<li><a href="invoices.html">Invoices</a></li>
									<li><a href="payments.html">Payments</a></li>
									<li><a href="expenses.html">Expenses</a></li>
									<li><a href="provident-fund.html">Provident Fund</a></li>
									<li><a href="taxes.html">Taxes</a></li>
								</ul>
							</div>
							<div class="tab-pane fade" id="v-pills-accounting" role="tabpanel" aria-labelledby="v-pills-accounting-tab">
								<p>Accounting</p>
								<ul>
									<li><a href="categories.html">Categories</a></li>
									<li><a href="budgets.html">Budgets</a></li>
									<li><a href="budget-expenses.html">Budget Expenses</a></li>
									<li><a href="budget-revenues.html">Budget Revenues</a></li>
								</ul>
							</div>
							<div class="tab-pane fade" id="v-pills-payroll" role="tabpanel" aria-labelledby="v-pills-payroll-tab">
								<p>Payroll</p>
								<ul>
									<li><a href="salary.html"> Employee Salary </a></li>
									<li><a href="salary-view.html"> Payslip </a></li>
									<li><a href="payroll-items.html"> Payroll Items </a></li>
								</ul>
							</div>
							<div class="tab-pane fade" id="v-pills-policies" role="tabpanel" aria-labelledby="v-pills-policies-tab">
								<p>Policies</p>
								<ul>
									<li><a href="policies.html"> Policies </a></li>
								</ul>
							</div>
							<div class="tab-pane fade" id="v-pills-reports" role="tabpanel" aria-labelledby="v-pills-reports-tab">
								<p>Reports</p>
								<ul>
									<li><a href="expense-reports.html"> Expense Report </a></li>
									<li><a href="invoice-reports.html"> Invoice Report </a></li>
									<li><a href="payments-reports.html"> Payments Report </a></li>
									<li><a href="project-reports.html"> Project Report </a></li>
									<li><a href="task-reports.html"> Task Report </a></li>
									<li><a href="user-reports.html"> User Report </a></li>
									<li><a href="employee-reports.html"> Employee Report </a></li>
									<li><a href="payslip-reports.html"> Payslip Report </a></li>
									<li><a href="attendance-reports.html"> Attendance Report </a></li>
									<li><a href="leave-reports.html"> Leave Report </a></li>
									<li><a href="daily-reports.html"> Daily Report </a></li>
								</ul>
							</div>
							<div class="tab-pane fade" id="v-pills-performance" role="tabpanel" aria-labelledby="v-pills-performance-tab">
								<p>Performance</p>
								<ul>
									<li><a href="performance-indicator.html"> Performance Indicator </a></li>
									<li><a href="performance.html"> Performance Review </a></li>
									<li><a href="performance-appraisal.html"> Performance Appraisal </a></li>
								</ul>
							</div>
							<div class="tab-pane fade" id="v-pills-goals" role="tabpanel" aria-labelledby="v-pills-goals-tab">
								<p>Goals</p>
								<ul>
									<li><a href="goal-tracking.html"> Goal List </a></li>
									<li><a href="goal-type.html"> Goal Type </a></li>
								</ul>
							</div>
							<div class="tab-pane fade" id="v-pills-training" role="tabpanel" aria-labelledby="v-pills-training-tab">
								<p>Training</p>
								<ul>
									<li><a href="training.html"> Training List </a></li>
									<li><a href="trainers.html"> Trainers</a></li>
									<li><a href="training-type.html"> Training Type </a></li>
								</ul>
							</div>
							<div class="tab-pane fade" id="v-pills-promotion" role="tabpanel" aria-labelledby="v-pills-promotion-tab">
								<p>Promotion</p>
								<ul>
									<li><a href="promotion.html"> Promotion </a></li>
								</ul>
							</div>
							<div class="tab-pane fade" id="v-pills-resignation" role="tabpanel" aria-labelledby="v-pills-resignation-tab">
								<p>Resignation</p>
								<ul>
									<li><a href="resignation.html"> Resignation </a></li>
								</ul>
							</div>
							<div class="tab-pane fade" id="v-pills-termination" role="tabpanel" aria-labelledby="v-pills-termination-tab">
								<p>Termination</p>
								<ul>
									<li><a href="termination.html"> Termination </a></li>
								</ul>
							</div>
							<div class="tab-pane fade" id="v-pills-assets" role="tabpanel" aria-labelledby="v-pills-assets-tab">
								<p>Assets</p>
								<ul>
									<li><a href="assets.html"> Assets </a></li>
								</ul>
							</div>
							<div class="tab-pane fade " id="v-pills-jobs" role="tabpanel" aria-labelledby="v-pills-jobs-tab">
								<p>Jobs</p>
								<ul>
									<li><a href="user-dashboard.html" > User Dasboard </a></li>
									<li><a href="jobs-dashboard.html"> Jobs Dasboard </a></li>
									<li><a href="jobs.html"> Manage Jobs </a></li>
									<li><a href="job-applicants.html"> Applied Jobs </a></li>
									<li><a href="manage-resumes.html"> Manage Resumes </a></li>
									<li><a href="shortlist-candidates.html"> Shortlist Candidates </a></li>
									<li><a href="interview-questions.html"> Interview Questions </a></li>
									<li><a href="offer_approvals.html"> Offer Approvals </a></li>
									<li><a href="experiance-level.html"> Experience Level </a></li>
									<li><a href="candidates.html"> Candidates List </a></li>
									<li><a href="schedule-timing.html"> Schedule timing </a></li>
									<li><a href="apptitude-result.html"> Aptitude Results </a></li>
								</ul>
							</div>
							<div class="tab-pane fade" id="v-pills-knowledgebase" role="tabpanel" aria-labelledby="v-pills-knowledgebase-tab">
								<p>Knowledgebase</p>
								<ul>
									<li><a href="knowledgebase.html"> Knowledgebase </a></li>
								</ul>
							</div>
							<div class="tab-pane fade" id="v-pills-activities" role="tabpanel" aria-labelledby="v-pills-activities-tab">
								<p>Activities</p>
								<ul>
									<li><a href="activities.html"> Activities </a></li>
								</ul>
							</div>
							<div class="tab-pane fade" id="v-pills-users" role="tabpanel" aria-labelledby="v-pills-activities-tab">
								<p>Users</p>
								<ul>
									<li><a href="users.html"> Users </a></li>
								</ul>
							</div>
							<div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
								<p>Settings</p>
								<ul>
									<li><a href="settings.html"> Settings </a></li>
								</ul>
							</div>
							<div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
								<p>Profile</p>
								<ul>
									<li><a href="profile.html"> Employee Profile </a></li>
									<li><a href="client-profile.html"> Client Profile </a></li>
								</ul>
							</div>
							<div class="tab-pane fade" id="v-pills-authentication" role="tabpanel" aria-labelledby="v-pills-authentication-tab">
								<p>Authentication</p>
								<ul>
									<li><a href="index-2.html"> Login </a></li>
									<li><a href="register.html"> Register </a></li>
									<li><a href="forgot-password.html"> Forgot Password </a></li>
									<li><a href="otp.html"> OTP </a></li>
									<li><a href="lock-screen.html"> Lock Screen </a></li>
								</ul>
							</div>
							<div class="tab-pane fade" id="v-pills-errorpages" role="tabpanel" aria-labelledby="v-pills-errorpages-tab">
								<p>Error Pages</p>
								<ul>
									<li><a href="error-404.html">404 Error </a></li>
									<li><a href="error-500.html">500 Error </a></li>
								</ul>
							</div>
							<div class="tab-pane fade" id="v-pills-subscriptions" role="tabpanel" aria-labelledby="v-pills-subscriptions-tab">
								<p>Subscriptions</p>
								<ul>
									<li><a href="subscriptions.html"> Subscriptions (Admin) </a></li>
									<li><a href="subscriptions-company.html"> Subscriptions (Company) </a></li>
									<li><a href="subscribed-companies.html"> Subscribed Companies</a></li>
								</ul>
							</div>
							<div class="tab-pane fade" id="v-pills-pages" role="tabpanel" aria-labelledby="v-pills-pages-tab">
								<p>Pages</p>
								<ul>
									<li><a href="search.html"> Search </a></li>
									<li><a href="faq.html"> FAQ </a></li>
									<li><a href="terms.html"> Terms </a></li>
									<li><a href="privacy-policy.html"> Privacy Policy </a></li>
									<li><a href="blank-page.html"> Blank Page </a></li>
								</ul>
							</div>
							<div class="tab-pane fade" id="v-pills-baseui" role="tabpanel" aria-labelledby="v-pills-baseui-tab">
								<p>Base-UI</p>
								<ul>
									<li><a href="alerts.html">Alerts</a></li>                                    
									<li><a href="accordions.html">Accordions</a></li>
									<li><a href="avatar.html">Avatar</a></li> 
									<li><a href="badges.html">Badges</a></li>
									<li><a href="buttons.html">Buttons</a></li>   
									<li><a href="buttongroup.html">Button Group</a></li>                                  
									<li><a href="breadcrumbs.html">Breadcrumb</a></li>
									<li><a href="cards.html">Cards</a></li>
									<li><a href="carousel.html">Carousel</a></li>                                   
									<li><a href="dropdowns.html">Dropdowns</a></li>
									<li><a href="grid.html">Grid</a></li>
									<li><a href="images.html">Images</a></li>
									<li><a href="lightbox.html">Lightbox</a></li>
									<li><a href="media.html">Media</a></li>                              
									<li><a href="modal.html">Modals</a></li>
									<li><a href="offcanvas.html">Offcanvas</a></li>
									<li><a href="pagination.html">Pagination</a></li>
									<li><a href="popover.html">Popover</a></li>                                    
									<li><a href="progress.html">Progress Bars</a></li>
									<li><a href="placeholders.html">Placeholders</a></li>
									<li><a href="rangeslider.html">Range Slider</a></li>                                    
									<li><a href="spinners.html">Spinner</a></li>
									<li><a href="sweetalerts.html">Sweet Alerts</a></li>
									<li><a href="tab.html">Tabs</a></li>
									<li><a href="toastr.html">Toasts</a></li>
									<li><a href="tooltip.html">Tooltip</a></li>
									<li><a href="typography.html">Typography</a></li>
									<li><a href="video.html">Video</a></li>
								</ul>
							</div>
							<div class="tab-pane fade" id="v-pills-elements" role="tabpanel" aria-labelledby="v-pills-elements-tab">
								<p>Elements</p>
								<ul>
									<li><a href="ribbon.html">Ribbon</a></li>
									<li><a href="clipboard.html">Clipboard</a></li>
									<li><a href="drag-drop.html">Drag & Drop</a></li>
									<li><a href="rating.html">Rating</a></li>
									<li><a href="text-editor.html">Text Editor</a></li>
									<li><a href="counter.html">Counter</a></li>
									<li><a href="scrollbar.html">Scrollbar</a></li>
									<li><a href="notification.html">Notification</a></li>
									<li><a href="stickynote.html">Sticky Note</a></li>
									<li><a href="timeline.html">Timeline</a></li>
									<li><a href="horizontal-timeline.html">Horizontal Timeline</a></li>
									<li><a href="form-wizard.html">Form Wizard</a></li>
								</ul>
							</div>
							<div class="tab-pane fade" id="v-pills-charts" role="tabpanel" aria-labelledby="v-pills-charts-tab">
								<p>Charts</p>
								<ul>
									<li><a href="chart-apex.html">Apex Charts</a></li>
									<li><a href="chart-js.html">Chart Js</a></li>
									<li><a href="chart-morris.html">Morris Charts</a></li>
									<li><a href="chart-flot.html">Flot Charts</a></li>
									<li><a href="chart-peity.html">Peity Charts</a></li>
									<li><a href="chart-c3.html">C3 Charts</a></li>
								</ul>
							</div>
							<div class="tab-pane fade" id="v-pills-icons" role="tabpanel" aria-labelledby="v-pills-icons-tab">
								<p>Icons</p>
								<ul>
									<li><a href="icon-fontawesome.html">Fontawesome Icons</a></li>
									<li><a href="icon-feather.html">Feather Icons</a></li>
									<li><a href="icon-ionic.html">Ionic Icons</a></li>
									<li><a href="icon-material.html">Material Icons</a></li>
									<li><a href="icon-pe7.html">Pe7 Icons</a></li>
									<li><a href="icon-simpleline.html">Simpleline Icons</a></li>
									<li><a href="icon-themify.html">Themify Icons</a></li>
									<li><a href="icon-weather.html">Weather Icons</a></li>
									<li><a href="icon-typicon.html">Typicon Icons</a></li>
									<li><a href="icon-flag.html">Flag Icons</a></li>
								</ul>
							</div>
							<div class="tab-pane fade" id="v-pills-forms" role="tabpanel" aria-labelledby="v-pills-forms-tab">
								<p>Forms</p>
								<ul>
									<li><a href="form-basic-inputs.html">Basic Inputs </a></li>
									<li><a href="form-input-groups.html">Input Groups </a></li>
									<li><a href="form-horizontal.html">Horizontal Form </a></li>
									<li><a href="form-vertical.html"> Vertical Form </a></li>
									<li><a href="form-mask.html"> Form Mask </a></li>
										<li><a href="form-validation.html"> Form Validation </a></li>
										<li><a href="form-select2.html">Form Select2 </a></li>
										<li><a href="form-fileupload.html">File Upload </a></li>
									</ul>
							</div>
							<div class="tab-pane fade" id="v-pills-tables" role="tabpanel" aria-labelledby="v-pills-tables-tab">
								<p>Tables</p>
								<ul>
									<li><a href="tables-basic.html">Basic Tables </a></li>
									<li><a href="data-tables.html">Data Table </a></li>
								</ul>
							</div>
							<div class="tab-pane fade" id="v-pills-documentation" role="tabpanel" aria-labelledby="v-pills-documentation-tab">
								<p>Documentation</p>
								<ul>
									<li><a href="#">Documentation </a></li>
								</ul>
							</div>
							<div class="tab-pane fade" id="v-pills-changelog" role="tabpanel" aria-labelledby="v-pills-changelog-tab">
								<p>Change Log</p>
								<ul>
									<li><a href="#"><span>Change Log</span> <span class="badge badge-primary ms-auto">v3.4</span> </a></li>
								</ul>
							</div>
							<div class="tab-pane fade" id="v-pills-multilevel" role="tabpanel" aria-labelledby="v-pills-multilevel-tab">
								<p>Multi Level</p>
								<ul>
									<li class="sub-menu">
										<a href="javascript:void(0);">Level 1 <span class="menu-arrow"></span></a>
										<ul class="ms-3">
											<li class="sub-menu">
												<a href="javascript:void(0);">Level 1 <span class="menu-arrow"></span></a>
												<ul>
													<li><a href="javascript:void(0);">Level 2</a></li>
													<li><a href="javascript:void(0);">Level 3</a></li>
												</ul>
											</li>
										</ul>
									</li>								
									<li><a href="javascript:void(0);">Level 2</a></li>
									<li><a href="javascript:void(0);">Level 3</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- /Two Col Sidebar -->
			
			<!-- Page Wrapper -->
            <div class="page-wrapper">
			
				<!-- Page Content -->
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">Leave Settings</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="admin-dashboard.html">Dashboard</a></li>
									<li class="breadcrumb-item active">Leave Settings</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<div class="row">
						<div class="col-md-12">
						
							<!-- Annual Leave -->
							<div class="card leave-box" id="leave_annual">
								<div class="card-body">
									<div class="h3 card-title with-switch">
										Annual 											
										<div class="onoffswitch">
											<input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="switch_annual" checked>
											<label class="onoffswitch-label" for="switch_annual">
												<span class="onoffswitch-inner"></span>
												<span class="onoffswitch-switch"></span>
											</label>
										</div>
									</div>
									<div class="leave-item">
									
										<!-- Annual Days Leave -->
										<div class="leave-row">
											<div class="leave-left">
												<div class="input-box">
													<div class="input-block mb-3">
														<label class="col-form-label">Days</label>
														<input type="text" class="form-control" disabled>
													</div>
												</div>
											</div>
											<div class="leave-right">
												<button class="leave-edit-btn">Edit</button>
											</div>
										</div>
										<!-- /Annual Days Leave -->
										
										<!-- Carry Forward -->
										<div class="leave-row">
											<div class="leave-left">
												<div class="input-box">
													<label class="d-block col-form-label">Carry forward</label>
													<div class="leave-inline-form">
														<div class="form-check form-check-inline">
															<input class="form-check-input" type="radio" name="inlineRadioOptions" id="carry_no" value="option1" disabled>
															<label class="form-check-label" for="carry_no">No</label>
														</div>
														<div class="form-check form-check-inline">
															<input class="form-check-input" type="radio" name="inlineRadioOptions" id="carry_yes" value="option2" disabled>
															<label class="form-check-label" for="carry_yes">Yes</label>
														</div>
														<div class="input-group">
															<span class="input-group-text">Max</span>
															<input type="text" class="form-control" disabled>
														</div>
													</div>
												</div>
											</div>
											<div class="leave-right">
												<button class="leave-edit-btn">
													Edit
												</button>
											</div>
										</div>
										<!-- /Carry Forward -->
										
										<!-- Earned Leave -->
										<div class="leave-row">
											<div class="leave-left">
												<div class="input-box">
													<label class="d-block col-form-label">Earned leave</label>
													<div class="leave-inline-form">
														<div class="form-check form-check-inline">
															<input class="form-check-input" type="radio" name="inlineRadioOptions" id="earned_no" value="option1" disabled>
															<label class="form-check-label" for="earned_no">No</label>
														</div>
														<div class="form-check form-check-inline">
															<input class="form-check-input" type="radio" name="inlineRadioOptions" id="earned_yes" value="option2" disabled>
															<label class="form-check-label" for="earned_yes">Yes</label>
														</div>
													</div>
												</div>
											</div>
											<div class="leave-right">
												<button class="leave-edit-btn">
													Edit
												</button>
											</div>
										</div>
										<!-- /Earned Leave -->
										
									</div>
									
									<!-- Custom Policy -->
									<div class="custom-policy">
										<div class="leave-header">
											<div class="title">Custom policy</div>
											<div class="leave-action">
												<button class="btn btn-sm btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#add_custom_policy"><i class="fa-solid fa-plus"></i> Add custom policy</button>
											</div>
										</div>
										<div class="table-responsive">
											<table class="table table-hover table-nowrap leave-table mb-0">
												<thead>
													<tr>
														<th class="l-name">Name</th>
														<th class="l-days">Days</th>
														<th class="l-assignee">Assignee</th>
														<th></th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>5 Year Service </td>
														<td>5</td>
														<td>
															<a href="#" class="avatar"><img src="assets/img/profiles/avatar-02.jpg" alt="User Image"></a>
															<a href="#">John Doe</a>
														</td>
														<td class="text-end">
															<div class="dropdown dropdown-action">
																<a aria-expanded="false" data-bs-toggle="dropdown" class="action-icon dropdown-toggle" href="#"><i class="material-icons">more_vert</i></a>
																<div class="dropdown-menu dropdown-menu-right">
																	<a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#edit_custom_policy"><i class="fa-solid fa-pencil m-r-5"></i> Edit</a>
																	<a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#delete_custom_policy"><i class="fa-regular fa-trash-can m-r-5"></i> Delete</a>
																</div>
															</div>
														</td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
									<!-- /Custom Policy -->
									
								</div>
							</div>
							<!-- /Annual Leave -->
							
							<!-- Sick Leave -->
							<div class="card leave-box" id="leave_sick">
								<div class="card-body">
									<div class="h3 card-title with-switch">
										Sick 											
										<div class="onoffswitch">
											<input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="switch_sick" checked>
											<label class="onoffswitch-label" for="switch_sick">
												<span class="onoffswitch-inner"></span>
												<span class="onoffswitch-switch"></span>
											</label>
										</div>
									</div>
									<div class="leave-item">
										<div class="leave-row">
											<div class="leave-left">
												<div class="input-box">
													<div class="input-block mb-3">
														<label class="col-form-label">Days</label>
														<input type="text" class="form-control" disabled>
													</div>
												</div>
											</div>
											<div class="leave-right">
												<button class="leave-edit-btn">
													Edit
												</button>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- /Sick Leave -->
							
							<!-- Hospitalisation Leave -->
							<div class="card leave-box" id="leave_hospitalisation">
								<div class="card-body">
									<div class="h3 card-title with-switch">
										Hospitalisation 											
										<div class="onoffswitch">
											<input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="switch_hospitalisation">
											<label class="onoffswitch-label" for="switch_hospitalisation">
												<span class="onoffswitch-inner"></span>
												<span class="onoffswitch-switch"></span>
											</label>
										</div>
									</div>
									<div class="leave-item">
									
										<!-- Annual Days Leave -->
										<div class="leave-row">
											<div class="leave-left">
												<div class="input-box">
													<div class="input-block mb-3">
														<label class="col-form-label">Days</label>
														<input type="text" class="form-control" disabled>
													</div>
												</div>
											</div>
											<div class="leave-right">
												<button class="leave-edit-btn">
													Edit
												</button>
											</div>
										</div>
										<!-- /Annual Days Leave -->
										
									</div>
									
									<!-- Custom Policy -->
									<div class="custom-policy">
										<div class="leave-header">
											<div class="title">Custom policy</div>
											<div class="leave-action">
												<button class="btn btn-sm btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#add_custom_policy"><i class="fa-solid fa-plus"></i> Add custom policy</button>
											</div>
										</div>
										<div class="table-responsive">
											<table class="table table-hover table-nowrap leave-table mb-0">
												<thead>
													<tr>
														<th class="l-name">Name</th>
														<th class="l-days">Days</th>
														<th class="l-assignee">Assignee</th>
														<th></th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>5 Year Service </td>
														<td>5</td>
														<td>
															<a href="#" class="avatar"><img src="assets/img/profiles/avatar-02.jpg" alt="User Image"></a>
															<a href="#">John Doe</a>
														</td>
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
									<!-- /Custom Policy -->
									
								</div>
							</div>
							<!-- /Hospitalisation Leave -->
							
							<!-- Maternity Leave -->
							<div class="card leave-box" id="leave_maternity">
								<div class="card-body">
									<div class="h3 card-title with-switch">
										Maternity  <span class="subtitle">Assigned to female only</span>
										<div class="onoffswitch">
											<input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="switch_maternity" checked>
											<label class="onoffswitch-label" for="switch_maternity">
												<span class="onoffswitch-inner"></span>
												<span class="onoffswitch-switch"></span>
											</label>
										</div>
									</div>
									<div class="leave-item">
										<div class="leave-row">
											<div class="leave-left">
												<div class="input-box">
													<div class="input-block mb-3">
														<label class="col-form-label">Days</label>
														<input type="text" class="form-control" disabled>
													</div>
												</div>
											</div>
											<div class="leave-right">
												<button class="leave-edit-btn">
													Edit
												</button>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- /Maternity Leave -->
							
							<!-- Paternity Leave -->
							<div class="card leave-box" id="leave_paternity">
								<div class="card-body">
									<div class="h3 card-title with-switch">
										Paternity  <span class="subtitle">Assigned to male only</span>
										<div class="onoffswitch">
											<input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="switch_paternity">
											<label class="onoffswitch-label" for="switch_paternity">
												<span class="onoffswitch-inner"></span>
												<span class="onoffswitch-switch"></span>
											</label>
										</div>
									</div>
									<div class="leave-item">
										<div class="leave-row">
											<div class="leave-left">
												<div class="input-box">
													<div class="input-block mb-3">
														<label class="col-form-label">Days</label>
														<input type="text" class="form-control" disabled>
													</div>
												</div>
											</div>
											<div class="leave-right">
												<button class="leave-edit-btn">
													Edit
												</button>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- /Paternity Leave -->
							
							<!-- Custom Create Leave -->
							<div class="card leave-box mb-0" id="leave_custom01">
								<div class="card-body">
									<div class="h3 card-title with-switch">
										LOP 											
										<div class="onoffswitch">
											<input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="switch_custom01" checked>
											<label class="onoffswitch-label" for="switch_custom01">
												<span class="onoffswitch-inner"></span>
												<span class="onoffswitch-switch"></span>
											</label>
										</div>
										<button class="btn btn-danger leave-delete-btn" type="button">Delete</button>
									</div>
									<div class="leave-item">
									
										<!-- Annual Days Leave -->
										<div class="leave-row">
											<div class="leave-left">
												<div class="input-box">
													<div class="input-block mb-3">
														<label class="col-form-label">Days</label>
														<input type="text" class="form-control" disabled>
													</div>
												</div>
											</div>
											<div class="leave-right">
												<button class="leave-edit-btn">Edit</button>
											</div>
										</div>
										<!-- /Annual Days Leave -->
										
										<!-- Carry Forward -->
										<div class="leave-row">
											<div class="leave-left">
												<div class="input-box">
													<label class="d-block col-form-label">Carry forward</label>
													<div class="leave-inline-form">
														<div class="form-check form-check-inline">
															<input class="form-check-input" type="radio" name="carryForward" id="carry_no_01" value="option1" disabled>
															<label class="form-check-label" for="carry_no_01">No</label>
														</div>
														<div class="form-check form-check-inline">
															<input class="form-check-input" type="radio" name="carryForward" id="carry_yes_01" value="option2" disabled>
															<label class="form-check-label" for="carry_yes_01">Yes</label>
														</div>
														<div class="input-group">
															<span class="input-group-text">Max</span>
															<input type="text" class="form-control" disabled>
														</div>
													</div>
												</div>
											</div>
											<div class="leave-right">
												<button class="leave-edit-btn">
													Edit
												</button>
											</div>
										</div>
										<!-- /Carry Forward -->
										
										<!-- Earned Leave -->
										<div class="leave-row">
											<div class="leave-left">
												<div class="input-box">
													<label class="d-block col-form-label">Earned leave</label>
													<div class="leave-inline-form">
														<div class="form-check form-check-inline">
															<input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1" disabled>
															<label class="form-check-label" for="inlineRadio1">No</label>
														</div>
														<div class="form-check form-check-inline">
															<input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2" disabled>
															<label class="form-check-label" for="inlineRadio2">Yes</label>
														</div>
													</div>
												</div>
											</div>
											<div class="leave-right">
												<button class="leave-edit-btn">
													Edit
												</button>
											</div>
										</div>
										<!-- /Earned Leave -->
										
									</div>
									
									<!-- Custom Policy -->
									<div class="custom-policy">
										<div class="leave-header">
											<div class="title">Custom policy</div>
											<div class="leave-action">
												<button class="btn btn-sm btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#add_custom_policy"><i class="fa-solid fa-plus"></i> Add custom policy</button>
											</div>
										</div>
										<div class="table-responsive">
											<table class="table table-hover table-nowrap leave-table mb-0">
												<thead>
													<tr>
														<th class="l-name">Name</th>
														<th class="l-days">Days</th>
														<th class="l-assignee">Assignee</th>
														<th></th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>5 Year Service </td>
														<td>5</td>
														<td>
															<a href="#" class="avatar"><img src="assets/img/profiles/avatar-02.jpg" alt="User Image"></a>
															<a href="#">John Doe</a>
														</td>
														<td class="text-end">
															<div class="dropdown dropdown-action">
																<a aria-expanded="false" data-bs-toggle="dropdown" class="action-icon dropdown-toggle" href="#"><i class="material-icons">more_vert</i></a>
																<div class="dropdown-menu dropdown-menu-right">
																	<a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#edit_custom_policy"><i class="fa-solid fa-pencil m-r-5"></i> Edit</a>
																	<a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#delete_custom_policy"><i class="fa-regular fa-trash-can m-r-5"></i> Delete</a>
																</div>
															</div>
														</td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
									<!-- /Custom Policy -->
									
								</div>
							</div>
							<!-- /Custom Create Leave -->
							
						</div>
					</div>
						
                </div>
				<!-- /Page Content -->
				
				<!-- Add Custom Policy Modal -->
				<div id="add_custom_policy" class="modal custom-modal fade" role="dialog">
					<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Add Custom Policy</h5>
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form>
									<div class="input-block mb-3">
										<label class="col-form-label">Policy Name <span class="text-danger">*</span></label>
										<input type="text" class="form-control">
									</div>
									<div class="input-block mb-3">
										<label class="col-form-label">Days <span class="text-danger">*</span></label>
										<input type="text" class="form-control">
									</div>
									<div class="input-block mb-3 leave-duallist">
										<label class="col-form-label">Add employee</label>
										<div class="row">
											<div class="col-lg-5 col-sm-5">
												<select name="customleave_from" id="customleave_select" class="form-control form-select" size="5" multiple="multiple">
													<option value="1">Bernardo Galaviz </option>
													<option value="2">Jeffrey Warden</option>
													<option value="2">John Doe</option>
													<option value="2">John Smith</option>
													<option value="3">Mike Litorus</option>
												</select>
											</div>
											<div class="multiselect-controls col-lg-2 col-sm-2 d-grid gap-2">
												<button type="button" id="customleave_select_rightAll" class="btn w-100 btn-white"><i class="fa fa-forward"></i></button>
												<button type="button" id="customleave_select_rightSelected" class="btn w-100 btn-white"><i class="fa fa-chevron-right"></i></button>
												<button type="button" id="customleave_select_leftSelected" class="btn w-100 btn-white"><i class="fa fa-chevron-left"></i></button>
												<button type="button" id="customleave_select_leftAll" class="btn w-100 btn-white"><i class="fa fa-backward"></i></button>
											</div>
											<div class="col-lg-5 col-sm-5">
												<select name="customleave_to" id="customleave_select_to" class="form-control form-select" size="8" multiple="multiple"></select>
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
				<!-- /Add Custom Policy Modal -->
				
				<!-- Edit Custom Policy Modal -->
				<div id="edit_custom_policy" class="modal custom-modal fade" role="dialog">
					<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Edit Custom Policy</h5>
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form>
									<div class="input-block mb-3">
										<label class="col-form-label">Policy Name <span class="text-danger">*</span></label>
										<input type="text" class="form-control" value="LOP">
									</div>
									<div class="input-block mb-3">
										<label class="col-form-label">Days <span class="text-danger">*</span></label>
										<input type="text" class="form-control" value="4">
									</div>
									<div class="input-block mb-3 leave-duallist">
										<label class="col-form-label">Add employee</label>
										<div class="row">
											<div class="col-lg-5 col-sm-5">
												<select name="edit_customleave_from" id="edit_customleave_select" class="form-control form-select" size="5" multiple="multiple">
													<option value="1">Bernardo Galaviz </option>
													<option value="2">Jeffrey Warden</option>
													<option value="2">John Doe</option>
													<option value="2">John Smith</option>
													<option value="3">Mike Litorus</option>
												</select>
											</div>
											<div class="multiselect-controls col-lg-2 col-sm-2 d-grid gap-2">
												<button type="button" id="edit_customleave_select_rightAll" class="btn w-100 btn-white"><i class="fa fa-forward"></i></button>
												<button type="button" id="edit_customleave_select_rightSelected" class="btn w-100 btn-white"><i class="fa fa-chevron-right"></i></button>
												<button type="button" id="edit_customleave_select_leftSelected" class="btn w-100 btn-white"><i class="fa fa-chevron-left"></i></button>
												<button type="button" id="edit_customleave_select_leftAll" class="btn w-100 btn-white"><i class="fa fa-backward"></i></button>
											</div>
											<div class="col-lg-5 col-sm-5">
												<select name="customleave_to" id="edit_customleave_select_to" class="form-control form-select" size="8" multiple="multiple"></select>
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
				<!-- /Edit Custom Policy Modal -->
				
				<!-- Delete Custom Policy Modal -->
				<div class="modal custom-modal fade" id="delete_custom_policy" role="dialog">
					<div class="modal-dialog modal-dialog-centered">
						<div class="modal-content">
							<div class="modal-body">
								<div class="form-header">
									<h3>Delete Custom Policy</h3>
									<p>Are you sure want to delete?</p>
								</div>
								<div class="modal-btn delete-action">
									<div class="row">
										<div class="col-6">
											<a href="javascript:void(0);" class="btn btn-primary continue-btn">Delete</a>
										</div>
										<div class="col-6">
											<a href="javascript:void(0);" data-bs-dismiss="modal" class="btn btn-primary cancel-btn">Cancel</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /Delete Custom Policy Modal -->
				
            </div>
			<!-- /Page Wrapper -->

        </div>
		<!-- /Main Wrapper -->

		<?php echo $__env->make('admin.includes.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/accessas/public_html/hrms/resources/views/admin/leave-settings.blade.php ENDPATH**/ ?>