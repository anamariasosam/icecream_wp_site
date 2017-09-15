<?php
class SweetToothElatedClassAuthorInfoWidget extends SweetToothElatedClassWidget {
    /**
     * Set basic widget options and call parent class construct
     */
    public function __construct() {
        parent::__construct(
            'eltdf_author_info_widget',
            esc_html__('Elated Author Info Widget', 'sweettooth'),
            array( 'description' => esc_html__( 'Add author info element to widget areas', 'sweettooth'))
        );

        $this->setParams();
    }

    /**
     * Sets widget options
     */
    protected function setParams() {
        $this->params = array(
            array(
                'type' => 'textfield',
                'name' => 'extra_class',
                'title' => esc_html__('Custom CSS Class', 'sweettooth')
            ),
            array(
                'type' => 'textfield',
                'name' => 'author_username',
                'title' => esc_html__('Author Username', 'sweettooth')
            )
        );
    }

    /**
     * Generates widget's HTML
     *
     * @param array $args args from widget area
     * @param array $instance widget's options
     */
    public function widget($args, $instance) {
        extract($args);

        $extra_class = '';
        if (!empty($instance['extra_class'])) {
            $extra_class = $instance['extra_class'];
        }

        $authorID = 1;
	    if(!empty($instance['author_username'])) {
		    $author = get_user_by( 'login', $instance['author_username']);

		    if ($author) $authorID = $author->ID;
	    }

	    $author_info     = get_the_author_meta('description', $authorID);
        ?>

        <div class="widget eltdf-author-info-widget <?php echo esc_html($extra_class); ?>">
            <div class="eltdf-aiw-inner">
	            <a itemprop="url" class="eltdf-aiw-image" href="<?php echo esc_url(get_author_posts_url($authorID)); ?>" target="_self">
					<?php echo sweettooth_elated_kses_img(get_avatar($authorID, 138)); ?>
		        </a>
		        <?php if($author_info !== "") { ?>
			        <h6 class="eltdf-aiw-title">
				        <span><?php esc_html_e('About Author', 'sweettooth'); ?></span>
			        </h6>
			        <p itemprop="description" class="eltdf-aiw-text"><?php echo esc_attr($author_info); ?></p>
		        <?php } ?>
            </div>
        </div>
    <?php 
    }
}