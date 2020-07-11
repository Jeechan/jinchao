<?php
/*
Template Name: archives
*/
?>
<?php get_header(); ?>
<div id="content">
<?php
function qiuye_archives() {
if( !$output = get_option('qiuye_archives') ){
$output = '<div class="archives"><div style="text-align:center;"><a id="al_expand_collapse" href="#"">全部展开/收缩</a> <span>(点击月份伸缩)</span></div>';
$the_query = new WP_Query( 'posts_per_page=-1&ignore_sticky_posts=1' );
$year=0; $mon=0; $i=0; $j=0;
while ( $the_query->have_posts() ) : $the_query->the_post();
$year_tmp = get_the_time('Y');
$mon_tmp = get_the_time('m');
$y=$year; $m=$mon;
if ($mon != $mon_tmp && $mon > 0) $output .= '</ul></li>';
if ($year != $year_tmp && $year > 0) $output .= '</ul>';
if ($year != $year_tmp) {
$year = $year_tmp;
$output .= '<h3 class="al_year">'. $year .'年</h3><ul class="al_mon_list">';}
if ($mon != $mon_tmp) {
$mon = $mon_tmp;
$output .= '<li><span class="al_mon">'. $mon .' 月</span><ul class="al_post_list">';}
$output .= '<li class="atitle"><span class="ttime">'. get_the_time('m月d日: ') .'</span><a class="tttile" href="'. get_permalink() .'">'. get_the_title() .'</a> <span class="ttcom">(<a title="'. get_comments_number('0', '1', '%') .'条评论">'. get_comments_number('0', '1', '%') .'</a>)</span></li>';
endwhile;wp_reset_postdata();
$output .= '</ul></li></ul></div>';
update_option('qiuye_archives', $output);}
echo $output;}
function clear_zal_cache() {
update_option('qiuye_archives', '');}
add_action('save_post', 'clear_zal_cache');
?>
<?php /*清除缓存动作clear_zal_cache();*/ ?><?php qiuye_archives(); ?>
<script>
jQuery(document).ready(function($){
(function(){
$('#al_expand_collapse,.archives span.al_mon').css({cursor:"s-resize"});
$('.archives span.al_mon').each(function(){
var num=$(this).next().children('li').size();
var text=$(this).text();
$(this).html(text+'<span> ( '+num+' 篇文章 )</span>');});
var $al_post_list=$('.archives ul.al_post_list'),
$al_post_list_f=$('.archives ul.al_post_list:first');
$al_post_list.show(1,function(){
$al_post_list_f.show();});
$('.archives span.al_mon').click(function(){
$(this).next().slideToggle(400);
return false;});
$(function() {
$("#al_expand_collapse").click(function(event) {
$al_post_list.toggle(400);});});})();});
</script>
</div>
<?php get_sidebar();?>


<?php get_footer();?>