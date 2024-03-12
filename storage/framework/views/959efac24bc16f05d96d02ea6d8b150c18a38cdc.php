    <style>



    </style>

    <div class="content-section-bg">

        <div class="tab-content" id="v-pills-tabContent">

            <div class="tab-pane fade show active mt-lg-5" id="vision-building-tools1" role="tabpanel" aria-labelledby="vision-building-tools" tabindex="0">

                <div class=" dark-bg p-md-4 p-1 mt-1">

                    <div class="text-center pt-3 mb-4 text-white">

                        <h3>Enhance Your Entrepreneurial<br>Journey with Vision-Enriching Resources.</h3>

                    </div>

                    <div class="text-white text-center pb-3">

                        <p>Starting a new business can be exciting, but it's also challenging. To navigate this journey successfully, you need a clear vision and strategy. These vision-building tools can help you map out your startup's path and make informed decisions along the way.</p>

                    </div>

                </div>

                <div class="d-md-flex d-block inner-tab-learning font-dark" id="one">

                    <div class="nav flex-column nav-pills tab-bg" id="v-pills-tab" role="tablist" aria-orientation="vertical">

                        <?php $__currentLoopData = $toolkitdetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <button class="v-pills-home1-tab nav-link nav-link-btn <?php echo e($index === 0 ? 'active' : ''); ?>" data-ind="<?php echo e($index); ?>" id="<?php echo e($details->toolkit_title_slug); ?><?php echo e('1'); ?>" data-bs-toggle="pill" data-bs-target="#<?php echo e($details->toolkit_title_slug); ?>" type="button" role="tab" aria-controls="<?php echo e($details->toolkit_title_slug); ?>" aria-selected="true"><?php echo e($details->toolkit_title); ?></button>

                        <hr>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



                    </div>

                    <div class="tab-content" id="v-pills-tabContent">

                        <?php $__currentLoopData = $toolkitdetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <div class="tab-pane content-box fade <?php echo e($index === 0 ? 'show active' : ''); ?>" data-ind="<?php echo e($index); ?>" id="<?php echo e($details->toolkit_title_slug); ?><?php echo e('1'); ?>" role="tabpanel" aria-labelledby="<?php echo e($details->toolkit_title_slug); ?>" tabindex="0">

                            <div>

                                <h5><?php echo e($details->toolkit_title); ?></h5>

                                <p><b>What it is:</b> <?php echo $details->what_is_it; ?></p>

                                <p><b>How it helps:</b><?php echo $details->how_it_helps; ?></p>

                            </div>

                            <div class="d-flex justify-content-end">

                                <a href="<?php echo e(url('customer')); ?>/<?php echo e($details->toolkit_category_slug); ?>/<?php echo e($details->toolkit_title_slug); ?>/<?php echo e(('use-it')); ?>" class="start-learning-btn" id="toggleButton">Use It!</a>

                            </div>

                        </div>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



                    </div>

                </div>

            </div>



        </div>

    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Get all the buttons and content boxes
            const buttons = document.querySelectorAll('.nav-link-btn');
            const contentBoxes = document.querySelectorAll('.content-box');

            buttons.forEach(function(button, index) {
                button.addEventListener('click', function() {
                    // Remove 'active' class from all buttons and content boxes
                    buttons.forEach(function(btn) {
                        btn.classList.remove('active');
                    });

                    contentBoxes.forEach(function(box) {
                        box.classList.remove('show', 'active');
                    });

                    // Add 'active' class to the clicked button and content box
                    button.classList.add('active');
                    contentBoxes[index].classList.add('show', 'active');
                });
            });
        });
    </script><?php /**PATH /home/accessas/public_html/elarning/resources/views/frontend/sidebar-menu-content.blade.php ENDPATH**/ ?>