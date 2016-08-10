<?php /*
Template name: List Your Laundromat
*/ get_header(); ?>
<?php if(have_posts()): while(have_posts()): the_post(); ?>
<section class="title">
	<?php the_post_thumbnail(); ?>
	<span class="orange">
		<h2><?php the_title(); ?></h2>
	</span>
</section>
<section class="page-content">
	<div class="container content">
		<?php the_content(); ?>
		<form action="" method="post" class="cf">
			<input type="text" name="Name" value="Name" class="req"/>
			<input type="text" name="Email" value="Email" class="req"/>
			<input type="text" name="Property Address" value="Property Address" class="req"/>
			<input type="text" name="Asking Price" value="Asking Price" class="req"/>
			<input type="text" name="Square Feet" value="Square Feet" class="req"/>
			<input type="text" name="Number of Washing Machines" value="Number of Washing Machines" class="req"/>
			<input type="text" name="Brand of Washing Machines" value="Brand of Washing Machines" class="req"/>
			<input type="text" name="Age of Washing Machines" value="Age of Washing Machines" class="req"/>
			<input type="text" name="Number of Dryer Pockets" value="Number of Dryer Pockets" class="req"/>
			<input type="text" name="Number of Parking Spaces Available" value="Number of Parking Spaces Available" class="req"/>
			<input type="text" name="Property Available for Sale" value="Property Available for Sale" class="req"/>
			<input type="text" name="If Lease, Time Remaining on Lease" value="If Lease, Time Remaining on Lease" class="req"/>
			<label><span>Public?</span></label>
			<span class="radio"><input type="radio" value="Yes" name="Public"/>Yes</span>
			<span class="radio"><input type="radio" value="No" name="Public"/>No</span>
			<?php get_template_part('form-submission-emails'); ?>
			<div class="cf"></div>
			<input type="submit" value="Submit"/>
			<span class="status">&nbsp;</span>
		</form>
	</div>
</section>
<?php endwhile; endif; ?>
<?php get_footer(); ?>