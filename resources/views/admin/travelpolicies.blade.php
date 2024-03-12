@include('admin.includes.head')
<link rel="stylesheet" href="{{asset('public/frontend/assets/css/alert.css')}}">
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
            @include('admin.includes.header')
			<!-- /Header -->
			
			<!-- Sidebar -->
			@include('admin.includes.sidebar')

			<!-- /Sidebar -->
            <!-- Page Wrapper -->
            <div class="page-wrapper">
			
				<!-- Page Content -->
                <div class="content container-fluid">
                    <div class="page-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h3 class="page-title">Travel Policies </h3>
                                    <ul class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="admin-dashboard.html">Dashboard</a></li>
                                        <li class="breadcrumb-item active">Travel Policies</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                   
                    <div class="row">
                        <div class="col-12">
                            <form action="javascript:void(0)" method="post">
                               
                                <textarea name="travelpolicie" id="travelpolicie">@if($check_travel_policie_data != null){{$check_travel_policie_data->policies}}@endif</textarea>

                                <button class="btn add-btn travel-policie-submit mt-2">Submit</button>
							</form>
							
                        </div>
                    </div>
                    </div>
                 </div>
        </div>
        

        @include('admin.includes.footer')
        <script src="{{asset('public/frontend/assets/js/alert.js')}}"></script>

		<script>
            $(document).ready(function(){
        $('.travel-policie-submit').click(function(){
            
            const travelpolicie = $('#travelpolicie').val();
            
            if (travelpolicie === '') {
                triggerAlert('Please enter company policie .','error');
                travelpolicie.focus();
                return;
            }

            var csrfToken = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: "/policies", 
                type: 'POST',
                data: {
                    "_token": csrfToken,
                    travelpolicie: travelpolicie,
                    type:'tp',
                },
                success: function(response) {
                    
                    if (response.success) {
                        triggerAlert('You have successfully added travel policie', 'success');
                    
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

    });
        </script>