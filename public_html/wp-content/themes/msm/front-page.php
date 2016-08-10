<?php get_header(); ?>
<?php if(have_posts()): while(have_posts()): the_post(); ?>
<section class="main-bg">
	<div class="video_contain">
		<video autoplay loop id="bgvid">
			<source src="<?php echo get_template_directory_uri(); ?>/videos/laundry.webm" type="video/webm">
			<source src="<?php echo get_template_directory_uri(); ?>/videos/laundry.mp4" type="video/mp4">
		</video>
	</div>
	<div class="container">
		<?php the_content(); ?>
	</div>
	<span class="arrow">
		<i class="fa fa-chevron-down"></i>
	</span>
</section>
<?php if(function_exists(get_field)): if(have_rows('content')): while(have_rows('content')): the_row(); if(get_row_layout() == "three_boxes"): ?>
<section class="three_boxes">
	<div class="container content">
		<?php the_sub_field('content_area_1'); ?>
		<?php if(have_rows('boxes')): ?>
		<div class="cf">
			<?php while(have_rows('boxes')): the_row(); ?>
			<div class="box">
				<span><?php the_sub_field('text'); ?></span>
			</div>
			<?php endwhile; ?>
		</div>
		<?php endif; ?>
		<?php the_sub_field('content_area_2'); ?>
	</div>
</section>
<?php elseif(get_row_layout() == "icons_heading"): ?>
<section class="icons">
	<div class="container content">
		<p><strong><?php the_sub_field('heading'); ?></strong></p>
		<?php if(have_rows('icons')): ?>
		<div class="cf">
			<?php while(have_rows('icons')): the_row(); ?>
			<div class="icon">
				<?php $image = get_sub_field('image'); if($image): ?>
				<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>"><br>
				<?php endif; ?>
				<?php the_sub_field('text'); ?>
			</div>
			<?php endwhile; ?>
		</div>
		<?php endif; ?>
	</div>
</section>
<?php elseif(get_row_layout() == "basic_content"): ?>
<section class="basic_content">
	<div class="container content">
		<?php the_sub_field('content'); ?>
	</div>
</section>
<?php endif; endwhile; endif; endif; ?>
<section class="call-today">
	<div class="container">
		<p><i class="fa fa-phone fa-rotate-90"></i>Give us a call today!</p>
		<p><strong><?php if(function_exists(get_field)) the_field('phone_number','option'); ?></strong></p>
	</div>
</section>
<?php endwhile; endif; ?>
<?php get_footer(); ?>