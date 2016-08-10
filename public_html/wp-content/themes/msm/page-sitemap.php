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
	<div class="container">
		<ul>
			<?php wp_list_pages(array('title_li'=>'')); ?>
		</ul>
	</div>
</section>
<?php endwhile; endif; ?>
<?php get_footer(); ?>