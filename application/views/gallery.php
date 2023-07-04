<!-- /.End of navbar -->
        <section class="hero_single">
            <div class="container d-flex justify-content-between align-items-end">
                <h1 class="h3 mb-0"><?php echo display('gallery') ?></h1>
            </div>
        </section>
        <!-- /.End of page header -->
        <div class="section-gallery">
            <div class="container-fluid p-0">
                <div class="filters my-5 px-3 text-center">
                    <label class="font-weight-600 text-dark mr-3"><input type="radio" name="filter" value="*" checked="checked"> <?php echo display('show_all') ?></label>
                    <?php foreach($gallery_type as $gtype){
						$classname = str_replace(' ', '_', $gtype->title);
						 ?>
                    <label class="font-weight-600 text-dark mr-3"><input type="radio" name="filter" value=".<?php echo strtolower($classname);?>"> <?php echo html_escape($gtype->title);?></label>
               <?php } ?>
                </div>
                <div class="grid row">
                    <div class="grid-sizer <?php echo html_escape($gallery_type[0]->title);?>" data-category="transition"></div>
                    <?php $i=0;
					foreach($galleries as $gallery){ 
					$i++;
					$class = str_replace(' ', '_', $gallery->title);
					if($i%3==1){
						$full="grid-item--width2";
						}
					
					else{
						$full="";
						}
					?>
                    <div class="grid-item <?php echo html_escape($full);?> <?php echo strtolower($class);?>" data-category="transition">
                        <a href="<?php echo html_escape(base_url().(!empty($gallery->image)?$gallery->image:'assets/img/Gallery-page/1st_twin_room.png'));?>" class="d-block position-relative" data-fancybox="images" data-caption="<?php echo html_escape($gallery->title);?>">
                            <img src="<?php echo html_escape(base_url().(!empty($gallery->image)?$gallery->image:'assets/img/Gallery-page/1st_twin_room.png'));?>" alt="" class="img-fluid">
                            <div class="gallery-info text-center position-absolute top-0 left-0 h-100 w-100">
                                <div class="moreinfo h-100 w-100 position-relative d-flex align-items-center justify-content-center">
                                    <div class="user-name text-white font-weight-500"><?php echo html_escape($gallery->title);?></div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <?php } ?>
                    <!-- /.End of gallery item -->
                    
                </div>
            </div>
        </div>
        <!-- /.End of gallery -->