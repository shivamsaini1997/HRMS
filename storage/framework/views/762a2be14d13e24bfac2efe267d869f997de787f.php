<?php

use App\Http\Controllers\HomeController;

$userinfo = HomeController::userinfo();
//dd($userinfo);
?>
<?php echo $__env->make('frontend.include.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- navbar section starts-->

<style>
    .burger-menu-bar {
        display: none;
    }

    .nav-bg{
        background-color: rgba(47, 52, 88, 1);
    }
    
    .user-name{
        background-color: #fff;
        padding: 7px 15px;
        border-radius: 50%;
        font-weight: 600;
         margin-top: 10px;
    }
    
            .user-img{
                border-radius: 50%;
                width: 50px;
                height: 50px;
            }
</style>

<div class="bg-bot">
    <img src="<?php echo e(asset('public/frontend/assets/images/Ellipse.png')); ?>" alt="" width="70px">
</div>
<div class="bot">
    <img src="<?php echo e(asset('public/frontend/assets/images/chat-bot.png')); ?>" alt="" width="50px">
</div>

<!-- navbar section starts-->

<section class="nav-bg main-menu fixed-top">
    <div class="container pt-2">
        <?php if(empty($userinfo)): ?>

        <div class="row align-items-center">
            <div class="col-4 d-flex align-items-center">
                <h1 class="">
                    <a class="text-white" href="/">eLarning</a>
                </h1>
            </div>
            <div class="col-8 d-flex justify-content-end">

                <div class="button-1 sign-register-btn h-75"><a href="<?php echo e(route('login')); ?>" class="font-dark">Sign in</a> / <a href="<?php echo e(route('signup')); ?>" class="font-dark"> Register </a></div>

                <div class="burger-menu-bar">
                    <div class="p-2">
                        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                            <span><i class="fa-solid fa-bars" style="color: #eef1f6;"></i></span>
                        </button>
                    </div>
                    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                        <div class="offcanvas-body">
                            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                <div class="menus navbar-nav justify-content-end flex-grow-1">
                                    <button type="button" class="btn-close p-3" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                <?php if(!empty($userinfo)): ?>
                                    <?php echo $__env->make('frontend.sidebar-menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php else: ?>

        <div class="row">
            <div class="col-4 d-flex align-items-center ">
            <h1 class="">
                    <a class="text-white" href="/">eLarning</a>
                </h1>
            </div>
            <div class="col-8 text-end d-flex align-items-center justify-content-end mb-2">
                <a href="<?php echo e(route('profile')); ?>"><?php if($userinfo->image == null): ?> <p class="user-name"><?php echo e(strtoupper($userinfo->firstname[0])); ?></p> <?php else: ?> <img class="user-img" src="<?php echo e(asset('public/uploads/profile-image')); ?>/<?php echo e($userinfo->image); ?>"" alt="" width="120%"><?php endif; ?></a>
            <!-- <a class="dropdown-item nav-link" href="<?php echo e(route('logout')); ?>"><i class="fa-solid fa-arrow-right-from-bracket text-white h3 text-center"></i></a> -->
            </div>
        </div>
        
        <?php endif; ?>
    </div>
</section>





<!-- navbar section ends--><?php /**PATH /home/accessas/public_html/elarning/resources/views/frontend/include/header.blade.php ENDPATH**/ ?>