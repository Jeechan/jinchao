<?php get_header();?>


<div id="content">
<!-- end header -->

	<?php if (have_posts()) : ?>
	<?php while (have_posts()) : the_post(); ?>
<div class="post home" id="post-647513">

	
	<div class="postcontent">
		<p><?php the_content("Read More..."); ?></p>
		<div class="page-links">
<h3>友情链接：</h3>
    <ul>
        <?php
        $default_ico = get_template_directory_uri().'/images/links_default.gif'; //默认 ico 图片位置
        $bookmarks = get_bookmarks('title_li=&orderby=rand&categorize=1&'); //全部链接随机输出
        //如果你要输出某个链接分类的链接，更改一下get_bookmarks参数即可
        //如要输出链接分类ID为5的链接 title_li=&categorize=0&category=5&orderby=rand
        if ( !empty($bookmarks) ) {
            foreach ($bookmarks as $bookmark) {
            echo '<li><img src="', $bookmark->link_url , '/favicon.ico" onerror="javascript:this.src=\'' , $default_ico , '\'" /><a href="' , $bookmark->link_url , '" title="' , $bookmark->link_description , '" target="_blank" >' , $bookmark->link_name , '</a></li>';
            }
        }
        ?>
    </ul>
</div>
	</div>
	
	
	
		  		


	
			</p>

</div>

<?php endwhile; ?>
<?php else : ?>
<?php endif; ?>







</div>


<?php get_sidebar();?>


<?php get_footer();?>