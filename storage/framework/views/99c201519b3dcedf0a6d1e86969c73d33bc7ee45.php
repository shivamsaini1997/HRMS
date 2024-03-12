<?php echo $__env->make('admin.includes.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<link rel="stylesheet" href="<?php echo e(asset('public/frontend/assets/css/alert.css')); ?>">
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
                            <h3 class="page-title">Organization</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="admin-dashboard.html">Dashboard</a></li>
                                <li class="breadcrumb-item active">Organization & Department </li>
                            </ul>
                        </div>
                        <div class="col-auto float-end ms-auto">
                            <a href="#" class="btn add-btn" data-bs-toggle="modal" data-bs-target="#add_department"><i class="fa-solid fa-plus"></i> Add Organization</a>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->
                
                <div class="row">
                    <div class="col-md-12">
                        <div>
                            <table class="table table-striped custom-table mb-0 datatable">
                                <thead>
                                    <tr>
                                        <th class="width-thirty">#</th>
                                        <th>Organization Name</th>
                                        <th class="text-end">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if($get_all_org != null): ?>
                                        <?php $__currentLoopData = $get_all_org; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $orgname): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($orgname->id); ?></td>
                                                <td><?php echo e($orgname->name); ?></td>
                                                <td class="text-end">
                                                <div class="dropdown dropdown-action">
                                                        <a href="javascript:void(0)" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item editorg" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#edit_department" data-id="<?php echo e($orgname->id); ?>"><i class="fa-solid fa-pencil m-r-5"></i> Edit</a>
                                                        <a class="dropdown-item del-org" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#delete_department" data-id="<?php echo e($orgname->id); ?>"><i class="fa-regular fa-trash-can m-r-5"></i> Delete</a>
                                                    </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php else: ?> 
                                        No data found
                                    <?php endif; ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Page Content -->
            <!-- Page Content -->
            <div class="content container-fluid">
            
                <!-- Page Header -->
                <div class="page-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="page-title">Department</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="admin-dashboard.html">Dashboard</a></li>
                                <li class="breadcrumb-item active">Department</li>
                            </ul>
                        </div>
                        <div class="col-auto float-end ms-auto">
                            <a href="#" class="btn add-btn" data-bs-toggle="modal" data-bs-target="#add_department1"><i class="fa-solid fa-plus"></i> Add Department</a>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->
                
                <div class="row">
                    <div class="col-md-12">
                        <div>
                            <table class="table table-striped custom-table mb-0 datatable">
                                <thead>
                                    <tr>
                                        <th class="width-thirty">#</th>
                                        <th>Organization Name</th>
                                        <th>Department Name</th>
                                        <th class="text-end">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if($get_all_dept != null): ?>
                                        <?php $__currentLoopData = $get_all_dept; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $all_dept): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($all_dept->id); ?></td>
                                                <td><?php echo e($all_dept->name); ?></td>
                                                <td><?php echo e($all_dept->dept_name); ?></td>
                                                <td class="text-end">
                                                <div class="dropdown dropdown-action">
                                                        <a href="javascript:void(0)" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item edit-dept" href="javascript:void(0)" data-bs-toggle="modal" data-id="<?php echo e($all_dept->id); ?>" orgid="<?php echo e($all_dept->org_id); ?>" data-bs-target="#edit_department1"><i class="fa-solid fa-pencil m-r-5"></i> Edit</a>
                                                        <a class="dropdown-item delete-dept" href="javascript:void(0)" data-bs-toggle="modal" data-id="<?php echo e($all_dept->id); ?>" orgid="<?php echo e($all_dept->org_id); ?>" data-bs-target="#delete_department1"><i class="fa-regular fa-trash-can m-r-5"></i> Delete</a>
                                                    </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php else: ?>
                                        No data found
                                    <?php endif; ?>
                                
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Page Content -->
            
            <!-- Add Organization Modal -->
            <div id="add_department" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Add Organization</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="javascript:void(0)"  id="orgform" method="post">
                                <div class="input-block mb-3">
                                    <label class="col-form-label">Organization Name <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" id="organizationadd" name="organizationadd">
                                </div>
                                <div class="submit-section">
                                    <button class="btn btn-primary submit-btn organizationsubmit">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Add Organization Modal -->
            
            <!-- Edit Organization Modal -->
            <div id="edit_department" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Edit Organization</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="javascript:void(0)"  id="eorgform" method="post">
                            <input class="form-control" type="hidden" name="oid" id="oid">
                                <div class="input-block mb-3">
                                    <label class="col-form-label">Organization Name <span class="text-danger">*</span></label>
                                    <input class="form-control" id="eorgname" name="eorgname" type="text">
                                </div>
                                <div class="submit-section">
                                    <button class="btn btn-primary submit-btn editorganizationsubmit">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Edit Organization Modal -->

            <!-- Delete Organization Modal -->
            <div class="modal custom-modal fade" id="delete_department" role="dialog">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="form-header">
                                <h3>Delete Organization</h3>
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
            <!-- /Delete Organization Modal -->




              
            <!-- Add Department Modal -->
            <div id="add_department1" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Add Department</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="javascript:void(0)"  id="adeptform" method="post">
                            <div class="input-block mb-3">
                                    <label class="col-form-label">Organization<span class="text-danger">*</span></label>
                                    <select class="form-control" type="text" id="orid" name="orid">
                                    <option value=""> -- Select Organization -- </option>
                                        <?php $__currentLoopData = $get_all_org; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $org): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($org->id); ?>"><?php echo e($org->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    </select>
                                </div>
                                <div class="input-block mb-3">
                                    <label class="col-form-label">Department Name <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" id="dept_name" name="dept_name">
                                </div>
                                <div class="submit-section">
                                    <button class="btn btn-primary submit-btn adeptform">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Add Department Modal -->
            
            <!-- Edit Department Modal -->
            <div id="edit_department1" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Edit Department</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="javascript:void(0)"  id="eorgform" method="post">
                            <input class="form-control" type="hidden" name="did" id="did">
                            <input class="form-control" type="hidden" name="odid" id="odid">
                                <div class="input-block mb-3">
                                    <label class="col-form-label">Department Name <span class="text-danger">*</span></label>
                                    <input class="form-control" id="edipt" name="edipt" type="text">
                                </div>
                                <div class="submit-section">
                                    <button class="btn btn-primary submit-btn upeditdept">Update Department</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Edit Department Modal -->

            <!-- Delete Department Modal -->
            <div class="modal custom-modal fade" id="delete_department1" role="dialog">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="form-header">
                                <h3>Delete Department</h3>
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
            <!-- /Delete Department Modal -->
            
        </div>
        <!-- /Page Wrapper -->
        </div>
  


 <?php echo $__env->make('admin.includes.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
 <script src="<?php echo e(asset('public/frontend/assets/js/alert.js')); ?>"></script>
 <script>
    $(document).ready(function(){
        $('.editorg').click(function(){
            var orgId = $(this).data('id');
            //alert(orgId);
            var csrfToken = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: "/department-org", 
                type: 'POST',
                data: { 
                    id: orgId,
                    "_token": csrfToken,
                    type:'editorg',
                    },
                success: function(data){
                    
                    $('#edit_department #eorgname').val(data.orgdetails.name);		
                    $('#edit_department #oid').val(data.orgdetails.id);					
                    $('#edit_department').modal('show');
                },
                error: function(error){
                    triggerAlert('Somthings went wrong.','error');
                }
            });
        });


        $('.organizationsubmit').click(function(){
			const organizationadd = $('#organizationadd');
			if (organizationadd.val().trim() === '') {
				triggerAlert('Please enter your organization name.','error');
				organizationadd.focus();
				return;
			}
			var csrfToken = $('meta[name="csrf-token"]').attr('content');
			$.ajax({
				url: "/department-org", 
				type: 'POST',
				data: {
					"_token": csrfToken,
					organizationadd: organizationadd.val(),
                    type:'org',				   
				},
				success: function(response) {
                    console.log(response);
					if (response.success == true) {
                        triggerAlert('You have successfully organization add', 'success');
                        location.reload(true);
                    } else if (response.success == false) {
                        triggerAlert('This organization already exists!', 'error');
                    } else {
                        triggerAlert('Something went wrong!', 'error');
                    }
				},
				error: function(error) {
					triggerAlert('Somthings went wrong.','error');
				}
			});

            
		});
        

        $('.editorganizationsubmit').click(function(){
			const organizationadd = $('#eorgname');
			if (organizationadd.val().trim() === '') {
				triggerAlert('Please enter your organization name.','error');
				organizationadd.focus();
				return;
			}
            const orgid= $('#oid').val();
			var csrfToken = $('meta[name="csrf-token"]').attr('content');
			$.ajax({
				url: "/department-org", 
				type: 'POST',
				data: {
					"_token": csrfToken,
					organizationadd: organizationadd.val(),
                    eorgid:orgid,
                    type:'updateorg',				   
				},
				success: function(response) {
                    console.log(response);
					if (response.success == true) {
                        triggerAlert('You have successfully update organization name', 'success');
                        location.reload(true);
                    } else if (response.success == false) {
                        triggerAlert('This organization already exists!', 'error');
                    } else {
                        triggerAlert('Something went wrong!', 'error');
                    }
				},
				error: function(error) {
					triggerAlert('Somthings went wrong.','error');
				}
			});

            
		});

        var orgIdToDelete;
        $('.del-org').click(function(){
            orgIdToDelete = $(this).data('id');
        });

        $('.continue-btn').click(function(){
            var csrfToken = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: '/department-org',
                method: 'POST',
                data: {
                    "_token": csrfToken,
                    id: orgIdToDelete,
                    type:'deleteorg',
                    
                },
                success: function(data){
                    console.log(data);
                    triggerAlert('You have successfully deleted the organization', 'success');
                    $('#delete_department .btn-close').click();
                    location.reload(true);
                },
                error: function(error){
                    triggerAlert('Something went wrong.', 'error');
                }
            });
        });


        $('.adeptform').click(function(){
			const orid = $('#orid');
            const dept_name=$('#dept_name')
			if (orid.val().trim() === '') {
				triggerAlert('Please select your organization name.','error');
				orid.focus();
				return;
			}

            if (dept_name.val().trim() === '') {
				triggerAlert('Please enter your organization department name.','error');
				dept_name.focus();
				return;
			}
			var csrfToken = $('meta[name="csrf-token"]').attr('content');
			$.ajax({
				url: "/department-org", 
				type: 'POST',
				data: {
					"_token": csrfToken,
					orid: orid.val(),
                    dept_name:dept_name.val(),
                    type:'dept_add_by_orgid',				   
				},
				success: function(response) {
                    console.log(response);
					if (response.success == true) {
                        triggerAlert('You have successfully added organizational department', 'success');
                        location.reload(true);
                    } else if (response.success == false) {
                        triggerAlert('This organization department allready exist!', 'error');
                    } else {
                        triggerAlert('Something went wrong!', 'error');
                    }
				},
				error: function(error) {
					triggerAlert('Somthings went wrong.','error');
				}
			});

            
		});

        $('.edit-dept').click(function(){
            var deptid = $(this).data('id');
            var orgId = $(this).attr('orgid'); 
            
            var csrfToken = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: "/department-org", 
                type: 'POST',
                data: { 
                    deptid: deptid, 
                    orgId: orgId, 
                    "_token": csrfToken,
                    type: 'editdeptorg',
                },
                success: function(data){
                    $('#edit_department1 #edipt').val(data.deptdetails.dept_name);		
                    $('#edit_department1 #did').val(data.deptdetails.id);	
                    $('#edit_department1 #odid').val(data.deptdetails.org_id);				
                    $('#edit_department1').modal('show');
                },
                error: function(error){
                    triggerAlert('Something went wrong.','error'); // Corrected spelling of 'Somethings'
                }
            });
        });

        $('.upeditdept').click(function(){
            var deptid = $('#did').val();
            var department_name = $('#edipt').val(); 
            var orgId=$('#odid').val();
            
            var csrfToken = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: "/department-org", 
                type: 'POST',
                data: { 
                    deptid: deptid, 
                    orgId: orgId, 
                    department_name:department_name,
                    "_token": csrfToken,
                    type: 'updateeditdeptorg',
                },
                success: function(response) {
                    console.log(response);
					if (response.success == true) {
                        triggerAlert('You have successfully update department name', 'success');
                        location.reload(true);
                    }  else {
                        triggerAlert('Something went wrong!', 'error');
                    }
				},
				error: function(error) {
					triggerAlert('Somthings went wrong.','error');
				}
            });
        });


    });
 </script>
			<?php /**PATH /home/accessas/public_html/hrms/resources/views/admin/department-org.blade.php ENDPATH**/ ?>