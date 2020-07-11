<?php

// 主题评论模板
function mytheme_comment($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment;
?>
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
	<div id="comment-<?php comment_ID(); ?>">
		<div class="comment-author vcard">
			<?php echo get_avatar($comment,$size='40'); ?>
			<?php /* printf(__('<cite class="fn">%s</cite> <span class="says">says:</span>'), get_comment_author_link()) */  ?>
			<cite class="fn"><?php comment_author_link() ?></cite>
			<span class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php printf(__('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?></a><?php edit_comment_link(__('(Edit)'),'  ','') ?></span>
			
		</div>
		<?php if ($comment->comment_approved == '0') : ?>
		<em class="approved"><?php _e('Your comment is awaiting moderation.') ?></em>
		<br />
		<?php endif; ?>
		<?php comment_text() ?>
		<div class="reply">
			<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
		</div>
	</div>
<?php }
// 评论添加@，
function ludou_comment_add_at( $commentdata ) {
  if( $commentdata['comment_parent'] > 0) {
    $commentdata['comment_content'] = '@<a href="#comment-' . $commentdata['comment_parent'] . '">'.get_comment_author( $commentdata['comment_parent'] ) . '</a> ' . $commentdata['comment_content'];
  }

  return $commentdata;
}
add_action( 'preprocess_comment' , 'ludou_comment_add_at', 20);
//谷歌字体去除
function remove_open_sans() {
    wp_deregister_style( 'open-sans' );
    wp_register_style( 'open-sans', false );
    wp_enqueue_style('open-sans','');
}

//禁止代码标点转换
remove_filter('the_content', 'wptexturize');

// 菜单声明
if(function_exists('register_nav_menu')){
register_nav_menu('mainmenu','主导航');
register_nav_menu('topmenu','顶部导航');
}
if (!is_nav_menu('主导航')||!is_nav_menu('顶部导航')){
$menu_id_1 = wp_create_nav_menu('主导航');
$menu_id_2 = wp_create_nav_menu('顶部导航');
wp_update_nav_menu_item($menu_id_1, 0);
wp_update_nav_menu_item($menu_id_2, 1);
}

//暗箱自动添加标签属性 
add_filter('the_content', 'pirobox_gall_replace');   
function pirobox_gall_replace ($content)   
{   global $post;   
    $pattern = "/<a(.*?)href=('|\")([^>]*).(bmp|gif|jpeg|jpg|png)('|\")(.*?)>(.*?)<\/a>/i";   
    $replacement = '<a$1href=$2$3.$4$5 class="pirobox_gall"$6>$7</a>';   
    $content = preg_replace($pattern, $replacement, $content);   
    return $content;   
}  

//WordPress文本小工具中运行PHP代码
add_filter('widget_text', 'php_text', 99);
function php_text($text) {
if (strpos($text, '<' . '?') !== false) {
ob_start();
eval('?' . '>' . $text);
$text = ob_get_contents();
ob_end_clean();
}
return $text;
}
//访问计数
function record_visitors()
{
	if (is_singular())
	{
	  global $post;
	  $post_ID = $post->ID;
	  if($post_ID)
	  {
		  $post_views = (int)get_post_meta($post_ID, 'views', true);
		  if(!update_post_meta($post_ID, 'views', ($post_views+1)))
		  {
			add_post_meta($post_ID, 'views', 1, true);
		  }
	  }
	}
}
add_action('wp_head', 'record_visitors');

/// 函数名称：post_views
/// 函数作用：取得文章的阅读次数
function post_views($before = '(点击 ', $after = ' 次)', $echo = 1)
{
  global $post;
  $post_ID = $post->ID;
  $views = (int)get_post_meta($post_ID, 'views', true);
  if ($echo) echo $before, number_format($views), $after;
  else return $views;
}

//小工具加载
if ( function_exists('register_sidebar') )
  register_sidebar(array(
        'before_widget' => '<div class="sidebox">	',
        'after_widget' => '</div>',
        'before_title' => '<h2>',
        'after_title' => '</h2>',
    ));

// wordpress给评论作者的链接新窗口打开
function yundanran_get_comment_author_link($url){
$return=$url;
$p1="/^<a .*/i";
$p2="/^<a ([^>]*)>(.*)/i";
if(preg_match($p1,$return))
{$return=preg_replace($p2,"<a $1 target='_blank'>$2",$return);}
return $return;}
add_filter('get_comment_author_link','yundanran_get_comment_author_link');

//编辑器增强
 function enable_more_buttons($buttons) {
     $buttons[] = 'hr';
     $buttons[] = 'del';
     $buttons[] = 'sub';
     $buttons[] = 'sup'; 
     $buttons[] = 'fontselect';
     $buttons[] = 'fontsizeselect';
     $buttons[] = 'cleanup';   
     $buttons[] = 'styleselect';
     $buttons[] = 'wp_page';
     $buttons[] = 'anchor';
     $buttons[] = 'backcolor';
     return $buttons;
     }
add_filter("mce_buttons_3", "enable_more_buttons");

//激活友情链接后台
add_filter( 'pre_option_link_manager_enabled', '__return_true' );
//归档页面
function archives_list_SHe() {
     global $wpdb,$month;
     $lastpost = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_date <'" . current_time('mysql') . "' AND post_status='publish' AND post_type='post' AND post_password='' ORDER BY post_date DESC LIMIT 1");
     $output = get_option('SHe_archives_'.$lastpost);
     if(empty($output)){
         $output = '';
         $wpdb->query("DELETE FROM $wpdb->options WHERE option_name LIKE 'SHe_archives_%'");
         $q = "SELECT DISTINCT YEAR(post_date) AS year, MONTH(post_date) AS month, count(ID) as posts FROM $wpdb->posts p WHERE post_date <'" . current_time('mysql') . "' AND post_status='publish' AND post_type='post' AND post_password='' GROUP BY YEAR(post_date), MONTH(post_date) ORDER BY post_date DESC";
         $monthresults = $wpdb->get_results($q);
         if ($monthresults) {
             foreach ($monthresults as $monthresult) {
             $thismonth    = zeroise($monthresult->month, 2);
             $thisyear    = $monthresult->year;
             $q = "SELECT ID, post_date, post_title, comment_count FROM $wpdb->posts p WHERE post_date LIKE '$thisyear-$thismonth-%' AND post_date AND post_status='publish' AND post_type='post' AND post_password='' ORDER BY post_date DESC";
             $postresults = $wpdb->get_results($q);
             if ($postresults) {
                 $text = sprintf('%s %d', $month[zeroise($monthresult->month,2)], $monthresult->year);
                 $postcount = count($postresults);
                 $output .= '<ul class="archives-list"><li><span class="archives-yearmonth">' . $text . ' &nbsp;(' . count($postresults) . '&nbsp;篇文章)</span><ul class="archives-monthlisting">' . "\n";
             foreach ($postresults as $postresult) {
                 if ($postresult->post_date != '0000-00-00 00:00:00') {
                 $url = get_permalink($postresult->ID);
                 $arc_title    = $postresult->post_title;
                 if ($arc_title)
                     $text = wptexturize(strip_tags($arc_title));
                 else
                     $text = $postresult->ID;
                     $title_text = 'View this post, "' . wp_specialchars($text, 1) . '"';
                     $output .= '<li>' . mysql2date('d日', $postresult->post_date) . ':&nbsp;' . "<a href='$url' title='$title_text'>$text</a>";
                     $output .= '&nbsp;(' . $postresult->comment_count . ')';
                     $output .= '</li>' . "\n";
                 }
                 }
             }
             $output .= '</ul></li></ul>' . "\n";
             }
         update_option('SHe_archives_'.$lastpost,$output);
         }else{
             $output = '<div class="errorbox">Sorry, no posts matched your criteria.</div>' . "\n";
         }
     }
     echo $output;
 }
//图标
add_action( 'wp_enqueue_scripts', 'load_fontawesome_styles' );
function load_fontawesome_styles(){
    global $wp_styles;
    wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/font-awesome/css/font-awesome.min.css' );
    wp_enqueue_style( 'font-awesome-ie7', get_template_directory_uri() . '/font-awesome/css/font-awesome-ie7.min.css' );
    $wp_styles->add_data( 'font-awesome-ie7', 'conditional', 'lte IE 7' );
}//头像自定义
require_once(TEMPLATEPATH . '/simple-local-avatars.php');

//主题分页
function pagination($query_string){   
global $posts_per_page, $paged;   
$my_query = new WP_Query($query_string ."&posts_per_page=-1");   
$total_posts = $my_query->post_count;   
if(empty($paged))$paged = 1;   
$prev = $paged - 1;   
$next = $paged + 1;   
$range = 2; // only edit this if you want to show more page-links   
$showitems = ($range * 2)+1;   
  
$pages = ceil($total_posts/$posts_per_page);   
if(1 != $pages){   
echo "<div class='pagination'>";   
echo ($paged > 2 && $paged+$range+1 > $pages && $showitems < $pages)? "<a href='".get_pagenum_link(1)."'>最前</a>":"";   
echo ($paged > 1 && $showitems < $pages)? "<a href='".get_pagenum_link($prev)."'>上一页</a>":"";   
  
for ($i=1; $i <= $pages; $i++){   
if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )){   
echo ($paged == $i)? "<span class='current'>".$i."</span>":"<a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a>";   
}   
}   
  
echo ($paged < $pages && $showitems < $pages) ? "<a href='".get_pagenum_link($next)."'>下一页</a>" :"";   
echo ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) ? "<a href='".get_pagenum_link($pages)."'>最后</a>":"";   
echo "</div>\n";   
}   
}  
