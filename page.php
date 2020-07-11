<?php get_header();?>


<div id="content">
<!-- end header -->

	<?php if (have_posts()) : ?>
	<?php while (have_posts()) : the_post(); ?>
<div class="post home" id="post-647513">

	<h2 class="posttitle"><a href="<?php the_permalink() ?>"><?php the_title_attribute(); ?></a></h2></h2>
	<p class="date"><?php the_date_xml()?></p>
	
	<div class="postcontent">
		<p><?php the_content("Read More..."); ?></p>
	</div>
	
	
	
		  		


	
			</p>

</div>

<?php endwhile; ?>
<?php else : ?>
<?php endif; ?>







</div>


<?php get_sidebar();?>


<?php get_footer();?>