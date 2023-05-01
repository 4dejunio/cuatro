<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package cuatro
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <!-- Disable Header -->
    <!-- <header class="entry-header"> -->
    <!-- <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?> -->
    <!-- </header> -->
    <!-- .entry-header -->

    <div class="entry-content">
        <div class="hola-title">
            <svg width="auto" height="auto" viewBox="0 0 1152 440" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M0.975003 431V0.499971H100.605V165.32H266.655V0.499971H366.285V431H266.655V257.57H100.605V431H0.975003ZM670.292 159.785C703.502 188.075 720.107 227.64 720.107 278.48C720.107 329.32 703.502 368.885 670.292 397.175C637.082 425.465 597.312 439.61 550.982 439.61C504.652 439.61 464.882 425.465 431.672 397.175C398.462 368.885 381.857 329.32 381.857 278.48C381.857 227.64 398.462 188.075 431.672 159.785C464.882 131.495 504.652 117.35 550.982 117.35C597.312 117.35 637.082 131.495 670.292 159.785ZM497.477 332.6C512.237 345.72 530.072 352.28 550.982 352.28C571.892 352.28 589.727 345.72 604.487 332.6C619.247 319.07 626.627 301.03 626.627 278.48C626.627 255.93 619.247 238.095 604.487 224.975C589.727 211.445 571.892 204.68 550.982 204.68C530.072 204.68 512.237 211.445 497.477 224.975C482.717 238.095 475.337 255.93 475.337 278.48C475.337 301.03 482.717 319.07 497.477 332.6ZM735.362 431V0.499971H827.612V431H735.362ZM1151.35 431H1057.87C1050.08 423.21 1045.16 410.09 1043.11 391.64C1020.56 423.62 989.402 439.61 949.632 439.61C916.012 439.61 889.567 430.59 870.297 412.55C851.437 394.51 842.007 370.935 842.007 341.825C842.007 313.125 852.872 290.575 874.602 274.175C896.332 257.365 925.237 246.295 961.317 240.965L1038.81 228.665V223.13C1038.81 193.61 1023.02 178.85 991.452 178.85C977.512 178.85 966.237 181.31 957.627 186.23C949.017 191.15 944.712 197.915 944.712 206.525C944.712 208.985 944.917 210.83 945.327 212.06L861.687 240.35C858.407 228.46 856.767 218.62 856.767 210.83C856.767 183.36 869.477 161.015 894.897 143.795C920.727 126.165 952.912 117.35 991.452 117.35C1084.52 117.35 1131.06 155.89 1131.06 232.97V355.355C1131.06 386.105 1137.82 411.32 1151.35 431ZM968.697 368.27C989.607 368.27 1006.42 360.89 1019.13 346.13C1032.25 330.96 1038.81 313.535 1038.81 293.855V288.32L973.617 299.39C945.737 304.72 931.797 317.02 931.797 336.29C931.797 345.31 935.077 352.895 941.637 359.045C948.197 365.195 957.217 368.27 968.697 368.27Z"
                    fill="black" />
            </svg>
        </div>
        <div class="subtitles">
            <h2 class="main-subtitle"><?php the_field('subtitle'); ?></h2>
            <h2 class="second-subtitle"><?php the_field('subtitle_2'); ?></h2>
        </div>

        <div class="section">
            <h2 class="section-heading">What we do</h2>
            <div class="service-list">
                <?php $services = new WP_Query( array( 'post_type' => 'services', 'posts_per_page' => 4, 'orderby' => 'fecha', 'order' => 'ASC') ); ?>
                <?php while ( $services->have_posts() ) : $services->the_post(); ?>
                <div class="service">
                    <div class="service-thumbnail">
                        <?php the_post_thumbnail( 'full' ); ?>
                    </div>
                    <div class="service-info">
                        <div class="service-name">
                            <h3><?php the_title(); ?></h3>
                        </div>
                        <div class="service-description"><?php the_content(); ?></div>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
            <p class="section-footer">
                A full-service design agency comprised </br> of diverse minds who have a passion </br> for creating
                digital experiences.
            </p>
        </div>
        <?php 
    // Reset the global post object so that the rest of the page works correctly.
    wp_reset_postdata(); ?>
        <?php
		the_content();

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'cuatro' ),
				'after'  => '</div>',
			)
		);
		?>
    </div><!-- .entry-content -->

    <?php if ( get_edit_post_link() ) : ?>
    <footer class="entry-footer">
        <?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'cuatro' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
    </footer><!-- .entry-footer -->
    <?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->