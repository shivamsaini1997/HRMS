@include('frontend.include.head')
<script src="https://cdn.tiny.cloud/1/cwm9vzzgghlue80pv07ozfkdwdwu3bh0v15hg9i0hgmwqutz/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>


		<!-- Main Wrapper -->
        <div class="main-wrapper">
		
			<!-- Header -->
            @include('frontend.include.header')
			<!-- /Header -->
			
			<!-- Sidebar -->
			@include('frontend.include.sidebar')

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
                           <p>{!! $get_policy->policies !!}</p>
                        </div>
                    </div>
                    </div>
                 </div>
        </div>
        

        @include('frontend.include.footer')