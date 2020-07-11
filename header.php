<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta http-equiv="Content-Type" content="text/html; charset=<?php bloginfo( 'charset' ); ?>" />
<?php wp_head(); ?>
<title>
<?php if (is_home()||is_search()) { bloginfo('name'); } else { wp_title(''); print " - "; bloginfo('name'); } ?>
</title>
<link type="text/css" rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css">
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/js/highlight.css" />
</style>
<meta name="generator" content="WordPress 4.5.4" />
<script type='text/javascript' src='http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js'></script>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/img/style.css" />
<link rel="icon" href="<?php bloginfo('template_url'); ?>/images/favicon.ico" type="image/x-icon">
</head>
<body></body>

<div id="wrap">
<div id="circle"></div> <div id="circle1" ></div>
	<div id="header">
		<h1><span title="Jeechan"><a href="<?php echo get_option('home'); ?>"><?php bloginfo('name'); ?></a></h1>
		<p><?php bloginfo('description'); ?></p>
<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
    <div><label class="screen-reader-text" for="s"></label>
      <input type="text" value="" name="s" id="s"placeholder="搜索..."/>
       
    </div>
</form>
</div>
<script type="text/javascript">   
var documentHeight = 0;   
var topPadding = 15;   
$(function() {   
    var offset = $("#sidebar").offset();   
    documentHeight = $(document).height();   
    $(window).scroll(function() {   
        var sideBarHeight = $("#sidebar").height();   
        if ($(window).scrollTop() > offset.top) {   
            var newPosition = ($(window).scrollTop() - offset.top) + topPadding;   
            var maxPosition = documentHeight - (sideBarHeight + 368);   
            if (newPosition > maxPosition) {   
                newPosition = maxPosition;   
            }   
            $("#sidebar").stop().animate({   
                marginTop: newPosition   
            });   
        } else {   
            $("#sidebar").stop().animate({   
                marginTop: 0   
            });   
        };   
    });   
});   

</script>  

<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "https://hm.baidu.com/hm.js?12e27366b3bbab4a2544431c488855b8";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script>
