<?php TailPress::instance()->get_header(); ?>

<div class="container my-8 mx-auto">

	<?php if (have_posts()) : ?>

		<?php
		while (have_posts()) :
			the_post();
		?>

			<?php TailPress::instance()->get_template_part('template-parts/content', 'single'); ?>

			<?php
			// If comments are open or we have at least one comment, load up the comment template.
			if (comments_open() || get_comments_number()) :
				TailPress::instance()->comments_template();
			endif;
			?>

		<?php endwhile; ?>

	<?php endif; ?>

</div>

<?php
TailPress::instance()->get_footer();
