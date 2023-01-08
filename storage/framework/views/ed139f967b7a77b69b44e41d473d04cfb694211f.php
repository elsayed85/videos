
<?php $__env->startSection('title', __('App Settings')); ?>
<?php $__env->startSection('breadcum'); ?>
<div class="breadcrumbbar">
  <div class="row align-items-center">
      <div class="col-md-8 col-lg-8">
          <h4 class="page-title"><?php echo e(__('App Settings')); ?></h4>
          <div class="breadcrumb-list">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(url('/admin')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('App Settings')); ?></li>
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
      <div class="card m-b-30">
        <div class="card-header">
          <h5 class="box-title"><?php echo e(__('App Settings')); ?></h5>
        </div>
        <div>
        <div class="card-body ml-2 app-settings-page">
          <form action="<?php echo e(route('apikey.create')); ?>" method="POST">
          <?php echo csrf_field(); ?>
            <div class="col-md-6 col-lg-6 col-xl-12">
              <div class="bg-info-rgba ml-6 mr-6 mb-6">
                <div class="card-header text-dark"><h5 class="mb-0 "><i class="feather icon-settings"></i> <?php echo e(__('GENERATE SECRET KEY FOR API')); ?></h5></div>
                  <div class="payment-gateway-block">
                    <div class="row mx-2 my-4 pb-3">
                      <div class="col-md-6">
                        <div class="form-group text-dark<?php echo e($errors->has('generate_apikey') ? ' has-error' : ''); ?>">
                          <?php echo Form::label('generate_apikey',__('Client Secret KEY')); ?>

                          <?php echo Form::text('generate_apikey', $appconfig->generate_apikey, ['class' => 'form-control']); ?>

                          <small class="text-danger"><?php echo e($errors->first('generate_apikey')); ?></small>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="search form-group text-dark<?php echo e($errors->has('purchase_code') ? ' has-error' : ''); ?>">
                          <?php echo Form::label('purchase_code', __('Purchase Code')); ?>

                          <input type="text" value="<?php echo e(old('purchase_code')); ?>" name="purchase_code" id="purchase_code-field" class="form-control">
                          <small class="text-danger"><?php echo e($errors->first('purchase_code')); ?></small>
                        </div>
                      </div>
                              
                      <div class="col-md-6 col-lg-6 col-xl-12 form-group"> 
                        <button type="reset" class="btn btn-danger-rgba mr-2"><i class="fa fa-ban mr-1"></i><?php echo e(__('Reset')); ?></button>
                        <button type="submit" class="btn btn-primary-rgba" id="send_form"><i class="fa fa-check-circle"></i> <?php echo e($appconfig->generate_apikey != NULL ?  __('RE-GENREATE KEY') : __('GET YOUR KEY')); ?></button>
                      </div>
                    </div>
                  </div>
              </div>
            </div>
          </form>

          <?php if($appconfig): ?>
          <?php echo Form::model($appconfig, ['method' => 'PATCH', 'action' => ['AppConfigController@update', $appconfig->id], 'files' => true]); ?>

          <div class="col-md-6 col-lg-6 col-xl-12">
            <div class="bg-info-rgba ml-6 mr-6 mb-6">
              <div class="card-header text-dark"><h5 class="mb-0"><i class="feather icon-settings"></i> <?php echo e(__('APP SETTINGS')); ?></h5></div>
              <div class="payment-gateway-block">
                <div class="row mx-2 my-4 pb-3">
                  <div class="col-md-6">
                    <div class="form-group text-dark<?php echo e($errors->has('title') ? ' has-error' : ''); ?>">
                      <?php echo Form::label('title',__('App Title')); ?>

                      <?php echo Form::text('title', null, ['class' => 'form-control']); ?>

                      <small class="text-danger"><?php echo e($errors->first('title')); ?></small>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="row">
                      <div class="col-md-9">
                        <label class="text-dark">Logo :</label>
                        <small>(Note - Size : 300x90)</small>
                        <div class="input-group mb-3">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="inputGroupFile01" name="contact_image"
                                aria-describedby="inputGroupFileAddon01">
                            <label class="custom-file-label" for="inputGroupFile01"><?php echo e(__('Choose file')); ?></label>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-3 pt-4">
                        <div class="image-block card mt-2">
                          <img src="<?php echo e(asset('images/app/logo/' . $appconfig->logo)); ?>" class="img-responsive" alt="">
                        </div>
                      </div>
                    </div>
                  </div>
                    <!-- <div class="form-group text-dark<?php echo e($errors->has('logo') ? ' has-error' : ''); ?> input-file-block">
                      <?php echo Form::label('logo', __('Project Logo')); ?> - <p class="inline info"><?php echo e(__('Size')); ?>: 200x63</p>
                      <?php echo Form::file('logo', ['class' => 'input-file', 'id'=>'logo']); ?>

                      <label for="logo" class="btn btn-danger js-labelFile" data-toggle="tooltip" data-original-title="<?php echo e(__('Project Logo')); ?>">
                      <i class="icon fa fa-check"></i>
                      <span class="js-fileName"><?php echo e(__('Choose A File')); ?></span>
                      </label>
                      <p class="info"><?php echo e(__('Choose A Logo')); ?></p>
                      <small class="text-danger"><?php echo e($errors->first('logo')); ?></small>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="image-block card m-b-30 ">
                      <img src="<?php echo e(asset('images/app/logo/' . $appconfig->logo)); ?>" class="img-responsive" alt="">
                    </div>
                  </div> -->
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-6 col-xl-12">
            <div class="bg-info-rgba ml-6 mr-6 mb-6 ">
              <div class="card-header text-dark"><h5 class="mb-0 "><i class="feather icon-settings"></i> <?php echo e(__('PAYMENT GATEWAY SETTINGS')); ?></h5></div>
              <div class="payment-gateway-block">
                <div class="row my-4 pb-3">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <div class="row mx-2 mt-2 mb-2">
                        <div class="col-md-5 text-dark">
                          <?php echo Form::label('stripe_payment',__('STRIPE PAYMENT')); ?>

                        </div>
                        <div class="col-md-7">
                          <?php if(env('STRIPE_KEY') != NULL && env('STRIPE_SECRET') != NULL): ?>
                            <div class="col-xs-5 text-dark text-right">
                              <label class="switch">
                                <?php echo Form::checkbox('stripe_payment', 1, $appconfig->stripe_payment, ['class' => 'custom_toggle']); ?>

                                <span class="slider round"></span>
                              </label>
                            </div>
                          <?php else: ?>
                              <span class="text-danger"><?php echo e(__('please fill the details properly check out here')); ?><a href="<?php echo e(url('/admin/api-settings/')); ?>"> <?php echo e(__('click here')); ?></a></span>
                          <?php endif; ?>
                        </div>
                      </div>
                    </div>  
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <div class="row mx-2 mt-2 mb-2">
                        <div class="col-md-5 text-dark">
                          <?php echo Form::label('razorpay_payment', __('RAZORPAY PAYMENT')); ?>

                        </div>
                        <div class="col-md-7">
                          <?php if(env('RAZOR_PAY_KEY') != NULL && env('RAZOR_PAY_SECRET') != NULL): ?>
                          <div class="col-xs-5 text-right">
                            <label class="switch">
                              <?php echo Form::checkbox('razorpay_payment', 1, $appconfig->razorpay_payment, ['class' => 'custom_toggle']); ?>

                              <span class="slider round"></span>
                            </label>
                          </div>
                          <?php else: ?>
                          <span class="text-danger"><?php echo e(__('please fill the details properly check out here')); ?><a href="<?php echo e(url('/admin/api-settings/')); ?>"> <?php echo e(__('click here')); ?></a></span>
                          <?php endif; ?>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <div class="row mx-2 my-2">
                        <div class="col-md-5 text-dark">
                          <?php echo Form::label('paypal_payment',__('PAYPAL PAYMENT')); ?>

                        </div>
                        <div class="col-md-7">
                          <?php if(env('PAYPAL_CLIENT_ID') != NULL && env('PAYPAL_SECRET_ID') != NULL && env('PAYPAL_MODE') != NULL ): ?>
                          <div class="col-xs-5 text-dark text-right">
                            <label class="switch">
                              <?php echo Form::checkbox('paypal_payment', 1, $appconfig->paypal_payment, ['class' => 'custom_toggle']); ?>

                              <span class="slider round"></span>
                            </label>
                          </div>
                          <?php else: ?>
                            <span class="text-danger"><?php echo e(__('please fill the details properly check out here')); ?><a href="<?php echo e(url('/admin/api-settings/')); ?>"> <?php echo e(__('click here')); ?></a></span>
                          <?php endif; ?>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <div class="row mx-2 my-2">
                        <div class="col-md-5 text-dark">
                          <?php echo Form::label('inapp_payment',__('IN APP PAYMENT')); ?>

                        </div>
                        <div class="col-md-7">
                          <div class="col-xs-5 text-right">
                            <label class="switch">
                              <?php echo Form::checkbox('inapp_payment', 1, $appconfig->inapp_payment, ['class' => 'custom_toggle']); ?>

                              <span class="slider round"></span>
                            </label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <div class="row mx-2 my-2">
                        <div class="col-md-5 text-dark">
                          <?php echo Form::label('instamojo_payment',__('INSTA MOJO PAYMENT')); ?>

                        </div>
                        <div class="col-md-7">
                          <?php if(env('IM_API_KEY') != NULL && env('IM_AUTH_TOKEN') != NULL && env('IM_URL') != NULL): ?>
                            <div class="col-xs-5 text-dark text-right">
                              <label class="switch">
                                <?php echo Form::checkbox('instamojo_payment', 1, $appconfig->instamojo_payment, ['class' => 'custom_toggle']); ?>

                                <span class="slider round"></span>
                              </label>
                            </div>  
                          <?php else: ?>
                            <span class="text-danger"><?php echo e(__('please fill the details properly check out here')); ?><a href="<?php echo e(url('/admin/api-settings/')); ?>"> <?php echo e(__('click here')); ?></a></span>
                          <?php endif; ?>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <div class="row mx-2 my-2">
                        <div class="col-md-5 text-dark">
                          <?php echo Form::label('bankdetails',__('BANK DETAILS')); ?>

                        </div>
                        <div class="col-md-7">
                          <div class="col-xs-5 text-right">
                            <label class="switch">
                              <?php echo Form::checkbox('bankdetails', 1, $appconfig->bankdetails, ['class' => 'custom_toggle']); ?>

                              <span class="slider round"></span>
                            </label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <div class="row mx-2 my-2">
                        <div class="col-md-5 text-dark">
                          <?php echo Form::label('brainetree_payment',__('BRAIN TREE PAYMENT')); ?>

                        </div>
                        <div class="col-md-7">
                          <?php if(env('BTREE_ENVIRONMENT') != NULL && env('BTREE_MERCHANT_ID') != NULL && env('BTREE_PUBLIC_KEY') != NULL && env('BTREE_PRIVATE_KEY') != NULL && env('BTREE_MERCHANT_ACCOUNT_ID') != NULL): ?>
                            <div class="col-xs-5 text-dark text-right">
                              <label class="switch">
                                <?php echo Form::checkbox('brainetree_payment', 1, $appconfig->brainetree_payment, ['class' => 'custom_toggle']); ?>

                                <span class="slider round"></span>
                              </label>
                            </div>
                          <?php else: ?>
                            <span class="text-danger"><?php echo e(__('please fill the details properly check out here')); ?><a href="<?php echo e(url('/admin/api-settings/')); ?>"> <?php echo e(__('click here')); ?></a></span>
                          <?php endif; ?>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <div class="row mx-2 my-2">
                        <div class="col-md-5 text-dark">
                          <?php echo Form::label('paytm_payment',__('PAYTM PAYMENT')); ?>

                        </div>
                        <div class="col-md-7">
                          <?php if(env('PAYTM_MID') != NULL && env('PAYTM_MERCHANT_KEY') != NULL && env('PAYTM_ENVIRONMENT') != NULL && env('PAYTM_MERCHANT_WEBSITE') != NULL && env('PAYTM_CHANNEL') != NULL): ?>
                            <div class="col-xs-5 text-right">
                              <label class="switch">
                                <?php echo Form::checkbox('paytm_payment', 1, $appconfig->paytm_payment, ['class' => 'custom_toggle']); ?>

                                <span class="slider round"></span>
                              </label>
                            </div>
                            <?php else: ?>
                            <span class="text-danger"><?php echo e(__('please fill the details properly check out here')); ?><a href="<?php echo e(url('/admin/api-settings/')); ?>"> <?php echo e(__('click here')); ?></a></span>
                            <?php endif; ?>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <div class="row mx-2 my-2">
                        <div class="col-md-5 text-dark">
                          <?php echo Form::label('paystack_payment',__('PAYSTACK PAYMENT')); ?>

                        </div>
                        <div class="col-md-7">
                          <?php if(env('PAYSTACK_PUBLIC_KEY') != NULL && env('PAYSTACK_SECRET_KEY') != NULL && env('PAYSTACK_PAYMENT_URL') != NULL): ?>
                          <div class="col-xs-5 text-right">
                            <label class="switch">
                              <?php echo Form::checkbox('paystack_payment', 1, $appconfig->paystack_payment, ['class' => 'custom_toggle']); ?>

                              <span class="slider round"></span>
                            </label>
                          </div>
                          <?php else: ?>
                          <span class="text-danger"><?php echo e(__('please fill the details properly check out here')); ?><a href="<?php echo e(url('/admin/api-settings/')); ?>"> <?php echo e(__('click here')); ?></a></span>
                          <?php endif; ?>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-6 col-xl-12">
            <div class="bg-info-rgba ml-6 mr-6 mb-6">
              <div class="card-header text-dark"><h5 class="mb-0 "><i class="feather icon-settings"></i> <?php echo e(__('SOCIAL LOGIN SETTINGS')); ?></h5></div>
              <div class="payment-gateway-block">
                <div class="row my-4 pb-3">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <div class="row mx-2 mt-2 mb-2">
                        <div class="col-md-5 text-dark">
                          <?php echo Form::label('fb_check',__('Enable Facebook Login')); ?>

                        </div>
                        <div class="col-md-7">
                          <?php if(env('FACEBOOK_CLIENT_ID') != NULL && env('FACEBOOK_CLIENT_SECRET') != NULL && env('FACEBOOK_CALLBACK') != NULL): ?>
                          <div class="col-xs-5 text-right">
                            <label class="switch">
                              <?php echo Form::checkbox('fb_check', 1, $appconfig->fb_login, ['class' => 'custom_toggle']); ?>

                              <span class="slider round"></span>
                            </label>
                          </div>
                          <?php else: ?>
                              <span class="text-danger"><?php echo e(__('please fill the details properly check out here')); ?><a href="<?php echo e(url('/admin/social-login/')); ?>"> <?php echo e(__('click here')); ?></a></span>
                            <?php endif; ?>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <div class="row mx-2 mt-2 mb-2">
                        <div class="col-md-5 text-dark">
                          <?php echo Form::label('google_login',__('Enable Google Login')); ?>

                        </div>
                        <div class="col-md-7">
                          <?php if(env('GOOGLE_CLIENT_ID') != NULL && env('GOOGLE_CLIENT_SECRET') != NULL && env('GOOGLE_CALLBACK') != NULL): ?>
                          <div class="col-xs-5 text-right">
                            <label class="switch">
                              <?php echo Form::checkbox('google_login', 1, $appconfig->google_login, ['class' => 'custom_toggle']); ?>

                              <span class="slider round"></span>
                            </label>
                          </div>
                          <?php else: ?>
                            <span class="text-danger"><?php echo e(__('please fill the details properly check out here')); ?><a href="<?php echo e(url('/admin/social-login/')); ?>"> <?php echo e(__('click here')); ?></a></span>
                          <?php endif; ?>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <div class="row mx-2 my-2">
                        <div class="col-md-5 text-dark">
                          <?php echo Form::label('amazon_login',__('Enable AMAZON Login')); ?>

                        </div>
                        <div class="col-md-7">
                          <?php if(env('AMAZON_LOGIN_ID') != NULL && env('AMAZON_LOGIN_SECRET') != NULL && env('AMAZON_LOGIN_REDIRECT') != NULL): ?>
                          <div class="col-xs-5 text-right">
                            <label class="switch">
                              <?php echo Form::checkbox('amazon_login', 1, $appconfig->amazon_login, ['class' => 'custom_toggle']); ?>

                              <span class="slider round"></span>
                            </label>
                          </div>
                          <?php else: ?>
                            <span class="text-danger"><?php echo e(__('please fill the details properly check out here')); ?><a href="<?php echo e(url('/admin/social-login/')); ?>"> <?php echo e(__('click here')); ?></a></span>
                          <?php endif; ?>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-lg-6 col-xl-12">
            <div class="bg-info-rgba ml-6 mr-6 mb-6">
              <div class="card-header text-dark"><h5 class="mb-0"><i class="feather icon-settings"></i> <?php echo e(__('ADMOB SETTINGS ')); ?></h5></div>
              <div class="payment-gateway-block">
                <div class="row my-4 pb-3">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <div class="row mx-2 mt-2 mb-2">
                        <div class="col-md-5 text-dark">
                          <?php echo Form::label('banner_admob', __('BANNER ADMOB')); ?>

                        </div>
                        <div class="col-md-7">
                          <div class="col-xs-5 text-right">
                            <label class="switch">
                              <?php echo Form::checkbox('banner_admob', 1, $appconfig->banner_admob, ['class' => 'custom_toggle']); ?>

                              <span class="slider round"></span>
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="row mx-2 my-2" style="<?php echo e($appconfig->banner_admob==1 ? "" : "display: none"); ?>" id="banner_box">
                        <div class="col-md-12">
                          <div class="form-group text-dark<?php echo e($errors->has('Banner_id') ? ' has-error' : ''); ?>">
                          <?php echo Form::label('banner_id', __('BANNER ID')); ?>

                          <?php echo Form::text('banner_id', null, ['class' => 'form-control']); ?>

                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <div class="row mx-2 mt-2 mb-2">
                        <div class="col-md-5 text-dark">
                          <?php echo Form::label('interstitial_admob', __('INTERSTITAL ADMOB')); ?>

                        </div>
                        <div class="col-md-7">
                          <div class="col-xs-5 text-right">
                            <label class="switch">
                              <?php echo Form::checkbox('interstitial_admob', 1, $appconfig->interstitial_admob, ['class' => 'custom_toggle']); ?>

                              <span class="slider round"></span>
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="row mx-2 my-2" style="<?php echo e($appconfig->interstitial_admob==1 ? "" : "display: none"); ?>" id="interstitial_box">
                        <div class="col-md-12">
                          <div class="form-group text-dark<?php echo e($errors->has('interstitial_id') ? ' has-error' : ''); ?>">
                            <?php echo Form::label('interstitial_id', __('INTERSTITAL ID')); ?>

                            <?php echo Form::text('interstitial_id', null, ['class' => 'form-control']); ?>

                            <small class="text-danger"><?php echo e($errors->first('interstitial_id')); ?></small>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>


          <div class="col-md-6 col-lg-6 col-xl-12">
            <div class="bg-info-rgba ml-6 mr-6 mb-6">
              <div class="card-header text-dark"><h5 class="mb-0"><i class="feather icon-settings"></i> <?php echo e(__('PUSH NOTIFICATION SETTINGS ')); ?></h5></div>
              <div class="payment-gateway-block">
                <div class="row my-4 pb-3">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <div class="row mx-2 mt-2 mb-2">
                        <div class="col-md-5 text-dark">
                          <?php echo Form::label('push_key', __('Push Notification')); ?>

                        </div>
                        <div class="col-md-7">
                          <div class="col-xs-5 text-right">
                            <label class="switch">
                              <?php echo Form::checkbox('push_key', 1, $appconfig->push_key, ['class' => 'custom_toggle','id'=> 'push_id']); ?>

                              <span class="slider round"></span>
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="row mx-2 my-4" style="<?php echo e($appconfig->push_key == 1 ? "" : "display: none"); ?>" id="push_box">
                        <div class="col-md-12">
                          <div class="form-group text-dark<?php echo e($errors->has('PUSH_AUTH_KEY') ? ' has-error' : ''); ?>">
                            <?php echo Form::label('PUSH_AUTH_KEY', __('PUSH AUTH KEY')); ?>

                            <input type="text" name="PUSH_AUTH_KEY" class="form-control" value="<?php echo e(env('PUSH_AUTH_KEY') ? env('PUSH_AUTH_KEY') : ''); ?>">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-6 col-xl-12">
            <div class="bg-info-rgba ml-6 mr-6 mb-6 ">
              <div class="card-header text-dark"><h5 class="mb-0"><i class="feather icon-settings"></i> <?php echo e(__('OTHER SETTINGS')); ?></h5></div>
              <div class="payment-gateway-block">
                <div class="row my-4 pb-3">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <div class="row mx-2 mt-2 mb-2">
                        <div class="col-md-5 text-dark">
                          <?php echo Form::label('remove_ads',__('Remove Ads')); ?>

                        </div>
                        <div class="col-md-7">
                          <div class="col-xs-5 text-right">
                            <label class="switch">
                              <?php echo Form::checkbox('remove_ads', 1, $appconfig->remove_ads, ['class' => 'custom_toggle']); ?>

                              <span class="slider round"></span>
                            </label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <div class="row mx-2 mt-2 mb-2">
                        <div class="col-md-5 text-dark">
                          <?php echo Form::label('google_login',__('Admob Setting')); ?>

                        </div>
                        <div class="col-md-7">
                          <div class="col-xs-5 text-right">
                            <label class="switch">
                              <?php echo Form::checkbox('is_admob', 1, $appconfig->is_admob, ['class' => 'custom_toggle']); ?>

                              <span class="slider round"></span>
                            </label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-6 col-xl-12 form-group">
            <button type="submit" class="btn btn-primary-rgba"><i class="fa fa-check-circle"></i> <?php echo e(__('Update')); ?></button>
          </div>
          <?php echo Form::close(); ?>

          <div class="clear-both"></div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</div>

  

<?php $__env->stopSection(); ?> 
<?php $__env->startSection('script'); ?>
<script type="text/javascript">
  $('#banner_admob').on('change',function(){
      if ($('#banner_admob').is(':checked')){
           $('#banner_box').show('fast');
        }else{
          $('#banner_box').hide('fast');
        }
    });  

  $('#interstitial_admob').on('change',function(){
    if ($('#interstitial_admob').is(':checked')){
         $('#interstitial_box').show('fast');
      }else{
        $('#interstitial_box').hide('fast');
      }
  });  

  $('#rewarded_admob').on('change',function(){
      if ($('#rewarded_admob').is(':checked')){
           $('#rewarded_box').show('fast');
        }else{
          $('#rewarded_box').hide('fast');
        }
    }); 
  $('#native_admob').on('change',function(){
      if ($('#native_admob').is(':checked')){
           $('#native_box').show('fast');
        }else{
          $('#native_box').hide('fast');
        }
    }); 
  $('#push_id').on('change',function(){
      if ($('#push_id').is(':checked')){
           $('#push_box').show('fast');
        }else{
          $('#push_box').hide('fast');
        }
    }); 

  $(".toggle-password").click(function() {

    $(this).toggleClass("fa-eye fa-eye-slash");
    var input = $($(this).attr("toggle"));
    if (input.attr("type") == "password") {
      input.attr("type", "text");
    } else {
      input.attr("type", "password");
    }
  });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sayed/Desktop/Next Hour/nexthour/resources/views/admin/appconfig/appsettings.blade.php ENDPATH**/ ?>