<?php echo $__env->make('admin.includes.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('admin.includes.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
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
            
              <!-- <a href="<?php echo e(url('admin/manage_agent/add')); ?>"> 
                <button type="button" class="btn btn-success btn-add"> Add Agent</button>
              </a> -->
            
          
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Manage Toolkit Details</h3>
                  <form action="manage-nodejs" class="manage_cus" method="GET" >
                    <div class="card-tools">
                      <div class="input-group input-group-sm" >
                        <div class="spc_item">
                          <input type="text" name="search" class="form-control" value="<?php if(!empty($search)): ?><?php echo e($search); ?><?php endif; ?>" placeholder="Search">

                          <div class="input-group-append">
                            <button type="submit" class="btn btn-default">
                              <i class="fas fa-search"></i>
                            </button>
                            <button class="Reset-btn"><a href="<?php echo e(url('/admin/use-it/manage')); ?>" class="btn  btn-info " >Reset</a> </button>
                          </div>
                        </div>
                      </div>
                    </div>
				          </form>
              </div>
              <!-- /.card-header -->
			        <?php echo $__env->make('flash/flash-message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
				            <?php $__currentLoopData = $toolkits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $info): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($info->toolkit_category); ?></td>
                            <td><?php echo e($info->toolkit_title); ?></td>
                            <td style="width: 200px;"><?php echo $info->toolkit_title_desc; ?></td>
                            <td style="width: 200px;"><?php echo $info->what_is_it; ?></td>
                            <td style="width: 200px;"><?php echo $info->how_it_helps; ?></td>
                            <td style="width: 200px;"><?php echo $info->use_cases_desc; ?></td>
                            <td style="width: 200px;"><?php echo $info->limitations_desc; ?></td>
                            <td style="width: 200px;"><?php echo $info->sbs_desc; ?></td>
                            <td><img src="<?php echo e(url('public/uploads/useit')); ?>/<?php echo e($info->table_img); ?>" width="100%" height="150"/></td>
                            <td><img src="<?php echo e(url('public/uploads/useit')); ?>/<?php echo e($info->exmp_img); ?>" width="100%" height="150"/></td>
                            <td style="width: 200px;">
                                <table>
                                    <tr>
                                    <td><?php echo json_decode($info->understanding_the_tool)->card_content_1; ?></td>
                                    <td><?php echo json_decode($info->understanding_the_tool)->card_content_2; ?></td>
                                    <td><?php echo json_decode($info->understanding_the_tool)->card_content_3; ?></td>
                                    <td><?php echo json_decode($info->understanding_the_tool)->card_content_4; ?></td>
                                    <td><?php echo json_decode($info->understanding_the_tool)->card_content_5; ?></td>
                                    <td><?php echo json_decode($info->understanding_the_tool)->card_content_6; ?></td>
                                </tr>
                                </table>
                            </td>
                            <td id="pptViewer" class="ppt-cell" data-ppt-url="<?php echo e(asset('public/uploads/useitdoc/' . $info->toolkit_doc)); ?>"> 
                                <iframe src="https://view.officeapps.live.com/op/embed.aspx?src=<?php echo e(urlencode(asset('public/uploads/useitdoc/' . $info->toolkit_doc))); ?>" style="width: 200px; height: 200px;"></iframe>
                            </td>
                
                            <td>
                                <a class="btn btn-success" href="<?php echo e(url('/admin/use-it/edit')); ?>/<?php echo e($info->id); ?>"title="Edit"><i class="far fa-edit"></i></a>
                                <!--<a class="btn btn-danger"  href="<?php echo e(url('/admin/manage-siteinfo/delete')); ?>/<?php echo e($info->id); ?>" data-id="<?php echo e($info->id); ?>"title="Delete"><i class="fa fa-trash" aria-hidden="true"></i></a>-->
                                </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </tbody>
                </table>
			
              </div>
			        <?php echo $toolkits->links('vendor.pagination.custom2'); ?>    
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
  <?php echo $__env->make('admin.includes.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

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
</script><?php /**PATH /home/accessas/public_html/elarning/resources/views/admin/useit/manage.blade.php ENDPATH**/ ?>