
<?php $__env->startSection('title',__('All Movies Request')); ?>
<?php $__env->startSection('breadcum'); ?>
	<div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-8 col-lg-8">
                <h4 class="page-title"><?php echo e(__('All Movies Request')); ?></h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="<?php echo e(url('/admin')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
                      <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('All Movies Request')); ?></li>
                    </ol>
                </div>
            </div>
                   </div>          
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('maincontent'); ?>
<div class="contentbar">
<div class="row">
  
  <div class="col-lg-12">
      <div class="card m-b-50">
          <div class="card-header">
                <h5 class="card-title"> <?php echo e(__("All Movies Request")); ?></h5>
          </div>
          
          <div class="card-body">
           
              <div class="table-responsive">
                <table id="roletable" class="table table-borderd responsive " style="width: 100%">

                    <thead>
                      <th>#</th>
                      <th><?php echo e(__('Name')); ?>..</th>
                      <th><?php echo e(__('Email')); ?></th>
                      <th><?php echo e(__('Movie Name')); ?></th>
                    </thead>
                
                    <tbody>
              <?php if($req): ?>
                <tbody>
                  <?php $__currentLoopData = $req; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                      <td>
                        <?php echo e($key+1); ?>

                      </td>
                      <td><?php echo e($r->name); ?></td>
                      <td><?php echo e($r->email); ?></td>
                      <td><?php echo e($r->mr_name); ?></td>
                    </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
              <?php endif; ?>
                </table>
                <div class="col-md-12 pagination-block text-center">
                    <?php echo $req->appends(request()->query())->links(); ?>

                  </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php $__env->stopSection(); ?> 
<?php $__env->startSection('script'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sayed/Desktop/Next Hour/nexthour/resources/views/admin/moviereqindex.blade.php ENDPATH**/ ?>