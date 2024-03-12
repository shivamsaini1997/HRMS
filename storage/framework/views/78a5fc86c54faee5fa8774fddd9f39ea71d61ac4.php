<?php echo $__env->make('frontend.include.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<style>
    .table-border {
        border: 1px solid black;
        box-shadow: 1px 1px 2px black;
        margin-bottom: -250px;
    }

    .cards {
        background-color: rgba(213, 226, 232, 1);
        padding: 0 15px 15px 15px;
    }

    .count {
        background-color: rgba(255, 255, 255, 1);
        padding: 10px;
        width: 50px;
        height: 50px;
        border-radius: 50%;
        margin-top: -25px;
    }

    .use-the-tool {
        background-color: rgba(47, 52, 88, 1);
        color: #fff;
        padding: 5px 12px;
        border-radius: 5px;
        font-size: 16px;
        box-shadow: 1px 1px 5px rgba(21, 55, 120, 1);
    }

    .dark-bg{
        padding-bottom: 0;
    }

    .main-menu{
        border-bottom: 1px solid #8a8a8a94;
    }

    /* after click on use it page css ends */
</style>
<style>
    .dark-bg {
        padding-bottom: 200px;
    }

    .img-section{
        margin-top: -200px;
    }

</style>

<div id="section2 margin-top">
    <div class="">
        <div class="dark-bg pt-5 use-it-part">
            <div class="container">
                <div class="row">
                    <div class="col-12 mt-5">
                        <div class="pt-2 pb-5 mt-2 text-white">
                            <h1><?php echo e($toolkitdetails->toolkit_title); ?></h1>
                            <p><?php echo $toolkitdetails->toolkit_title_desc; ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-sm-12 col-md-5 col-lg-5 text-white">
                        <h3 class="pb-2">Use Cases</h3>
                        <?php echo $toolkitdetails->use_cases_desc; ?>


                        <div class="pt-4">
                            <h3>Limitations</h3>
                            <p> <?php echo $toolkitdetails->limitations_desc; ?></p>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-7 col-lg-6 text-white">
                        <h3 class="pb-2">Step by Step</h3>
                        <?php echo $toolkitdetails->sbs_desc; ?>

                        <!--<ol>-->
                        <!--    <div class="pb-3">-->
                        <!--        <li class="h5">Familiarize Yourself</li>-->
                        <!--        <p>The Startup Canvas summarises the most important elements of an organisation's business model.</p>-->
                        <!--    </div>-->
                        <!--    <div class="pb-3">-->
                        <!--        <li class="h5">Get Started</li>-->
                        <!--        <p>The Startup Canvas summarises the most important elements of an organisation's business model.</p>-->
                        <!--    </div>-->
                        <!--    <div class="pb-3">-->
                        <!--        <li class="h5">Complete</li>-->
                        <!--        <p>The Startup Canvas summarises the most important elements of an organisation's business model.</p>-->
                        <!--    </div>-->
                        <!--    <div class="pb-3">-->
                        <!--        <li class="h5">Identify knowledge gaps and priorities</li>-->
                        <!--        <p>The Startup Canvas summarises the most important elements of an organisation's business model.</p>-->
                        <!--    </div>-->
                        <!--</ol>-->
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
           <div class="row justify-content-evenly pt-3 pb-5 img-section">
                <div class="col-sm-12 col-md-8 col-lg-5">
                    <div>
                        <img src="<?php echo e(url('public/uploads/useit')); ?>/<?php echo e($toolkitdetails->table_img); ?>" alt="" width="100%">
                    </div>
                </div>
                <div class="col-sm-12 col-md-8 col-lg-5">
                    <div>
                        <img src="<?php echo e(url('public/uploads/useit')); ?>/<?php echo e($toolkitdetails->exmp_img); ?>" alt="" width="100%">
                    </div>
                </div>
            </div>
        </div>

        <div class="container card-container">
            <div class="row">
                <div class="col-12 pt-3 pb-5 text-center">
                    <h3>Understanding the Tool</h3>
                </div>
            </div>
            
            <div class="row justify-content-evenly">
                 <?php //dd($toolkitdetails->understanding_the_tool); ?>
                <?php
                    $toolData = json_decode($toolkitdetails->understanding_the_tool, true);
                    
                    $index = 1;
                ?>
                <?php $__currentLoopData = $toolData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $content): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(!empty($content)): ?>
                        <div class="col-sm-12 col-md-6 col-lg-5 mt-2 mb-4">
                            <div class="cards">
                                <div class="d-flex justify-content-center">
                                    <p class="count text-center"><?php echo e($index); ?></p>
                                </div>
                                <div>
                                    <div>
                                        <?php echo $content; ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php
                        $index++;
                    ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <!--<div class="col-sm-12 col-md-6 col-lg-5 mt-2 mb-4">-->
                <!--    <div class="cards">-->
                <!--        <div class="d-flex justify-content-center">-->
                <!--            <p class="count text-center">2</p>-->
                <!--        </div>-->
                <!--        <div>-->
                <!--            <p>The ‘Problem’ section is to be used to highlight the core problems that users face, and that the startup is attempting to solve (through its product or service). These are not problems that the startup is facing as an organization.</p>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--</div>-->
            </div>
            <!--<div class="row justify-content-evenly">-->
            <!--    <div class="col-sm-12 col-md-6 col-lg-5 mt-2 mb-4">-->
            <!--        <div class="cards">-->
            <!--            <div class="d-flex justify-content-center">-->
            <!--                <p class="count text-center">3</p>-->
            <!--            </div>-->
            <!--            <div>-->
            <!--                <p>The ‘Problem’ section is to be used to highlight the core problems that users face, and that the startup is attempting to solve (through its product or service). These are not problems that the startup is facing as an organization.</p>-->
            <!--            </div>-->
            <!--        </div>-->
            <!--    </div>-->
            <!--    <div class="col-sm-12 col-md-6 col-lg-5 mt-2 mb-4">-->
            <!--        <div class="cards">-->
            <!--            <div class="d-flex justify-content-center">-->
            <!--                <p class="count text-center">4</p>-->
            <!--            </div>-->
            <!--            <div>-->
            <!--                <p>The ‘Problem’ section is to be used to highlight the core problems that users face, and that the startup is attempting to solve (through its product or service). These are not problems that the startup is facing as an organization.</p>-->
            <!--            </div>-->
            <!--        </div>-->
            <!--    </div>-->
            <!--</div>-->
            <!--<div class="row justify-content-evenly">-->
            <!--    <div class="col-sm-12 col-md-6 col-lg-5 mt-2 mb-4">-->
            <!--        <div class="cards">-->
            <!--            <div class="d-flex justify-content-center">-->
            <!--                <p class="count text-center">5</p>-->
            <!--            </div>-->
            <!--            <div>-->
            <!--                <p>The ‘Problem’ section is to be used to highlight the core problems that users face, and that the startup is attempting to solve (through its product or service). These are not problems that the startup is facing as an organization.</p>-->
            <!--            </div>-->
            <!--        </div>-->
            <!--    </div>-->
            <!--    <div class="col-sm-12 col-md-6 col-lg-5 mt-2 mb-4">-->
            <!--        <div class="cards">-->
            <!--            <div class="d-flex justify-content-center">-->
            <!--                <p class="count text-center">6</p>-->
            <!--            </div>-->
            <!--            <div>-->
            <!--                <p>The ‘Problem’ section is to be used to highlight the core problems that users face, and that the startup is attempting to solve (through its product or service). These are not problems that the startup is facing as an organization.</p>-->
            <!--            </div>-->
            <!--        </div>-->
            <!--    </div>-->
            <!--</div>-->
            <div class="row mb-5">
                <div class="col-12">
                    <div class="d-flex justify-content-end">
                        <a href="<?php echo e(asset('public/uploads/useitdoc/' . $toolkitdetails->toolkit_doc)); ?>" class="use-the-tool">Download The Tool</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php echo $__env->make('frontend.include.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/accessas/public_html/elarning/resources/views/frontend/use-it-btn-page.blade.php ENDPATH**/ ?>