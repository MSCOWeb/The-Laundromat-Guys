<?php if(function_exists(get_field)): if(get_field('form_submissions','option')): if(have_rows('form_submissions','option')): while(have_rows('form_submissions','option')): the_row(); ?>
<input type="hidden" name="to[]" value="<?php the_sub_field('email'); ?>">
<?php endwhile; endif; endif; endif; ?>