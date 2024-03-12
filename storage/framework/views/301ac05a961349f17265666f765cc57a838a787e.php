<?php echo $__env->make('frontend.include.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<style>
   .module-customer-tab button {
      border-radius: 5px;
      margin-bottom: 10px;
      background-color: white;
   }

   .module-bg-tab {
      /* background-color: rgba(213, 226, 232, 1); */
      border-radius: 5px;
      padding: 10px;
   }
</style>

<!-- banner section starts -->
<section>
   <div class="container pt-5 mt-md-5 mt-0">
      <div class="row py-5">
         <div class="col-sm-12 col-md-8 col-lg-9">
            <div>
               <h1>Customer- Centricity Toolkit</h1>
            </div>
            <div>
               <p class="p-0">Dive into our course and discover a treasure trove of tools that will supercharge your business with customer-focused strategies."</p>
            </div>
         </div>
         <div class="col-sm-12 col-md-4 col-lg-3 text-lg-end text-start">
            <a class="start-learning-btn " href="#module-section">
               Start Learning
            </a>
         </div>
      </div>
   </div>
</section>
<!-- banner section ends -->
<!-- skill you learn section starts -->
<section>
   <div class="container">
      <div class="row">
         <div class="col-12">
            <h3>Skills you’ll learn</h3>
         </div>
      </div>
      <div class="row pt-2 pb-5">
         <div class="col-md-10">
            <div class="conatiner">
               <div class="row">
                  <div class="select-btns">Networking</div>
                  <div class="select-btns">Design Principles</div>
                  <div class="select-btns">User Research</div>
                  <div class="select-btns">Data Analysis</div>
                  <div class="select-btns">Costumer Focus</div>
                  <div class="select-btns">Legal Knowledge</div>
                  <div class="select-btns">Networking</div>
                  <div class="select-btns">Critical Thinking</div>
                  <div class="select-btns">User-centric Design</div>
                  <div class="select-btns">Strategic Planning</div>
                  <div class="select-btns">Effective Communication</div>
               </div>
            </div>
         </div>
         <div class="col-md-2 professor-certificate-section text-md-end text-sm-center pt-lg-0 pt-4">
            <h5 class="">Professional Certificate</h5>
            <div class="pt-3"><img src="<?php echo e(asset('public/frontend/assets/images/clock.png')); ?>" alt="" width="18px">&nbsp; <span>3 Hours</span></div>
            <div class="pt-3"><img src="<?php echo e(asset('public/frontend/assets/images/Laptop.png')); ?>" alt="" width="18px">&nbsp;<span> <b class="h4">100%</b><br> Online</span></div>
         </div>
      </div>
   </div>
</section>
<!-- skill you learn section ends -->
<!-- modules section starts -->
<section class="module-customer" id="module-section">
   <div class="container">
      <div class="row ">
         <div class="col-12 pb-3">
            <h3>Module</h3>
            <p class="p-0">You will receive comprehensive, step-by-step learning with hands-on tool utilization and expert guidance.</p>
         </div>
         <div class="col-12">
                 <?php
                    $index = 1;
                ?>
            <?php $__currentLoopData = $all_toolkit_category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $toolkit_category_name => $toolkit_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="module-customer-tab">
                       <button class="w-100 d-flex collapse-divs" id="myElement<?php echo e($index); ?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo e(strtolower(str_replace(' ', '-', $toolkit_category_name))); ?>" aria-expanded="false" aria-controls="collapse<?php echo e(strtolower(str_replace(' ', '-', $toolkit_category_name))); ?>">
                          <h5><?php echo e($index); ?>. <?php echo e($toolkit_category_name); ?></h5>
                       </button>
                      
                       <div class="module-bg-tab collapse mb-3 module" id="collapse<?php echo e(strtolower(str_replace(' ', '-', $toolkit_category_name))); ?>">
                          <div class="module-tabs-open">
                             <ul class="collapse-menu">
                                <?php $__currentLoopData = $toolkit_category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $toolkits): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li id="<?php echo e($toolkits->toolkit_title_slug); ?>">
                                       <a href="<?php echo e(!empty(Session::get('member_id')) ? url('customer').'/'.$toolkits->toolkit_category_slug.'/'.$toolkits->toolkit_title_slug : route('login')); ?>">
                                            <?php echo e($toolkits->toolkit_title); ?>

                                        </a>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                             </ul>
                          </div>
                       </div>
                      
                    </div>
                    <?php
                        $index++;
                    ?>
                
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <!--<div class="module-customer-tab">-->
            <!--   <button class="w-100 d-flex collapse-divs" id="myElement2" type="button" data-bs-toggle="collapse" data-bs-target="#collapseBehaviour" aria-expanded="false" aria-controls="collapseBehaviour">-->
            <!--      <h5>2. Behaviour Design</h5>-->
            <!--   </button>-->
            <!--   <div class="module-bg-tab collapse mb-3 module" id="collapseBehaviour">-->
            <!--      <div class="module-tabs-open">-->
            <!--         <ul class="collapse-menu">-->
            <!--            <li id="nudge"><a href="<?php echo e(route('start-learning')); ?>">NUDGE</a></li>-->
            <!--            <li id="switch-framework"><a href="<?php echo e(route('start-learning')); ?>">SWITCH Framework</a></li>-->
            <!--            <li id="hook-model"><a href="<?php echo e(route('start-learning')); ?>">Hook Model</a></li>-->
            <!--            <li id="gamification"><a href="<?php echo e(route('start-learning')); ?>">Gamification Board</a></li>-->
            <!--         </ul>-->
            <!--      </div>-->
            <!--   </div>-->
            <!--</div>-->
            <!--<div class="module-customer-tab">-->
            <!--   <button class="w-100 d-flex collapse-divs" id="myElement3" type="button" data-bs-toggle="collapse" data-bs-target="#collapseHuman" aria-expanded="false" aria-controls="collapseHuman">-->
            <!--      <h5>3. Human - Centered Design: Foundation</h5>-->
            <!--   </button>-->
            <!--   <div class="module-bg-tab collapse mb-3 module" id="collapseHuman">-->
            <!--      <div class="module-tabs-open">-->
            <!--         <ul class="collapse-menu">-->
            <!--            <li id="problem-tree"><a href="<?php echo e(route('start-learning')); ?>">Problem Tree + 5WHYs</a></li>-->
            <!--            <li id="stakeholder"><a href="<?php echo e(route('start-learning')); ?>">Stakeholder Meeting</a></li>-->
            <!--         </ul>-->
            <!--      </div>-->
            <!--   </div>-->
            <!--</div>-->
            <!--<div class="module-customer-tab">-->
            <!--   <button class="w-100 d-flex collapse-divs" id="myElement4" type="button" data-bs-toggle="collapse" data-bs-target="#collapseDiscovery" aria-expanded="false" aria-controls="collapseDiscovery">-->
            <!--      <h5>4. Human - Centered Design: Discovery</h5>-->
            <!--   </button>-->
            <!--   <div class="module-bg-tab collapse mb-3 module" id="collapseDiscovery">-->
            <!--      <div class="module-tabs-open">-->
            <!--         <ul class="collapse-menu">-->
            <!--            <li id="research-plan"><a href="<?php echo e(route('start-learning')); ?>">Research Plan</a></li>-->
            <!--            <li id="secondary-research"><a href="<?php echo e(route('start-learning')); ?>">Secondary Research</a></li>-->
            <!--            <li id="user-interviews"><a href="<?php echo e(route('start-learning')); ?>">User Interviews</a></li>-->
            <!--            <li id="expert-interviews"><a href="<?php echo e(route('start-learning')); ?>">Expert Interview</a></li>-->
            <!--            <li id="surveys"><a href="<?php echo e(route('start-learning')); ?>">Surveys</a></li>-->
            <!--            <li id="timeline"><a href="<?php echo e(route('start-learning')); ?>">Timeline</a></li>-->
            <!--            <li id="service-safari-and-shadowing"><a href="<?php echo e(route('start-learning')); ?>">Service Safari and shadowing</a></li>-->
            <!--            <li id="focus-group-discussions"><a href="<?php echo e(route('start-learning')); ?>">Focus group discussions</a></li>-->
            <!--            <li id="observational-research"><a href="<?php echo e(route('start-learning')); ?>">Observational research</a></li>-->
            <!--         </ul>-->
            <!--      </div>-->
            <!--   </div>-->
            <!--</div>-->
            <!--<div class="module-customer-tab">-->
            <!--   <button class="w-100 d-flex collapse-divs" id="myElement5" type="button" data-bs-toggle="collapse" data-bs-target="#collapseAnalysis" aria-expanded="false" aria-controls="collapseAnalysis">-->
            <!--      <h5>5. Human - Centered Design: Analysis</h5>-->
            <!--   </button>-->
            <!--   <div class="module-bg-tab collapse mb-3 module" id="collapseAnalysis">-->
            <!--      <div class="module-tabs-open">-->
            <!--         <ul class="collapse-menu">-->
            <!--            <li id="affinity-mapping"><a href="<?php echo e(route('start-learning')); ?>">Affinity Mapping</a></li>-->
            <!--            <li id="eraf-diagram"><a href="<?php echo e(route('start-learning')); ?>">ERAF Diagram</a></li>-->
            <!--            <li id="insights-and-opportunities"><a href="<?php echo e(route('start-learning')); ?>">Insights and Opportunities</a></li>-->
            <!--            <li id="persona"><a href="<?php echo e(route('start-learning')); ?>">Persona</a></li>-->
            <!--            <li id="journey-map"><a href="<?php echo e(route('start-learning')); ?>">Journey Map</a></li>-->
            <!--            <li id="attribute-scale"><a href="<?php echo e(route('start-learning')); ?>">Attribute scale</a></li>-->
            <!--            <li id="design-principles"><a href="<?php echo e(route('start-learning')); ?>">Design Principles</a></li>-->
            <!--            <li id="value-proposition-canvas"><a href="<?php echo e(route('start-learning')); ?>">Value Proposition Canvas</a></li>-->
            <!--         </ul>-->
            <!--      </div>-->
            <!--   </div>-->
            <!--</div>-->
            <!--<div class="module-customer-tab">-->
            <!--   <button class=" w-100 d-flex collapse-divs" id="myElement6" type="button" data-bs-toggle="collapse" data-bs-target="#collapseCentered" aria-expanded="false" aria-controls="collapseCentered">-->
            <!--      <h5>6. Human - Centered Design: Ideation and Prototying</h5>-->
            <!--   </button>-->
            <!--   <div class="module-bg-tab collapse mb-3 module" id="collapseCentered">-->
            <!--      <div class="module-tabs-open">-->
            <!--         <ul class="collapse-menu">-->
            <!--            <li id="design-challenge"><a href="<?php echo e(route('start-learning')); ?>">Design Challenge</a></li>-->
            <!--            <li id="first-idea"><a href="<?php echo e(route('start-learning')); ?>">First Idea + Crazy Idea</a></li>-->
            <!--            <li id="scamper"><a href="<?php echo e(route('start-learning')); ?>">SCAMPER</a></li>-->
            <!--            <li id="what-if"><a href="<?php echo e(route('start-learning')); ?>">What If</a></li>-->
            <!--            <li id="concept-prioritisation"><a href="<?php echo e(route('start-learning')); ?>">Concept Prioritisation</a></li>-->
            <!--            <li id="service-blueprint"><a href="<?php echo e(route('start-learning')); ?>">Service Blueprint</a></li>-->
            <!--         </ul>-->
            <!--      </div>-->
            <!--   </div>-->
            <!--</div>-->
            <!--<div class="module-customer-tab">-->
            <!--   <button class="w-100 d-flex collapse-divs" id="myElement7" type="button" data-bs-toggle="collapse" data-bs-target="#collapseStrategic" aria-expanded="false" aria-controls="collapseStrategic">-->
            <!--      <h5>7. Strategic Planning</h5>-->
            <!--   </button>-->
            <!--   <div class="module-bg-tab collapse mb-3 module" id="collapseStrategic">-->
            <!--      <div class="module-tabs-open">-->
            <!--         <ul class="collapse-menu">-->
            <!--            <li id="activity-plan"><a href="<?php echo e(route('start-learning')); ?>">Activity Plan</a></li>-->
            <!--            <li id="smart-goals"><a href="<?php echo e(route('start-learning')); ?>">Smart Goals</a></li>-->
            <!--         </ul>-->
            <!--      </div>-->
            <!--   </div>-->
            <!--</div>-->
            <!--<div class="module-customer-tab">-->
            <!--   <button class="w-100 d-flex collapse-divs" id="myElement8" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNetworkss" aria-expanded="false" aria-controls="collapseNetworkss">-->
            <!--      <h5>8. Network Building</h5>-->
            <!--   </button>-->
            <!--   <div class="module-bg-tab collapse mb-3 module" id="collapseNetworkss">-->
            <!--      <div class="module-tabs-open">-->
            <!--         <ul class="collapse-menu">-->
            <!--            <li id="mentor-check-in"><a href="<?php echo e(route('start-learning')); ?>">Mentor Check-in</a></li>-->
            <!--            <li id="speed-dating"><a href="<?php echo e(route('start-learning')); ?>">Speed Dating</a></li>-->
            <!--         </ul>-->
            <!--      </div>-->
            <!--   </div>-->
            <!--</div>-->
         </div>
      </div>
   </div>
</section>

<!-- modules section ends -->
<!-- get your certificate section starts -->
<section>
   <div class="container">
      <div class="row p-2 pt-5 pb-5">
         <div class="col-sm-12 col-md-12 col-lg-12 text-center">
            <div>
               <h3>What will you gain from this course?</h3>
            </div>
            <div>
               <p>Take the leap towards success. Develop proficiency in research, persona creation, journey mapping, and value proposition to elevate customer satisfaction and supercharge your growth.</p>
            </div>
         </div>
         <div class="col-sm-12 col-md-12 col-lg-12 text-center pt-5">
            <button class="start-learning-btn  hover-btn">Get Your Certificate Now!</button>
         </div>
      </div>
   </div>
</section>

<script>
   for (let i = 1; i <= 8; i++) {
      let element = document.getElementById('myElement' + i);
      if (element) {
         element.addEventListener('click', function() {
            this.classList.toggle('module');
         });
      }
   }
</script>
<script>
localStorage.clear();

</script>

<!-- <script>
   $(document).ready(function() {
      $("#v-pills-home1-tab").click(function() {
         // Save the current scroll position in localStorage
         localStorage.setItem('setItem', $(window).scrollTop());
         // Redirect to the target page
         window.location.href = "<?php echo e(route('start-learning')); ?>";
      });
   });
</script> -->

<!-- get your certificate section ends -->
<?php echo $__env->make('frontend.include.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/accessas/public_html/elarning/resources/views/frontend/customer.blade.php ENDPATH**/ ?>