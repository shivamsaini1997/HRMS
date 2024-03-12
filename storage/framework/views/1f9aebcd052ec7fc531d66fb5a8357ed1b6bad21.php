 <?php echo $__env->make('frontend.include.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
 <!-- this page css -->
 <style>

     /* .sign-register-btn {
         display: none;
     } */

     .burger-menu-bar {
         display: block;
     }

     @media  only screen and (min-width: 991px) {

         .burger-menu-bar {
             display: none;
         }

     } 
 </style>
 <!-- this page css -->

 <section class="start-learning-sidebar">
     <div class=" w-100 mx-0 d-flex">
         <div class="sidebar-menu mt-5" id="sidebar">
             <div class="menus">
                 <?php echo $__env->make('frontend.sidebar-menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
             </div>
         </div>
         <div id="section-1" class="left-bar learning-leftbar">
             <?php echo $__env->make('frontend.sidebar-menu-content', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
         </div>
     </div>
 </section>

 <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

 <script>
     $(document).ready(function() {
         $('#toggleButton').click(function() {
             $('#section-1').toggle();
             $('#section2').toggle();
         });
     });
 </script>

 <script>
     $(document).ready(function() {
         $('.show-after').click(function() {
             $('#section-1').show();
             $('#section2').hide();
         })
     })
 </script>

 <?php echo $__env->make('frontend.include.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/accessas/public_html/elarning/resources/views/frontend/start-learning.blade.php ENDPATH**/ ?>