<?php TailPress::instance()->get_header(); ?>

<div class="container mx-auto my-8">

	<?php if (have_posts()) : ?>
		<?php
		while (have_posts()) :
			the_post();
		?>

			<?php TailPress::instance()->get_template_part('template-parts/content', get_post_format()); ?>

		<?php endwhile; ?>

	<?php endif; ?>

</div>

<?php
TailPress::instance()->get_footer();
