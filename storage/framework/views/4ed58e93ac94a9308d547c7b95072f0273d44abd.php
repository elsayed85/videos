
<?php $__env->startSection('title',__('Player Settings')); ?>
<?php $__env->startSection('breadcum'); ?>
	<div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-8 col-lg-8">
                <h4 class="page-title"><?php echo e(__('HOME')); ?></h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="<?php echo e(url('/admin')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
                      <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Player Settings')); ?></li>
                    </ol>
                </div>
            </div>
            <div class="col-md-4 col-lg-4">
              <div class="widgetbar">
                <a href="<?php echo e(url('admin/')); ?>" class="btn btn-primary-rgba mr-2"><i
                  class="feather icon-arrow-left mr-2"></i><?php echo e(__('Back')); ?></a>
              </div>
            </div>
        </div>          
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('maincontent'); ?>
<div class="contentbar">
  <div class="row">
    <?php if($errors->any()): ?>  
  <div class="alert alert-danger" role="alert">
  <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>     
  <p><?php echo e($error); ?><button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true" style="color:red;">&times;</span></button></p>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
  </div>
  <?php endif; ?>
    <div class="col-lg-6">
      <div class="card m-b-50">
        <div class="card-header">
          <h5 class="box-title"><?php echo e(__('Player Settings')); ?></h5>
        </div>
        <div class="card-body ml-2">
          <?php echo Form::model($ps, ['method' => 'POST', 'action' => ['PlayerSettingController@update', $ps->id], 'files' => true]); ?>

            <div class="row">
              <div class="col-md-12">
                <div class="form-group text-dark<?php echo e($errors->has('logo_enable') ? ' has-error' : ''); ?>">
                  <div class="row">
                    <div class="col-md-4">
                      <?php echo Form::label('logo_enable', __('Logo Enable:')); ?>

                    </div>
                    <div class="col-md-5 ">
                      <label class="switch">                
                        <?php echo Form::checkbox('logo_enable', 1, $ps->logo_enable, ['class' => 'custom_toggle', 'id'=>'logo_enable']); ?>

                        <span class="slider round"></span>
                      </label>
                    </div>
                  </div>
                  <div class="col-xs-12">
                    <small class="text-danger"><?php echo e($errors->first('logo_enable')); ?></small>
                  </div>
                </div>

                <div class="col-md-6 " id="logobox" style="<?php echo e($ps->logo != 0 ? ""  : "display:none"); ?>">
                  <div class="logobox form-group text-dark<?php echo e($errors->has('logo') ? ' has-error' : ''); ?> input-file-block">
                   <?php echo Form::label('logo', __('Logo')); ?> - <p class="info"><?php echo e(__('Help Block Text')); ?></p>
                    <?php echo Form::file('logo', ['class' => 'input-file', 'id'=>'logo']); ?>

                    <label for="logo" class="btn btn-danger js-labelFile" data-toggle="tooltip" data-original-title="<?php echo e(__('Logo')); ?>">
                      <i class="icon fa fa-check"></i>
                      <span class="js-fileName"><?php echo e(__('Choose A File')); ?></span>
                    </label>
                    <small class="text-danger"><?php echo e($errors->first('logo')); ?></small>
                  </div>
                </div>

                <div class="form-group text-dark<?php echo e($errors->has('cpy_text') ? ' has-error' : ''); ?>">
                  <?php echo Form::label('cpy_text', __('CopyrightText')); ?>

                  <?php echo Form::text('cpy_text', null, ['class' => 'form-control', 'required' => 'required',]); ?>

                  <small class="text-danger"><?php echo e($errors->first('cpy_text')); ?></small>
                </div>

                <div class="form-group text-dark<?php echo e($errors->has('share_opt') ? ' has-error' : ''); ?>">
                  <div class="row">
                    <div class="col-md-4">
                      <?php echo Form::label('share_opt', __('Share Option:')); ?>

                    </div>
                    <div class="col-md-5 pad-0">
                      <label class="switch">                
                        <?php echo Form::checkbox('share_opt', 1, $ps->share_opt, ['class' => 'custom_toggle']); ?>

                        <span class="slider round"></span>
                      </label>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <small class="text-danger"><?php echo e($errors->first('share_opt')); ?></small>
                  </div>
                </div>
                <div class="form-group text-dark<?php echo e($errors->has('auto_play') ? ' has-error' : ''); ?>">
                  <div class="row">
                    <div class="col-md-4">
                      <?php echo Form::label('auto_play',__('Auto Play:')); ?>

                    </div>
                    <div class="col-md-5 pad-0">
                      <label class="switch">                
                        <?php echo Form::checkbox('auto_play', 1, $ps->auto_play, ['class' => 'custom_toggle']); ?>

                        <span class="slider round"></span>
                      </label>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <small class="text-danger"><?php echo e($errors->first('speed')); ?></small>
                  </div>
                </div>
                 <div class="form-group text-dark<?php echo e($errors->has('speed') ? ' has-error' : ''); ?>">
                  <div class="row">
                    <div class="col-md-4">
                      <?php echo Form::label('speed', __('Speed Options:')); ?>

                    </div>
                    <div class="col-md-5 pad-0">
                      <label class="switch">                
                        <?php echo Form::checkbox('speed', 1, $ps->speed, ['class' => 'custom_toggle']); ?>

                        <span class="slider round"></span>
                      </label>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <small class="text-danger"><?php echo e($errors->first('speed')); ?></small>
                  </div>
                </div>
                 
                  <div class="form-group text-dark<?php echo e($errors->has('info_window') ? ' has-error' : ''); ?>">
                  <div class="row">
                    <div class="col-md-4">
                      <?php echo Form::label('info_window', __('Info-WindowOption:')); ?>

                    </div>
                    <div class="col-xs-5 pad-0">
                      <label class="switch">                
                        <?php echo Form::checkbox('info_window', 1, $ps->info_window, ['class' => 'custom_toggle']); ?>

                        <span class="slider round"></span>
                      </label>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <small class="text-danger"><?php echo e($errors->first('info_window')); ?></small>
                  </div>
                </div>
                <div class="form-group text-dark<?php echo e($errors->has('skin') ? ' has-error' : ''); ?>">
                  <div class="row">
                    <div class="col-md-4">
                      <?php echo Form::label('skin', __('Player Select Skin:')); ?>

                    </div>
                    <div class="col-md-5 pad-0">
                      <select class="select2" name="skin" id="skin">
                        <option value="minimal_skin_dark" <?php echo e(isset($ps->skin) && $ps->skin == 'minimal_skin_dark' ? 'selected' : ''); ?>><?php echo e(__('Minimal Dark')); ?></option>
                         <?php if($ps->skin=='minimal_skin_white'): ?>
                        <option value="minimal_skin_white" selected="true"><?php echo e(__('Minimal White')); ?></option>
                        <?php else: ?>
                          <option value="minimal_skin_white"><?php echo e(__('Minimal White')); ?></option>
                        <?php endif; ?>
                         <?php if($ps->skin=='classic_skin_dark'): ?>
                       <option value="classic_skin_dark" selected="true"><?php echo e(__('Classic Dark')); ?></option>
                        <?php else: ?>
                         
                        <option value="classic_skin_dark"><?php echo e(__('Classic Dark')); ?></option>
                        <?php endif; ?>
                         <?php if($ps->skin=='classic_skin_white'): ?>
                        <option value="classic_skin_white" selected="true"><?php echo e(__('Classic White')); ?></option>
                        <?php else: ?>
                         
                        <option value="classic_skin_white"><?php echo e(__('Classic White')); ?></option>
                        <?php endif; ?>
                         <?php if($ps->skin=='modern_skin_dark'): ?>
                        <option value="modern_skin_dark" selected="true"><?php echo e(__('Modern Dark')); ?></option>
                        <?php else: ?>
                         
                         <option value="modern_skin_dark"><?php echo e(__('Modern Dark')); ?></option>
                        <?php endif; ?>
                         <?php if($ps->skin=='modern_skin_white'): ?>
                        <option value="modern_skin_white" selected="true"><?php echo e(__('Modern White')); ?></option>
                        <?php else: ?>
                         
                         <option value="modern_skin_white" ><?php echo e(__('Modern White')); ?></option>
                        <?php endif; ?>
                       
                      </select>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <small class="text-danger"><?php echo e($errors->first('skin')); ?></small>
                  </div>
                </div>
                <div class="form-group text-dark<?php echo e($errors->has('loop_video') ? ' has-error' : ''); ?>">
                  <div class="row">
                    <div class="col-md-4">
                      <?php echo Form::label('loop_video', __('Loop-VideoOption:')); ?>

                    </div>
                    <div class="col-md-5 pad-0">
                      <label class="switch">                
                        <?php echo Form::checkbox('loop_video', 1, $ps->loop_video, ['class' => 'custom_toggle']); ?>

                        <span class="slider round"></span>
                      </label>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <small class="text-danger"><?php echo e($errors->first('loop_video')); ?></small>
                  </div>
                </div>
                <div class="form-group text-dark<?php echo e($errors->has('chromecast') ? ' has-error' : ''); ?>">
                  <div class="row">
                    <div class="col-md-4">
                      <?php echo Form::label('chromecast', __('Chrome Cast:')); ?>

                    </div>
                    <div class="col-md-5 pad-0">
                      <label class="switch">                
                        <?php echo Form::checkbox('chromecast', 1, $ps->chromecast, ['class' => 'custom_toggle']); ?>

                        <span class="slider round"></span>
                      </label>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <small class="text-danger"><?php echo e($errors->first('chromecast')); ?></small>
                  </div>
                </div>
                 <div class="form-group<?php echo e($errors->has('is_resume') ? ' has-error' : ''); ?>">
                  <div class="row">
                    <div class="col-md-4">
                      <?php echo Form::label('is_resume', __('Resume/Playback Option:')); ?>

                    </div>
                    <div class="col-md-5 pad-0">
                      <label class="switch">                
                        <?php echo Form::checkbox('is_resume', 1, $ps->is_resume, ['class' => 'custom_toggle']); ?>

                        <span class="slider round"></span>
                      </label>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <small class="text-danger"><?php echo e($errors->first('is_resume')); ?></small>
                  </div>
                </div>
                <div class="form-group text-dark<?php echo e($errors->has('player_google_analytics_id') ? ' has-error' : ''); ?>">
                  <?php echo Form::label('player_google_analytics_id', __('Google Analytics Id')); ?>

                  <?php echo Form::text('player_google_analytics_id', null,['class' => 'form-control']); ?>

                  <small class="text-danger"><?php echo e($errors->first('player_google_analytics_id')); ?></small>
                </div>
                  
                <div class="form-group text-dark<?php echo e($errors->has('subtitle_font_size') ? ' has-error' : ''); ?>">
                  <?php echo Form::label('subtitle_font_size', __('Subtitle Font Size')); ?>

                  <?php echo Form::number('subtitle_font_size', null, ['class' => 'form-control','max'=>'100','min'=>'2']); ?>

                  <small class="text-danger"><?php echo e($errors->first('subtitle_font_size')); ?></small>
                </div>
    
                <div class="form-group text-dark<?php echo e($errors->has('subtitle_color') ? ' has-error' : ''); ?>">
                  <?php echo Form::label('subtitle_color',__('Subtitle Color')); ?>

                  <?php echo Form::color('subtitle_color', null, ['class' => 'form-control',]); ?>

                  
                  <small class="text-danger"><?php echo e($errors->first('subtitle_color')); ?></small>
                </div>

              </div>
              
              
                <div class="form-group">
                  <button type="submit" class="btn btn-primary-rgba"><i class="fa fa-check-circle"></i>
                    <?php echo e(__('Update')); ?></button>
                </div>
                <?php echo Form::close(); ?>

                <div class="clear-both"></div>
            

      </div>
    </div>
  </div>
</div>
</div>
<?php $__env->stopSection(); ?> 
<?php $__env->startSection('script'); ?>
<script>
  $(function(){
    $('form').on('submit', function(event){
      $('.loading-block').addClass('active');
    });
  });

$('#logo_enable').on('change',function(){
  if($('#logo_enable').is(':checked')){
    //show
    $('#logobox').show();
  }else{
    //hide
     $('#logobox').hide();
  }
});

  
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sayed/Desktop/Next Hour/nexthour/resources/views/admin/player-setting/edit.blade.php ENDPATH**/ ?>