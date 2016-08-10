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
	<div class="container content">
		<?php if(function_exists(get_field)): if(get_field('address')): ?>
		<p><strong>Address: </strong><?php the_field('address'); ?></p>
		<?php endif; if(get_field('mail')): ?>
		<p><strong>Mail: </strong><?php the_field('mail'); ?></p>
		<?php endif; if(get_field('phone')): ?>
		<p><strong>Phone: </strong><?php the_field('phone'); ?></p>
		<?php endif; if(get_field('fax')): ?>
		<p><strong>Fax: </strong><?php the_field('fax'); ?></p>
		<?php endif; if(get_field('cell')): ?>
		<p><strong>Cell: </strong><?php the_field('cell'); ?></p>
		<?php endif; endif; ?>
		<form action="<?php echo get_template_directory_uri(); ?>/form-handlers/contact-form.php" method="post" class="cf">
			<h4>Fill out this form for a free consultation:</h4>
			<?php get_template_part('form-submission-emails'); ?>
			<input type="text" name="Name" value="Name" class="req">
			<input type="text" name="Email" value="Email" class="req emailVal">
			<input type="text" name="Phone" value="Phone" class="req">
			<textarea name="Message">Message</textarea>
			<input type="submit" value="Submit"/>
			<span class="status">&nbsp;</span>
		</form>
	</div>
</section>
<?php endwhile; endif; ?>
<?php get_footer(); ?>