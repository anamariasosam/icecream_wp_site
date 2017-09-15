<?php
  $target = $params['target'] === '' ? $this_object->getItemLinkTarget() : $params['target'];
?>
<article class="eltdf-pl-item <?php echo esc_attr($this_object->getArticleClasses($params)); ?>">
	<div class="eltdf-pl-item-inner">
		<?php echo eltdf_core_get_cpt_shortcode_module_template_part('portfolio', 'layout-collections/'.$item_style, '', $params); ?>
	</div>
</article>