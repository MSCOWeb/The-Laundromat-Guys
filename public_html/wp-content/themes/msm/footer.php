<footer>
	<div class="container">
		<div class="third">
			All Content Copyright <?php echo date('Y'); ?> <br class="appear"><span class="disappear">-</span> All Rights Reserved.<br>
			<a href="<?php echo site_url(); ?>/privacy-policy/">Privacy Policy</a> | <a href="<?php echo site_url(); ?>/sitemap/">Sitemap</a>
		</div>
		<div class="third social">
			<?php if(function_exists(get_field)): if(have_rows('social_links','option')): while(have_rows('social_links','option')): the_row(); ?>
			<a href="<?php the_sub_field('url','option'); ?>" target="_blank"><i class="fa fa-<?php the_sub_field('social_channel'); ?>"></i></a>
			<?php endwhile; endif; endif; ?>
		</div>
		<div class="third">
			Site Developed by <a href="http://msco.com/" target="_blank">MSCO</a>
		</div>
	</div>
</footer>
<script>
function loadCSS(name){
	var fileref=document.createElement("link")
	fileref.setAttribute("rel","stylesheet")
	fileref.setAttribute("type","text/css")
	fileref.setAttribute("href",name)
	document.getElementsByTagName("head")[0].appendChild(fileref)
}
loadCSS('http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800');
loadCSS('//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css');
</script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-70374017-1', 'auto');
  ga('send', 'pageview');

</script>
<?php wp_footer(); ?>
</html>
</body>