<?php
get_header();
?>

<div id="mainarea">

<h2>404: Page Not Found</h2>

<p>It seems what you're looking for isn't here. This is probably our fault &ndash; sorry!<br />
Try searching instead:</p>

<?php
include(TEMPLATEPATH . '/searchform.php');

get_sidebar();
get_footer();
?>