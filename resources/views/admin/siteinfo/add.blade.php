@include('admin.includes.header')
@include('admin.includes.sidebar') 
    
	 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row ">
		      <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
			          @if(!empty($id))
                  <h3 class="card-title">Edit Site Info</h3>
			          @else
				          <h3 class="card-title">Add Site Info</h3>
			          @endif
              </div>
              <!-- /.card-header -->
			        @include('flash/flash-message')
				
              <!-- form start -->
                <form action="{{url('admin/add-siteinfo/store')}}" method="post"  enctype="multipart/form-data">
			            @csrf
			            <input type="hidden" name="id" value="@if(!empty($id)){{$id}}@endif">
                    <div class="card-body">
                       <!-- Website Header Logo -->
                        <div class="form-group">
                            <label for="exampleInputName">Website Header Logo</label>
                            <input type="file" name="header_logo" id="header_logo" class="form-control" value="@if($response !=''){{ $response->image}}@endif"/>
                            @if($response != '')
                            <img id="header_logo_preview" src="{{url('public/uploads/website-assets')}}/{{ $response->header_logo }}" alt="Header Logo Preview" style="max-width: 200px; display: block;" />
                            @else
                            <img id="header_logo_preview" src="" alt="Header Logo Preview" style="max-width: 200px; display: none;" />
                            @endif
                        </div>
                
                        <!-- Website Footer Logo -->
                        <div class="form-group">
                            <label for="exampleInputName">Website Footer Logo</label>
                            <input type="file" name="footer_logo" id="footer_logo" class="form-control" value="@if($response !=''){{ $response->image}}@endif"/>
                            @if($response != '')
                            <img id="footer_logo_preview" src="{{url('public/uploads/website-assets')}}/{{ $response->footer_logo }}" alt="Footer Logo Preview" style="max-width: 200px; display: block;" />
                            @else
                            <img id="footer_logo_preview" src="" alt="Footer Logo Preview" style="max-width: 200px; display: none;" />
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName">Company Email</label>
                            <input type="text" name="email" class="form-control" id="exampleInputName" placeholder="Enter company email" value="@if($response !=''){{ $response->email}}@endif" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName">Company Phone Number</label>
                            <input type="text" name="phone_number" class="form-control" id="exampleInputName" placeholder="Enter company phone_number" value="@if($response !=''){{ $response->phone_number}}@endif" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputdescription">Company Full Address</label>
                            <textarea class="summernote" id="summernote" name="address" required>@if($response !=''){{ $response->address}}@endif</textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputdescription">Company Business Hours</label>
                            <textarea class="summernote" id="summernote" name="business_hours" required>@if($response !=''){{ $response->business_hours}}@endif</textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName">Company Social Links</label>
                            <div class="form-group">
                                <label for="exampleInputName">Company Facebook Profile Link</label>
					            <input type="text" name="facebook_link" id="facebook_link"  class="form-control" value="@if($response !=''){{ $response->facebook_link}}@endif" placeholder="Enter company facebook profile links"/>  
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName">Company LinkedIn Profile Link</label>
					            <input type="text" name="linkedin_link" id="linkedin_link"  class="form-control" value="@if($response !=''){{ $response->linkedin_link}}@endif" placeholder="Enter company linkedin profile links"/>  
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName">Company Tweeter Profile Link</label>
					            <input type="text" name="tweeter_link" id="tweeter_link"  class="form-control" value="@if($response !=''){{ $response->tweeter_link}}@endif" placeholder="Enter company tweeter profile links"/>  
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName">Company Youtube Channel Link</label>
					            <input type="text" name="youtube_link" id="youtube_link"  class="form-control" value="@if($response !=''){{ $response->youtube_link}}@endif" placeholder="Enter company youtube channel links"/>  
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName">Company Instagram Profile Link</label>
					            <input type="text" name="instagram_link" id="instagram_link"  class="form-control" value="@if($response !=''){{ $response->instagram_link}}@endif" placeholder="Enter company instagram profile links"/>  
                            </div>
                        </div>
                  
                     
                    </div>
                
                    <!-- /.card-body -->
			
                    <div class="card-footer">
                      <button id="payment-button" type="submit" class="btn btn-lg btn-info">
						Submit
					  </button>
                    </div>
                </form>
              </div>
            </div>
         
          </div>
          <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  
@include('admin.includes.footer')

<!--<script>-->
   
<!--  $("#header_logo").on("change", function () {-->
<!--    if (this.files && this.files[0]) {-->
<!--      var reader = new FileReader();-->
<!--      reader.onload = function (e) {-->
<!--        $("#header_logo_preview").attr("src", e.target.result);-->
<!--        $("#header_logo_preview").show();-->
<!--      };-->
<!--      reader.readAsDataURL(this.files[0]);-->
<!--    }-->
<!--  });-->

  
<!--  $("#footer_logo").on("change", function () {-->
<!--    if (this.files && this.files[0]) {-->
<!--      var reader = new FileReader();-->
<!--      reader.onload = function (e) {-->
<!--        $("#footer_logo_preview").attr("src", e.target.result);-->
<!--        $("#footer_logo_preview").show();-->
<!--      };-->
<!--      reader.readAsDataURL(this.files[0]);-->
<!--    }-->
<!--  });-->
<!--</script>-->

<script>
    // Display header logo preview on file selection
    $(document).on('change', '#header_logo', function() {
        const headerLogoPreview = $('#header_logo_preview');
        if (this.files && this.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                headerLogoPreview.attr('src', e.target.result).show();
            };
            reader.readAsDataURL(this.files[0]);
        } else {
            headerLogoPreview.hide();
        }
    });

    // Display footer logo preview on file selection
    $(document).on('change', '#footer_logo', function() {
        const footerLogoPreview = $('#footer_logo_preview');
        if (this.files && this.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                footerLogoPreview.attr('src', e.target.result).show();
            };
            reader.readAsDataURL(this.files[0]);
        } else {
            footerLogoPreview.hide();
        }
    });
</script>

