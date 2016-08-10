<?php get_header(); ?>
<?php if(have_posts()): while(have_posts()): the_post(); ?>
<?php if(has_post_thumbnail()): ?>
<section class="title">
	<?php the_post_thumbnail(); ?>
	<span class="orange">
		<h2><?php the_title(); ?></h2>
	</span>
</section>
<?php endif; ?>
<section class="page-content">
	<?php if(!has_post_thumbnail()): ?>
	<span class="no-image">
		<h2><?php the_title(); ?></h2>
	</span>
	<?php endif; if($post->post_content != ""): ?>
	<div class="container content">
		<?php the_content(); ?>
	</div>
	<?php endif; ?>
<?php if(function_exists(get_field)): if(have_rows('content')): while(have_rows('content')): the_row(); if(get_row_layout() == "basic_content"): ?>
	<div class="container content">
		<?php the_sub_field('content_editor'); ?>
	</div>
<?php elseif(get_row_layout() == "featured_box"): ?>
	<div class="container content">
		<div class="featured_box">
			<h3><?php the_sub_field('heading'); ?></h3>
			<?php if(have_rows('list')): ?>
			<ul>
				<?php while(have_rows('list')): the_row(); ?>
				<li><?php the_sub_field('list_item'); ?></li>
				<?php endwhile; ?>	
			</ul>
			<?php endif; ?>
		</div>
	</div>
<?php elseif(get_row_layout() == "button"): ?>
	<div class="container content">
		<a class="oj-button" href="<?php the_sub_field('page_link'); ?>"><?php the_sub_field('button_text'); ?></a>
	</div>
<?php elseif(get_row_layout() == "heading"): ?>
	<div class="heading">
		<span>
			<h2><?php the_sub_field('text'); ?></h2>
		</span>
	</div>
<?php elseif(get_row_layout() == "list_w_heading_&_images"): ?>
	<div class="container content list_w_heading_and_images">
		<?php if(have_rows('list')): while(have_rows('list')): the_row(); ?>
		<div class="cf li">
			<?php $image = get_sub_field('image'); if($image): ?>
			<div class="image">
				<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
			</div>
			<?php endif; if(get_sub_field('heading') || get_sub_field('text')): ?>
			<div class="words">
				<h4><?php the_sub_field('heading'); ?></h4>
				<p><?php the_sub_field('text'); ?></p>
			</div>
			<?php endif; ?>
		</div>
		<?php endwhile; endif; ?>
	</div>
<?php endif; endwhile; endif; endif; ?>
</section>
<?php endwhile; endif; ?>
<?php get_footer(); ?>