</div><!--/contentwrap or /sidebar or /extraswrap on homepage-->
</div><!--/content-->

<p class="footer">Copyright &copy; 
<?php bloginfo('name'); echo ' 2008 - ' . date('y'); ?>.
Design by <a href="http://www.danharper.me">Dan Harper</a> for 
<a href="http://www.nettuts.com">NETTUTS</a>.
Powered by <a href="http://www.wordpress.org">WordPress</a>.</p>

</div><!--/wrap-->
<?php
wp_footer();
include(TEMPLATEPATH . "/var.php");
echo stripslashes($ts_analytics_code); ?>
</body>
</html>