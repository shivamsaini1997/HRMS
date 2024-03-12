<?php echo $__env->make('admin.includes.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<link rel="stylesheet" href="<?php echo e(asset('public/frontend/assets/css/alert.css')); ?>">
<script src="https://cdn.tiny.cloud/1/cwm9vzzgghlue80pv07ozfkdwdwu3bh0v15hg9i0hgmwqutz/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

  
<script>
  tinymce.init({
    selector: 'textarea',
    plugins: 'ai tinycomments mentions anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed permanentpen footnotes advtemplate advtable advcode editimage tableofcontents mergetags powerpaste tinymcespellchecker autocorrect a11ychecker typography inlinecss',
    toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | align lineheight | tinycomments | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
    tinycomments_mode: 'embedded',
    tinycomments_author: 'Author name',
    mergetags_list: [
      { value: 'First.Name', title: 'First Name' },
      { value: 'Email', title: 'Email' },
    ],
    ai_request: (request, respondWith) => respondWith.string(() => Promise.reject("See docs to implement AI Assistant")),
  });
</script>
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
                    <div class="page-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h3 class="page-title">Company Policies </h3>
                                    <ul class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="admin-dashboard.html">Dashboard</a></li>
                                        <li class="breadcrumb-item active">Company Policies</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                   
                    <div class="row">
                        <div class="col-12">
                          <form action="javascript:void(0)" method="post">
                                <textarea name="companyPolicie" id="companyPolicie"><?php if($check_company_policie_data != null): ?><?php echo e($check_company_policie_data->policies); ?><?php endif; ?></textarea>
                                <button class="btn add-btn company-policie-submit mt-2">Submit</button>
                          </form>
                        </div>
                    </div>
                    </div>
                 </div>
                </div>
        

        <?php echo $__env->make('admin.includes.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <script src="<?php echo e(asset('public/frontend/assets/js/alert.js')); ?>"></script>

        <script>
            $('.company-policie-submit').click(function(){
                const companyPolicie = $('#companyPolicie').val();
                    
                    if (companyPolicie.trim() === '') {
						triggerAlert('Please enter company policie .','error');
						companyPolicie.focus();
						return;
					}
                    var csrfToken = $('meta[name="csrf-token"]').attr('content');
                    $.ajax({
                        url: "/policies", 
                        type: 'POST',
                        data: {
                            "_token": csrfToken,
                            companyPolicie: companyPolicie,
                            type:'cp',
                
                        },
                        success: function(response) {
                            if (response.success) {
                                triggerAlert('You have successfully Inserted company policies', 'success');
                            
                                location.reload(true);
                            } else {
                                triggerAlert('Somthings went wrong!', 'error');
                            }
                        },
                        error: function(error) {
                            triggerAlert('Somthings went wrong.','error');
                        }
                    });
                });
        </script><?php /**PATH /home/accessas/public_html/hrms/resources/views/admin/company-policies.blade.php ENDPATH**/ ?>