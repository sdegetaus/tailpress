<?php TailPress::instance()->get_header(); ?>

<div class="container mx-auto my-8">
	<?php
	if (have_posts()) :
		while (have_posts()) :
			the_post();
			the_content();
		endwhile;
	endif;
	?>
</div>

<?php TailPress::instance()->get_footer(); ?>