
<?php
  $user = Auth::user();
  
?>
<?php $__env->startSection('title',__('Wallet')); ?>
<?php $__env->startSection('main-wrapper'); ?>
<section id="main-wrapper" class="main-wrapper user-account-section wallet-block">
  <div class="container-fluid">
    <div class="row">

      <div class="col-xl-9 col-lg-12 col-sm-12">

        <div class="bg-white2 " style="color:white">
         
          <div class="container">
            <h5 class="user_m2"><?php echo e(__('My Wallet')); ?></h5>
          
          
            <div class="card">
              <div class="card-header brd-btm">
                <div class="wallet-img">
                  <img src="<?php echo e(url('/images/wallet.png')); ?>" class="img-fluid" alt="">
                </div>
                <div class="paytm-block">
                 <?php echo e(env('APP_NAME')); ?> <?php echo e(__('Wallet')); ?>

                  <span>
                    <i class="<?php echo e($currency_symbol); ?>"></i>  
                    <?php if(isset($user->wallet)): ?>
                      <?php echo e($user->wallet->balance); ?> 
                    <?php else: ?> 
                      0 
                    <?php endif; ?> 
                  </span>
                </div>
              </div>
              <div class="card-body">
                <form id="mainform" action="<?php echo e(route('wallet.choose.paymethod')); ?>" method="POST">
                  <?php echo csrf_field(); ?>
                  <div class="add-money-block">
                    <h6 class="add-money-heading"><?php echo e(__('Add Money To Wallet')); ?></h6>
                    <div class="input-group">
                      <i class="<?php echo e($currency_symbol); ?>"></i>
                      <input type="number" class="form-control" placeholder="Enter Amount" name="amount" value="1.00"
                      placeholder="0.00" min="1" step="0.01" aria-describedby="basic-addon1">
                      <div class="add-money-btn">
                        <button type="submit" class="btn btn-default"><?php echo e(__('Add Money to wallet')); ?></button>  
                      </div>
                    </div>
                    <p class="text-muted">
                      <i class="fa fa-lock"></i> <?php echo e(__('Once the money is added in wallet its non refundable.')); ?>

                    </p>
                    <p class="text-muted">
                      <i class="fa fa-star"></i> <?php echo e(__('You can use this money to purchase product on this portal.')); ?>

                    </p>
                    <p class="text-muted">
                      <i class="fa fa-info-circle"></i> <?php echo e(__('Money will expire after 1 year from credited date.')); ?>

                    </p>
                    <p class="text-muted">
                      <i class="fa fa-info-circle"></i> <?php echo e(__(' Wallet amount will always added in default currency which is: ')); ?>  <b><?php echo e($currency_code); ?></b>
                    </p>
                  </div>
                </form>
                <?php if(isset($wallethistory) && count($wallethistory) > 0): ?>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th scope="col"><?php echo e(__('Transactions')); ?></th>
                          <th scope="col"><?php echo e(__('Amount')); ?></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $__currentLoopData = $wallethistory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $wallet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                          <td>
                            <div class="trasaction-img">
                              <img src="<?php echo e(url('/images/wallet.png')); ?>" class="img-fluid" alt="">
                            </div>
                            <div class="trasaction-dtl">
                              <h6><?php echo e($wallet->log); ?></h6>
                              <div class="date-time">
                                <?php echo e(date('d M Y, h:i A', strtotime($wallet->created_at))); ?>

                              
                              </div>
                              <ul>
                                
                                <li><span><?php echo e(__('Transaction ID')); ?> : </span><?php echo e($wallet->txn_id); ?></li>
                                <?php if($wallet->type == 'Credit' || $wallet->type == 'credit'): ?>
                                  <li class="date-time"><span><?php echo e(__('Expire ON')); ?> : </span><?php echo e(date('d M Y, h:i A', strtotime($wallet->expire_at))); ?></li>
                                <?php endif; ?>
                              </ul>
                            </div>
                          </td>
                          <td>
                            <?php if($wallet->type == 'Credit' || $wallet->type == 'credit'): ?>
                              <span class='text-green'><b> + <i class="<?php echo e($currency_symbol); ?>"></i> <?php echo e($wallet->amount); ?> </b>
                            <?php else: ?>
                              <span class='text-red'><b> - <i class="<?php echo e($currency_symbol); ?>"></i> <?php echo e($wallet->amount); ?> </b>
                            <?php endif; ?>
                          </td>
                          
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
                      </tbody>
                    </table>
                  </div>
                <?php endif; ?>
              </div>
            </div>
          </div>

        </div>
      </div>


    </div>

  </div>
</section>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.theme', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sayed/Desktop/Next Hour/nexthour/resources/views/user/wallet.blade.php ENDPATH**/ ?>