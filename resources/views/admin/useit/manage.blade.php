@include('admin.includes.header')
@include('admin.includes.sidebar') 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/viewerjs/1.3.1/viewer.min.css">
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
                <h3 class="card-title">Manage Toolkit Details</h3>
                  <form action="manage-nodejs" class="manage_cus" method="GET" >
                    <div class="card-tools">
                      <div class="input-group input-group-sm" >
                        <div class="spc_item">
                          <input type="text" name="search" class="form-control" value="@if(!empty($search)){{$search}}@endif" placeholder="Search">

                          <div class="input-group-append">
                            <button type="submit" class="btn btn-default">
                              <i class="fas fa-search"></i>
                            </button>
                            <button class="Reset-btn"><a href="{{url('/admin/use-it/manage')}}" class="btn  btn-info " >Reset</a> </button>
                          </div>
                        </div>
                      </div>
                    </div>
				          </form>
              </div>
              <!-- /.card-header -->
			        @include('flash/flash-message')
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-balance">
                  <thead>
                    <tr>

                      
                      <th>Toolkit Category</th>
                      <th>Toolkit Title</th>
                      <th>Toolkit Title Description</th>
                      <th>What Is It</th>
                      <th>How It Helps</th>
                      <th>Use Cases Description</th>
                      <th>Limitations Description</th>
                      <th>Step By Step Description</th>
                      <th>Table Image</th>
                      <th>Example Image</th>
                      <th>Understanding The Tool</th>
                      <th>Toolkit Document</th>
                      <th>Action</th>
					  
                    </tr> 
                  </thead>
                  <tbody>
				            @foreach($toolkits as $info)
                        <tr>
                            <td>{{ $info->toolkit_category }}</td>
                            <td>{{$info->toolkit_title}}</td>
                            <td style="width: 200px;">{!!$info->toolkit_title_desc!!}</td>
                            <td style="width: 200px;">{!!$info->what_is_it!!}</td>
                            <td style="width: 200px;">{!! $info->how_it_helps !!}</td>
                            <td style="width: 200px;">{!! $info->use_cases_desc !!}</td>
                            <td style="width: 200px;">{!!$info->limitations_desc!!}</td>
                            <td style="width: 200px;">{!!$info->sbs_desc!!}</td>
                            <td><img src="{{url('public/uploads/useit')}}/{{$info->table_img}}" width="100%" height="150"/></td>
                            <td><img src="{{url('public/uploads/useit')}}/{{$info->exmp_img}}" width="100%" height="150"/></td>
                            <td style="width: 200px;">
                                <table>
                                    <tr>
                                    <td>{!! json_decode($info->understanding_the_tool)->card_content_1 !!}</td>
                                    <td>{!! json_decode($info->understanding_the_tool)->card_content_2 !!}</td>
                                    <td>{!! json_decode($info->understanding_the_tool)->card_content_3 !!}</td>
                                    <td>{!! json_decode($info->understanding_the_tool)->card_content_4 !!}</td>
                                    <td>{!! json_decode($info->understanding_the_tool)->card_content_5 !!}</td>
                                    <td>{!! json_decode($info->understanding_the_tool)->card_content_6 !!}</td>
                                </tr>
                                </table>
                            </td>
                            <td id="pptViewer" class="ppt-cell" data-ppt-url="{{ asset('public/uploads/useitdoc/' . $info->toolkit_doc) }}"> 
                                <iframe src="https://view.officeapps.live.com/op/embed.aspx?src={{ urlencode(asset('public/uploads/useitdoc/' . $info->toolkit_doc)) }}" style="width: 200px; height: 200px;"></iframe>
                            </td>
                
                            <td>
                                <a class="btn btn-success" href="{{url('/admin/use-it/edit')}}/{{$info->id}}"title="Edit"><i class="far fa-edit"></i></a>
                                <!--<a class="btn btn-danger"  href="{{url('/admin/manage-siteinfo/delete')}}/{{$info->id}}" data-id="{{$info->id}}"title="Delete"><i class="fa fa-trash" aria-hidden="true"></i></a>-->
                                </td>
                        </tr>
                    @endforeach
                  </tbody>
                </table>
			
              </div>
			        {!! $toolkits->links('vendor.pagination.custom2') !!}    
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/viewerjs/1.3.1/viewer.min.js"></script>

 <script>
    document.addEventListener('DOMContentLoaded', function () {
        var pptViewer = document.getElementById('pptViewer');
        pptViewer.addEventListener('click', function () {
            var pptUrl = pptViewer.getAttribute('data-ppt-url');

            // Open the PowerPoint presentation in a new window or modal
            openPPTViewer(pptUrl);
        });
    });

   function openPPTViewer(url) {
    var viewer = new Viewer(document.createElement('div'), {
        toolbar: {
            zoomIn: 4,
            zoomOut: 4,
            oneToOne: 4,
            reset: 4,
        },
        url: function () {
            return url;
        },
    });
    viewer.view(0); // Show the first slide.
}
</script>


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