<?php TailPress::instance()->get_header(); ?>

<div class="container mx-auto my-8">
	<?php
	if (have_posts()) :
		while (have_posts()) :
			the_post();
			TailPress::instance()->get_template_part('template-parts/content', get_post_format());
		endwhile;
	endif;
	?>
</div>

<?php TailPress::instance()->get_footer(); ?>