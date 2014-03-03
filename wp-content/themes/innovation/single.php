<?php
include(TEMPLATEPATH . '/var.php');
$post = $wp_query->post;

if(in_category("$ts_portfolio_cat")) {

    /* Is a Portfolio item */
    require('single-portfolio.php');

} else {

    /* Is a Blog post */
    require('single-blog.php');

}
?>