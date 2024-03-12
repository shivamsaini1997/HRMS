<?php echo $__env->make('frontend.include.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<section>
    <div class="container">
        <div class="row pt-5">
            <div class="col-sm-12 p-0 m-0">
                <div class="pt-3"><img src="<?php echo e(asset('public/frontend/assets/images/thetool.jpg')); ?>" alt="" width="100%"></div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            <div class="col-12 d-flex justify-content-center mb-3">
                <div class="btn-sec-width">
                    <a href="<?php echo e(route('customer')); ?>" class="button-1">Use The Tool</a>
                </div>
            </div>
        </div>
    </div>
</section>



<?php echo $__env->make('frontend.include.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/accessas/public_html/elarning/resources/views/frontend/how-to-use-it.blade.php ENDPATH**/ ?>