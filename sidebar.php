<div id="sidebar">

<ul id="nav">
<?php wp_nav_menu('theme_location=mainmenu'); ?>
		<div class="search-inner span-3">
			 <i class="toggle-search flaticon-search4"></i>
				</div>
	</ul>
			<?php if ( !function_exists('dynamic_sidebar')
      	  || !dynamic_sidebar() ) : ?>
	
<?php endif; ?>	
</div>
<script type="text/javascript">
    jQuery(document).ready(function($) {
        $('#nav li').hover(function() {
            $('ul', this).slideDown(300)
        },
        function() {
            $('ul', this).slideUp(300)
        });
    });
</script>
