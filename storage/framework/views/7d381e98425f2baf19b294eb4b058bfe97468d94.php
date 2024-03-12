<table class="table table-striped custom-table table-nowrap mb-0">
    <thead>
        <tr>
            <th>Employee</th>
            <?php $__currentLoopData = range(1, 31); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $day): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <th><?php echo e($day); ?></th>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tr>
    </thead>
    <tbody>
        <?php echo $htmlTableData; ?>

    </tbody>
</table><?php /**PATH /home/accessas/public_html/hrms/resources/views/exports/html_table.blade.php ENDPATH**/ ?>