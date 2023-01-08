
<?php
  $auth = Auth::user();

  $withlogin= App\Config::findOrFail(1)->withlogin;
  $catlog= App\Config::findOrFail(1)->catlog;
 
?>
<?php $__env->startSection('title',__('Hide For Me').' | '); ?>
<?php $__env->startSection('main-wrapper'); ?>
<section id="main-wrapper" class="main-wrapper user-account-section">
  <div class="container-fluid">
    <div class="row">
        <div class="">
            <?php if(isset($hideData) && count($hideData) > 0): ?>

              <?php $__currentLoopData = $hideData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              
                    <?php if($auth && getSubscription()->getData()->subscribed == true): ?>
                    
                        <?php
                        if (isset($item->type) && $item->type == 'M') {
                        $wishlist_check = \Illuminate\Support\Facades\DB::table('wishlists')->where([
                                                                            ['user_id', '=', $auth->id],
                                                                            ['movie_id', '=', $item->id],
                                                                            ])->first();
                        }

                        if (isset($item->type) && $item->type == 'S') {
                        $wishlist_check = \Illuminate\Support\Facades\DB::table('wishlists')->where([
                                                                            ['user_id', '=', $auth->id],
                                                                            ['season_id', '=', $item->id],
                                                                        ])->first();
                        }
                        ?>
                    <?php endif; ?>
                    
              
                    <?php if(isset($item->type) && $item->type == "M"): ?>
                        <?php if($item->movie->status == 1): ?>
                       
                            <div class="col-lg-2 col-md-3 col-xs-6 col-sm-4">
                                <div class="cus_img">
                                <div class="genre-slide-image home-prime-slider protip progress-movie" data-pt-placement="outside" data-pt-interactive="false" data-pt-title="#prime-next-item-description-block<?php echo e($item->movie->id); ?>">
                                        <a href="<?php echo e(url('movie/detail',$item->movie->slug)); ?>">
                                        <?php if($item->movie->thumbnail != null || $item->movie->thumbnail != ''): ?>
                                            <img data-src="<?php echo e(url('images/movies/thumbnails/'.$item->movie->thumbnail)); ?>" class="img-responsive lazy" alt="genre-image">
                                        <?php else: ?>

                                            <img data-src="<?php echo e(Avatar::create($item->movie->title)->toBase64()); ?>" class="img-responsive lazy" alt="genre-image">
                                        <?php endif; ?>

                                        </a>
                                        <?php if(timecalcuate($auth->id,$item->movie->id,$item->movie->type) != 0): ?>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo e(timecalcuate($auth->id,$item->movie->id,$item->movie->type)); ?>%">
                                            </div>
                                        </div>
                                        <?php endif; ?>
                                        <?php if($item->movie->is_custom_label == 1): ?>
                                            <?php if(isset($item->movie->label_id)): ?>
                                                <span class="badge bg-info"><?php echo e($item->movie->label->name); ?></span>
                                            <?php endif; ?>
                                        <?php else: ?>

                                            <?php if(isset($item->movie->is_upcoming) && $item->movie->is_upcoming == 1): ?>
                                                <?php if($item->movie->upcoming_date != NULL): ?>
                                                <span class="badge bg-success"><?php echo e(date('M jS Y',strtotime($item->movie->upcoming_date))); ?></span>
                                                <?php else: ?>
                                                <span class="badge bg-danger"><?php echo e(__('Coming Soon')); ?></span>
                                                <?php endif; ?>
                                            
                                            <?php endif; ?>
                                        <?php endif; ?>
                                
                                    </div>
                                   
                                    <button type="button" onclick="hideforme('<?php echo e($item->movie->id); ?>','<?php echo e($item->movie->type); ?>')" class="watchhistory_remove"><i class="flaticon-cancel"></i></button>
                                   
                                    <?php if(isset($protip) && $protip == 1): ?>
                                        <div id="prime-next-item-description-block<?php echo e($item->movie->id); ?>" class="prime-description-block">
                                            <div class="prime-description-under-block">
                                            <h5 class="description-heading"><?php echo e($item->movie->title); ?></h5>
                                            
                                            <ul class="description-list">
                                                <li><?php echo e(__('rating')); ?> <?php echo e($item->movie->rating); ?></li>
                                                <li><?php echo e($item->movie->duration); ?> <?php echo e(__('mins')); ?></li>
                                                <li><?php echo e($item->movie->publish_year); ?></li>
                                                <li><?php echo e($item->movie->maturity_rating); ?></li>
                                                <?php if($item->movie->subtitle == 1): ?>
                                                <li>
                                                <?php echo e(__('subtitles')); ?>

                                                </li>
                                                <?php endif; ?>
                                            </ul>
                                            <div class="main-des">
                                                <p><?php echo e($item->movie->detail); ?></p>
                                                <a href="<?php echo e(url('movie/detail',$item->movie->slug)); ?>"><?php echo e(__('read more')); ?></a>
                                            </div>
                                            
                                            <div class="des-btn-block">
                                               
                                                <?php if($auth && getSubscription()->getData()->subscribed == true): ?>
                                                <?php if($item->movie->is_upcoming != 1): ?>
                                                    <?php if(checkInMovie($item->movie) == true): ?>
                                                    <?php if($item->movie->maturity_rating == 'all age' || $age>=str_replace('+', '', $item->movie->maturity_rating)): ?>
                                                        <?php if($item->movie->video_link['iframeurl'] != null): ?>
                                                    
                                                        <a href="<?php echo e(route('watchmovieiframe',$item->movie->id)); ?>"class="btn btn-play iframe"><span class="play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text"><?php echo e(__('play now')); ?></span>
                                                        </a>

                                                        <?php else: ?> 
                                                        <a href="<?php echo e(route('watchmovie',$item->movie->id)); ?>" class="iframe btn btn-play"><span class="play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text"><?php echo e(__('play now')); ?></span></a>
                                                        <?php endif; ?>
                                                    <?php else: ?>
                                                        <a onclick="myage(<?php echo e($age); ?>)" class="btn btn-play"><span class="play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text"><?php echo e(__('play now')); ?></span>
                                                        </a>
                                                    <?php endif; ?>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                                <?php if($item->movie->trailer_url != null || $item->movie->trailer_url != ''): ?>
                                                    <a class="iframe btn btn-default" href="<?php echo e(route('watchTrailer',$item->movie->id)); ?>"><?php echo e(__('watch trailer')); ?></a>
                                                <?php endif; ?>
                                                <?php else: ?>
                                                <?php if($item->movie->trailer_url != null || $item->movie->trailer_url != ''): ?>
                                                    <a class="iframe btn btn-default" href="<?php echo e(route('guestwatchtrailer',$item->movie->id)); ?>"><?php echo e(__('watch trailer')); ?></a>
                                                <?php endif; ?>
                                                <?php endif; ?>
                                            
                                                <?php if($catlog == 0 && getSubscription()->getData()->subscribed == true): ?>
                                                <?php if(isset($wishlist_check->added)): ?>
                                                    <a onclick="addWish(<?php echo e($item->movie->id); ?>,'<?php echo e($item->movie->type); ?>')" class="addwishlistbtn<?php echo e($item->movie->id); ?><?php echo e($item->movie->type); ?> btn-default"><?php echo e($wishlist_check->added == 1 ? __('remove from watch list') : __('add t watch list')); ?></a>
                                                <?php else: ?>
                                                    <a onclick="addWish(<?php echo e($item->movie->id); ?>,'<?php echo e($item->movie->type); ?>')" class="addwishlistbtn<?php echo e($item->movie->id); ?><?php echo e($item->movie->type); ?> btn-default"><?php echo e(__('add to watch list')); ?></a>
                                                <?php endif; ?>
                                                <?php elseif($catlog ==1 && $auth): ?>
                                                <?php if(isset($wishlist_check->added)): ?>
                                                    <a onclick="addWish(<?php echo e($item->movie->id); ?>,'<?php echo e($item->movie->type); ?>')" class="addwishlistbtn<?php echo e($item->movie->id); ?><?php echo e($item->movie->type); ?> btn-default"><?php echo e($wishlist_check->added == 1 ? __('remove from watch list') : __('add to watch list')); ?></a>
                                                <?php else: ?>
                                                    <a onclick="addWish(<?php echo e($item->movie->id); ?>,'<?php echo e($item->movie->type); ?>')" class="addwishlistbtn<?php echo e($item->movie->id); ?><?php echo e($item->movie->type); ?> btn-default"><?php echo e(__('add to watch list')); ?></a>
                                                <?php endif; ?>
                                                <?php endif; ?>
                                            </div>
                                            
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php elseif(isset($item->type) && $item->type == "S"): ?>
                        <?php if($item->season->tvseries->status == 1): ?>
                            <div class="col-lg-2 col-md-3 col-xs-6 col-sm-4">
                                <div class="cus_img">
                                    
                                
                                    <div class="genre-slide-image home-prime-slider protip" data-pt-placement="outside" data-pt-interactive="false" data-pt-title="#prime-next-item-description-block<?php echo e($item->season->id); ?><?php echo e($item->season->type); ?>">
                                        <a href="<?php echo e(url('show/detail',$item->season->season_slug)); ?>">
                                        <?php if($item->season->tvseries->thumbnail != null || $item->season->tvseries->thumbnail != ''): ?>
                                            <img data-src="<?php echo e(url('images/tvseries/thumbnails/'.$item->season->tvseries->thumbnail)); ?>" class="img-responsive lazy" alt="genre-image">
                                        <?php else: ?>

                                            <img data-src="<?php echo e(Avatar::create($item->season->tvseries->title)->toBase64()); ?>" class="img-responsive lazy" alt="genre-image">
                                        <?php endif; ?>
                                        </a>
                                        <?php if($item->season->tvseries->is_custom_label == 1): ?>
                                        <?php if(isset($item->season->tvseries->label_id)): ?>
                                            <span class="badge bg-info"><?php echo e($item->season->tvseries->label->name); ?></span>
                                        <?php endif; ?>
                                        <?php endif; ?>
                                    

                                    </div>
                                    <?php echo Form::open(['method' => 'POST', 'action' => ['HideForMeController@store', $item->season->id]]); ?>

                                     
                                        <button type="submit" class="watchhistory_remove"><i class="flaticon-cancel"></i></button><br/>
                                    <?php echo Form::close(); ?>

                                    <?php if(isset($protip) && $protip == 1): ?>
                                        <div id="prime-next-item-description-block<?php echo e($item->season->id); ?><?php echo e($item->season->type); ?>" class="prime-description-block">
                                            <h5 class="description-heading"><?php echo e($item->season->tvseries->title); ?></h5>
                                            <div class="movie-rating"><?php echo e(__('tmdb rating')); ?> <?php echo e($item->season->tvseries->rating); ?></div>
                                            <ul class="description-list">
                                            <li><?php echo e(__('season')); ?><?php echo e($item->season->season_no); ?></li>
                                            <li><?php echo e($item->season->publish_year); ?></li>
                                            <li><?php echo e($item->season->tvseries->age_req); ?></li>
                                            <?php if($item->season->subtitle == 1): ?>
                                                <li>
                                                <?php echo e(__('sub titles')); ?>

                                                </li>
                                            <?php endif; ?>
                                            </ul>
                                            <div class="main-des">
                                            <?php if($item->season->detail != null || $item->season->detail != ''): ?>
                                                <p><?php echo e($item->season->detail); ?></p>
                                            <?php else: ?>
                                                <p><?php echo e($item->season->tvseries->detail); ?></p>
                                            <?php endif; ?>
                                            <a href="#"></a>
                                            </div>
                                            
                                            <div class="des-btn-block">
                                            <?php if($auth && getSubscription()->getData()->subscribed == true): ?>
                                                <?php if(isset($item->season->episodes[0]) && checkInTvseries($item->season->tvseries) == true): ?>
                                                <?php if($item->season->tvseries['age_req'] == 'all age' || $age>=str_replace('+', '', $item->season->tvseries['age_req'])): ?>
                                                    <?php if($item->season->episodes[0]->video_link['iframeurl'] !=""): ?>
                                                    <a href="#" onclick="playoniframe('<?php echo e($item->season->episodes[0]->video_link['iframeurl']); ?>','<?php echo e($item->season->tvseries->id); ?>','tv')" class="btn btn-play"><span class="play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text"><?php echo e(__('playnow')); ?></span>
                                                    </a>

                                                    <?php else: ?>
                                                    <a href="<?php echo e(route('watchTvShow',$item->season->id)); ?>" class="iframe btn btn-play"><span class="play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text"><?php echo e(__('playnow')); ?></span></a>
                                                    <?php endif; ?>
                                                <?php else: ?>
                                                    <a onclick="myage(<?php echo e($age); ?>)" class="btn btn-play"><span class="play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text"><?php echo e(__('playnow')); ?></span>
                                                    </a>
                                                <?php endif; ?>
                                                <?php endif; ?>
                                                <?php if($item->season->trailer_url != null || $item->season->trailer_url != ''): ?>
                                                <a href="<?php echo e(route('watchtvTrailer',$item->season->id)); ?>" class="iframe btn btn-default"><?php echo e(__('watch trailer')); ?></a>
                                                <?php endif; ?>
                                            <?php else: ?>
                                                <?php if($item->season->trailer_url != null || $item->season->trailer_url != ''): ?>
                                                <a href="<?php echo e(route('guestwatchtvtrailer',$item->season->id)); ?>" class="iframe btn btn-default"><?php echo e(__('watch trailer')); ?></a>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                            <?php if($catlog ==0 && getSubscription()->getData()->subscribed == true): ?>
                                                <?php if(isset($wishlist_check->added)): ?>
                                                <a onclick="addWish(<?php echo e($item->season->id); ?>,'<?php echo e($item->season->type); ?>')" class="addwishlistbtn<?php echo e($item->season->id); ?><?php echo e($item->season->type); ?> btn-default"><?php echo e($wishlist_check->added == 1 ? __('remove from watchlist') : __('add to watchlist')); ?></a>
                                                <?php else: ?>
                                                <a onclick="addWish(<?php echo e($item->season->id); ?>,'<?php echo e($item->season->type); ?>')" class="addwishlistbtn<?php echo e($item->season->id); ?><?php echo e($item->season->type); ?> btn-default"><?php echo e(__('add to watchlist')); ?>

                                                </a>
                                                <?php endif; ?>
                                            <?php elseif($catlog ==1 && $auth): ?>
                                                <?php if(isset($wishlist_check->added)): ?>
                                                <a onclick="addWish(<?php echo e($item->season->id); ?>,'<?php echo e($item->season->type); ?>')" class="addwishlistbtn<?php echo e($item->season->id); ?><?php echo e($item->season->type); ?> btn-default"><?php echo e($wishlist_check->added == 1 ? __('remove from watchlist') : __('add to watchlist')); ?></a>
                                                <?php else: ?>
                                                <a onclick="addWish(<?php echo e($item->season->id); ?>,'<?php echo e($item->season->type); ?>')" class="addwishlistbtn<?php echo e($item->season->id); ?><?php echo e($item->season->type); ?> btn-default"><?php echo e(__('add to watchlist')); ?>

                                                </a>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <?php else: ?>
            <div class="search-box">
                <h5 class="movie-series-heading text-center"><?php echo e(__('You have no hidden videos')); ?> </h5>
                <p class="text-center"><?php echo e(__("After hiding a video, it appears here. These are videos that you've indicated aren't your cup of tea, are inappropriate. However, they will still show up in search results. Each profile has its own set of options. Switch to a different profile to browse and manage videos watched with that profile.")); ?></p>
             
              </div>
            <?php endif; ?>
            
        </div>
    </div>
  </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.theme', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sayed/Desktop/Next Hour/nexthour/resources/views/user/hidedata.blade.php ENDPATH**/ ?>