
		<!--************************************
				Home Slider Start
		*************************************-->
		<h3 class="text-left">Recent Blogs</h3>
		<div id="tg-homeslider" class="tg-homeslider tg-btnslider tg-haslayout">
			<?php foreach ($recentBlogs as $row): ?>
			<div class="item">
				<article class="tg-post tg-postcononimg">
					<figure class="tg-postimg">
						<a href="javascript:void(0);"><img src="<?php echo base_url(); ?>upload/<?php echo $row->image; ?>" alt="image description"></a>
						<figcaption>
							<div class="tg-postcontent">
							</div>
							<div class="tg-postbtnbox">
								<a class="tg-btn" href="<?php echo base_url(); ?>home/view/<?= $row->url; ?>">View Post</a>
							</div>
						</figcaption>
					</figure>
				</article>
				<h3><a href="javascript:void(0);"><?php echo $row->title;?></a></h3>
			</div>
			<?php endforeach; ?>
		</div>
		<!--************************************
				Home Slider End
		*************************************-->
		<!--************************************
				Main Start
		*************************************-->
	