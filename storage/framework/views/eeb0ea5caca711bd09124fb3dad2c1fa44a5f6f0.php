<style>
    hr {
        margin: 1px;
    }

    .active-menu img {
        padding: 10px 0 10px 0;
    }

    .add-bg{
        background-color: #fff;
    }


    .active-menu:hover {
        background-color: #fff;
    }
</style>
<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
    <div class="profile-img mb-2 mt-5">
        <img src="<?php echo e(asset('public/frontend/assets/images/profile.png')); ?>" alt="">
    </div>
    <?php $__currentLoopData = $all_toolkit_category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $toolkit_category_name => $toolkit_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="active-menu">
        <div class="">
            <div class="">
                <img src="<?php echo e(asset('public/frontend/assets/images/goal.png')); ?>" alt="">
            </div>
            <div>
                <div class="showclass">
                    <a href="<?php echo e(url('customer')); ?>/<?php echo e(strtolower(str_replace(' ', '-', $toolkit_category_name))); ?>" class="nav-link"><?php echo e($toolkit_category_name); ?> </a>
                </div>
            </div>
        </div>
        <hr>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <!--<a href="" class="nav-link" id="behaviour-design" data-bs-toggle="pill" data-bs-target="#behaviour-design1" type="button" role="tab" aria-controls="behaviour-design1" aria-selected="false">-->
    <!--    <div class="">-->
    <!--        <img src="<?php echo e(asset('public/frontend/assets/images/community.png')); ?>" alt=""><span class="showclass"><br>Behaviour Design</span>-->
    <!--    </div>-->
    <!--</a>-->
    <!--<hr>-->
    <!--<a href="" class="nav-link" id="hcd" data-bs-toggle="pill" data-bs-target="#hcd1" type="button" role="tab" aria-controls="hcd1" aria-selected="false">-->
    <!--    <div class="">-->
    <!--        <img src="<?php echo e(asset('public/frontend/assets/images/Cloud.png')); ?>" alt=""><span class="showclass"><br>HCD</span>-->
    <!--    </div>-->
    <!--</a>-->
    <!--<hr>-->
    <!--<a href="" class="nav-link" id="strategic-planning" data-bs-toggle="pill" data-bs-target="#strategic-planning1" type="button" role="tab" aria-controls="strategic-planning1" aria-selected="false">-->
    <!--    <div class="">-->
    <!--        <img src="<?php echo e(asset('public/frontend/assets/images/To-do-list.png')); ?>" alt=""><span class="showclass"><br>Strategic Planning </span>-->
    <!--    </div>-->
    <!--</a>-->
    <!--<hr>-->
    <!--<a href="" class="nav-link" id="networking" data-bs-toggle="pill" data-bs-target="#networking1" type="button" role="tab" aria-controls="networking1" aria-selected="false">-->
    <!--    <div class="">-->
    <!--        <img src="<?php echo e(asset('public/frontend/assets/images/mind.png')); ?>" alt=""><span class="showclass"><br>Networking</span>-->
    <!--    </div>-->
    <!--</a>-->
    <!--<hr>-->

    <div class="showclass mt-3" id="logout-btn">
        <a href="<?php echo e(route('start-learning')); ?>">
            <div class="start-learning-btn text-center">
                LOG OUT
            </div>
        </a>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

<script>
    $(document).ready(function() {
        function toggleClassBasedOnWidth() {

            var logoutBtn = document.getElementById('logout-btn');

            if ($(window).width() > 426) {
                $('.showclass').addClass('show-after');
                $(logoutBtn).hide(); // Hide the logout button
            } else {
                $('.showclass').removeClass('show-after');
                $(logoutBtn).show(); // Show the logout button
            }
        }

        // Initial call on page load
        toggleClassBasedOnWidth();

        // Call on window resize
        $(window).resize(function() {
            toggleClassBasedOnWidth();
        });

        function logoutBtnShow() {

            var logoutBtn = document.getElementById('logout-btn');

            if ($(window).width() > 426) {
                $('.showclass').addClass('show-after');
                $(logoutBtn).hide(); // Hide the logout button
            } else {
                $('.showclass').removeClass('show-after');
                $(logoutBtn).show(); // Show the logout button
            }
        }

        logoutBtnShow();

        // Call on window resize
        $(window).resize(function() {
            logoutBtnShow();
        });

    });
</script>

<!-- <script>
    $(document).ready(function() {
        $('.showclass a').click(function(e) {
            e.preventDefault();
            
            // Remove 'active' class from all elements with class 'active-menu'
            $('.active-menu').removeClass('active');
            
            // Add 'active' class to the closest parent element with class 'active-menu'
            $(this).closest('.active-menu').addClass('active');
        });
    });
</script> -->

<script>
    // var visionBuildingTools = "vision-building-tools";
    // var behaviourDesign = "behaviour-design";
    // var hcd = "hcd";
    // var strategicPlanning = "strategic-planning";
    // var networking = "networking";


    // $(document).ready(function() {
    //     $(".nav button").click(function() {
    //         var buttonId = this.id;
    //         localStorage.setItem("setid", buttonId);
    //     });

    //     var getid = localStorage.getItem("setid");

    //     if (visionBuildingTools == getid) {
    //         // Use jQuery to add the class to the element with ID "nav-home-tab"
    //         $("#vision-building-tools, #vision-building-tools1").addClass("active");
    //         $("#vision-building-tools1").addClass("show");
    //         $("#behaviour-design, #behaviour-design1, #hcd, #hcd1, #strategic-planning, #strategic-planning1, #networking, #networking1").removeClass("active");
    //         $("#behaviour-design1, #hcd1, #strategic-planning1, #networking1").removeClass("show");
    //     }

    //     if (behaviourDesign == getid) {
    //         // Use jQuery to add the class to the element with ID "nav-home-tab"
    //         $("#behaviour-design, #behaviour-design1").addClass("active");
    //         $("#behaviour-design1").addClass("show");
    //         $("#vision-building-tools, #vision-building-tools1, #hcd, #hcd1, #strategic-planning, #strategic-planning1, #networking, #networking1").removeClass("active");
    //         $("#vision-building-tools1, #hcd1, #strategic-planning1, #networking1").removeClass("show");
    //     }

    //     if (hcd == getid) {
    //         // Use jQuery to add the class to the element with ID "nav-home-tab"
    //         $("#hcd, #hcd1").addClass("active");
    //         $("#hcd1").addClass("show");
    //         $("#vision-building-tools, #vision-building-tools1, #behaviour-design, #behaviour-design1, #strategic-planning, #strategic-planning1, #networking, #networking1").removeClass("active");
    //         $("#vision-building-tools1, #behaviour-design1, #strategic-planning1, #networking1").removeClass("show");
    //     }

    //     if (strategicPlanning == getid) {
    //         // Use jQuery to add the class to the element with ID "nav-home-tab"
    //         $("#strategic-planning, #strategic-planning1").addClass("active");
    //         $("#strategic-planning1").addClass("show");
    //         $("#vision-building-tools, #vision-building-tools1, #hcd, #hcd1, #behaviour-design, #behaviour-design1, #networking, #networking1").removeClass("active");
    //         $("#vision-building-tools1, #hcd1, #behaviour-design1, #networking1").removeClass("show");
    //     }

    //     if (networking == getid) {
    //         // Use jQuery to add the class to the element with ID "nav-home-tab"
    //         $("#networking, #networking1").addClass("active");
    //         $("#networking1").addClass("show");
    //         $("#vision-building-tools, #vision-building-tools1, #hcd, #hcd1, #strategic-planning, #strategic-planning1, #behaviour-design, #behaviour-design1").removeClass("active");
    //         $("#vision-building-tools1, #hcd1, #strategic-planning1, #behaviour-design1").removeClass("show");
    //     }
    // });

    // //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
</script><?php /**PATH /home/accessas/public_html/elarning/resources/views/frontend/sidebar-menu.blade.php ENDPATH**/ ?>