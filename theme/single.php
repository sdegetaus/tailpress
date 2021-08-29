<?php TailPress::instance()->get_header(); ?>

<div class="container mx-auto my-8">
	<?php
	if (have_posts()) :
		while (have_posts()) :
			the_post();
			TailPress::instance()->get_template_part('template-parts/content', 'single');

			// if comments are open or we have at least
			// one comment, load up the comment template.
			if (comments_open() || get_comments_number()) :
				TailPress::instance()->comments_template();
			endif;
		endwhile;
	endif;
	?>
</div>

<?php TailPress::instance()->get_footer(); ?>