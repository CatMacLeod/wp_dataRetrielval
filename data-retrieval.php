<?php
/* Template Name: Data Retrieval */

get_header(); ?>

<div class="wrap">
<h1>Data Retrieval Application</h1>
    <?php
    include 'data-dump.php';

    makeTable();
    ?>
<h5><b>This example is the outcome of SQL table JOINs.</b></h5>
</div><!-- .wrap -->

<?php get_footer();
