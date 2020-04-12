<?php get_header(); ?>
<h1>Attachment page</h1>

<?php if ( has_excerpt() ) : ?>
        
   <div class="entry-caption">
         <?php the_excerpt(); ?>
   </div>

<?php endif; ?>

<?php get_footer(); ?>