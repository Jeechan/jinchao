<?php get_header();?>


<div id="content">
<!-- end header -->

	<?php if (have_posts()) : ?>
	<?php while (have_posts()) : the_post(); ?>


<h2><a href="<?php the_permalink() ?>"><?php the_title_attribute(); ?></a></h2>
<div class="post home" id="post-647513">
	<p class="date"></i> <?php the_date_xml()?></p>
	
		<div class="postcontent">
		<?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 200,"...",'utf-8'); ?>

	</div>
	
	
	<h2></h2>
		  		


	
			</p>

</div>

<?php endwhile; ?>
<?php else : ?>
<?php endif; ?>





	
	<?php pagination($query_string); ?>  


</div>


<?php get_sidebar();?>


<?php get_footer();?>