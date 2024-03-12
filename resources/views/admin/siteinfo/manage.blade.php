@include('admin.includes.header')
@include('admin.includes.sidebar') 
<style>
  td.teamFlag img{
    
    height: 103px;
    width: 136px;

  }
.spc_item {
    display: flex;
}
.input-group.input-group-sm {
    width: fit-content;
    float: right;
}
.Reset-btn {
    background: transparent;
    border: none;
    padding: 0px 5px !important;
}
.spc_item input {
    margin: 0px 5px;
    padding: 10px;
}
.input-group-append button {
    padding: 0px 10px;
}
</style>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">

        <!-- /.row -->
        <div class="row">
          <div class="col-12">
            
              <!-- <a href="{{url('admin/manage_agent/add')}}"> 
                <button type="button" class="btn btn-success btn-add"> Add Agent</button>
              </a> -->
            
          
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Manage Products</h3>
                  <form action="manage-nodejs" class="manage_cus" method="GET" >
                    <div class="card-tools">
                      <div class="input-group input-group-sm" >
                        <div class="spc_item">
                          <input type="text" name="search" class="form-control" value="@if(!empty($search)){{$search}}@endif" placeholder="Search">

                          <div class="input-group-append">
                            <button type="submit" class="btn btn-default">
                              <i class="fas fa-search"></i>
                            </button>
                            <button class="Reset-btn"><a href="{{url('/admin/manage-siteinfo')}}" class="btn  btn-info " >Reset</a> </button>
                          </div>
                        </div>
                      </div>
                    </div>
				          </form>
              </div>
              <!-- /.card-header -->
			        @include('flash/flash-message')
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>

                      
                      <th>Website Header Logo</th>
                      <th>Wehsite Footer Logo</th>
                      <th>Company Email</th>
                      <th>Company Phone Number</th>
                      <th>Company Full Address</th>
                      <th>Company Business Hours</th>
                      <th>Company Social Links</th>
                      <th>Action</th>
					  
                    </tr> 
                  </thead>
                  <tbody>
				            @foreach($siteinfo as $info)
                      <tr>
                        <td><img src="{{url('public/uploads/website-assets')}}/{{$info->header_logo}}" width="100%" height="150"/></td>
                        <td><img src="{{url('public/uploads/website-assets')}}/{{$info->footer_logo}}" width="100%" height="150"/></td>
                        <td>{{ $info->email }}</td>
                        <td>{{$info->phone_number}}</td>
                        <td><textarea>{!!$info->address!!}</textarea></td>
                        <td>{!!$info->business_hours!!}</td>
                        
                        <td>
                            @if($info->facebook_link)
                        Facebook: <a href="{{$info->facebook_link}}" target="_blank">{{$info->facebook_link}}</a><br>
                    @endif

                    @if($info->linkedin_link)
                        LinkedIn: <a href="{{$info->linkedin_link}}" target="_blank">{{$info->linkedin_link}}</a><br>
                    @endif

                    @if($info->tweeter_link)
                        Twitter: <a href="{{$info->tweeter_link}}" target="_blank">{{$info->tweeter_link}}</a><br>
                    @endif

                    @if($info->youtube_link)
                        YouTube: <a href="{{$info->youtube_link}}" target="_blank">{{$info->youtube_link}}</a><br>
                    @endif

                    @if($info->instagram_link)
                        Instagram: <a href="{{$info->instagram_link}}" target="_blank">{{$info->instagram_link}}</a>
                    @endif
                            
                        </td>
                        
                        
                        <td>
                            <a class="btn btn-success" href="{{url('/admin/manage-siteinfo/edit')}}/{{$info->id}}"title="Edit"><i class="far fa-edit"></i></a>
                            <a class="btn btn-danger"  href="{{url('/admin/manage-siteinfo/delete')}}/{{$info->id}}" data-id="{{$info->id}}"title="Delete"><i class="fa fa-trash" aria-hidden="true"></i></a>
                            </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
			
              </div>
			          
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @include('admin.includes.footer')
  
  
  
  <script type="text/javascript">
  
    
	
	
    $(".deletepage").click(function(e){
		 var id = $(this).attr('data-id');
		// console.log(id);
		if(confirm("Are you sure you want to delete this?")){
        e.preventDefault();
		$.ajax({
           type:'GET', 
           url:"",
           data:{id:id},
           success:function(data){
              location.reload();
           }
        });
		}else{
        return false;
    }
  
    });
</script>
   