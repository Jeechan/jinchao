<?php get_header();?>


<div id="content">
<!-- end header -->
	
	<?php if (have_posts()) : ?>
	<?php while (have_posts()) : the_post(); ?>
<div class="post home" id="post-647513">
	<h2 class="posttitle"><a href="<?php the_permalink() ?>"><?php the_title_attribute(); ?></a></h2></h2> 
	<p class="date"> <?php the_author_posts_link(); ?> ·<?php the_date_xml()?> ·<?php post_views(' ', ' 阅读'); ?> <?php edit_post_link('[编辑]'); ?></p>
		<div class="postcontent">
		<p><?php the_content("Read More..."); ?></p>
	</div>
	



	
			</p>

</div>
		<?php endwhile; ?>
	
		
		<?php else : ?>
		<?php endif; ?>

		<?php comments_template();?>





	<div id="pagenav"><span class="left preciousposts">
<?php if (get_previous_post()) { previous_post_link('上一篇: %link');} else {echo "已是最后文章";} ?>
<?php if (get_next_post()) { next_post_link('下一篇: %link');} else {echo "已是最新文章";} ?>
</div> 
</div> 


<?php get_sidebar();?>
<?php get_footer();?>