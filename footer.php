<div id="footer">

<ul>
<li> &copy; <a accesskey="1" href="<?php echo get_option('home'); ?>">
	Tow1|<?php if(get_option('zh_cn_l10n_icp_num')){?>
<a href="http://www.miitbeian.gov.cn/" rel="external nofollow" target="_blank">
<?php echo get_option('zh_cn_l10n_icp_num');?>
</a>
<?php } ?></a> </li>
	</li>
</ul>

<ul>

	
</ul>




</div>

</div>

</body>
</html>
<div id="top_div" onclick="GoTop()" style="top: -332px;"></div>
<script>  
POWERMODE.colorful = true; // make power mode colorful  
POWERMODE.shake = false; // turn off shake  
document.body.addEventListener('input', POWERMODE);  
</script>
<!--图片暗箱-->
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery.min.js" ></script>   
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/pirobox.min.js"></script>   
<script type="text/javascript">   
$(document).ready(function() {   
    $().piroBox({   
            my_speed: 400, //animation speed   
            bg_alpha: 0.3, //background opacity   
            slideShow : true, // true == slideshow on, false == slideshow off   
            slideSpeed : 4, //slideshow duration in seconds(3 to 6 Recommended)   
            close_all : '.piro_close,.piro_overlay'// add class .piro_overlay(with comma)if you want overlay click close piroBox   
    });   
}); 
</script>
<!--网页转圈加载特效-->
<script type="text/javascript">
$(window).load(function() {
$("#circle").fadeOut(500);
$("#circle1").fadeOut(700);
});
</script>
<!--网页转圈加载特效-->
<!--下拉菜单-->
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
<!--下拉菜单-->

<script type="text/javascript">//返回 
var currentPosition,timer;  
function GoTop(){  
timer=setInterval("runToTop()",1);  
}  
function runToTop(){  
currentPosition=document.documentElement.scrollTop || document.body.scrollTop; 
currentPosition-=10;  
if(currentPosition>0)  
{  
window.scrollTo(0,currentPosition);  
}  
else  
{  
window.scrollTo(0,0);  
clearInterval(timer);  
}  
}	 
window.scrollTo(0,document.body.scrollHeight);</script>