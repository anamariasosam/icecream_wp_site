<?php 
/*
Template Name: WooCommerce
*/ 
?>
<?php
$eltdf_sidebar_layout  = sweettooth_elated_sidebar_layout();

get_header();
sweettooth_elated_get_title();
get_template_part('slider');

//Woocommerce content
if ( ! is_singular('product') ) { ?>
	<div class="eltdf-container">
		<div class="eltdf-container-inner clearfix">
			<div class="eltdf-grid-row">
				<div <?php echo sweettooth_elated_get_content_sidebar_class(); ?>>
					<?php sweettooth_elated_woocommerce_content(); ?>
				</div>
				<?php if($eltdf_sidebar_layout !== 'no-sidebar') { ?>
					<div <?php echo sweettooth_elated_get_sidebar_holder_class(); ?>>
						<?php get_sidebar(); ?>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>			
<?php } else { ?>
	<div class="eltdf-container">
		<div class="eltdf-container-inner clearfix">
			<?php sweettooth_elated_woocommerce_content(); ?>
		</div>
	</div>
<?php } ?>
<?php get_footer(); ?>