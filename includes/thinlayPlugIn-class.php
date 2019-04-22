<?php
/**
 * Adds thinlayPlugIn widget.
 */
class ThinlayPlugIn_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'thinlayPlugIn_widget', // Base ID
			esc_html__( 'Thinlay PlugIn Widget', 'thinlayPlugIn_domain' ), // Name
			array( 'description' => esc_html__( 'Widget to display Youtube subs', 'thinlayPlugIn_domain' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		echo $args['before_widget']; // Whatever you want to display before widget (<div>, etc)
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
        }
        
        //Widget content Output
        // echo esc_html__( 'Hello, World!', 'thinlayPlugIn_domain' );
           echo '<div class="g-ytsubscribe" data-channelid="UCcZ81AAVIkcz2wYT2yj3hNQ" data-layout="'.$instance['layout'].'" data-theme="dark" data-count="'.$instance['count'].'"></div>';

		echo $args['after_widget']; // Whatever you want to display after widget (</div>, etc)
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'ThinlayPlugIn Widget', 'thinlayPlugIn_domain' );
        
        $channel = ! empty( $instance['channel'] ) ? $instance['channel'] : esc_html__( 'Thinlay Youtube Channel', 'thinlayPlugIn_domain' );

        $layout = ! empty( $instance['layout'] ) ? $instance['layout'] : esc_html__( 'default', 'thinlayPlugIn_domain' );

        $count = ! empty( $instance['count'] ) ? $instance['count'] : esc_html__( 'default', 'thinlayPlugIn_domain' );
        ?>
        
        <!-- Title -->
		<p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>">
                <?php esc_attr_e( 'Title:', 'thinlayPlugIn_domain' ); ?>
            </label> 

            <input 
                class="widefat" 
                id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" 
                name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" 
                type="text" 
                value="<?php echo esc_attr( $title ); ?>">
        </p>

         <!-- Channel -->
		<p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'channel' ) ); ?>">
                <?php esc_attr_e( 'Channel:', 'thinlayPlugIn_domain' ); ?>
            </label>
            <input 
                class="widefat" 
                id="<?php echo esc_attr( $this->get_field_id( 'channel' ) ); ?>" 
                name="<?php echo esc_attr( $this->get_field_name( 'channel' ) ); ?>" 
                type="text" 
                value="<?php echo esc_attr( $channel ); ?>">
        </p>


         <!-- Layout -->
		<p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'layout' ) ); ?>">
                <?php esc_attr_e( 'Layout:', 'thinlayPlugIn_domain' ); ?>
            </label>
            <select 
                class="widefat" 
                id="<?php echo esc_attr( $this->get_field_id( 'layout' ) ); ?>" 
                name="<?php echo esc_attr( $this->get_field_name( 'layout' ) ); ?>" >
                <option value="default" <?php echo($layout == 'default')? 'selected' : ''; ?>>
                    Default
                </option>

                <option value="full" <?php echo($layout == 'full')? 'selected' : ''; ?>>
                    Full
                </option>
            </select>
        </p>
        
          <!-- Count -->
		<p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'count' ) ); ?>">
                <?php esc_attr_e( 'Count:', 'thinlayPlugIn_domain' ); ?>
            </label>
            <select 
                class="widefat" 
                id="<?php echo esc_attr( $this->get_field_id( 'count' ) ); ?>" 
                name="<?php echo esc_attr( $this->get_field_name( 'count' ) ); ?>" >
                <option value="default" <?php echo($count == 'default')? 'selected' : ''; ?>>
                    Default
                </option>

                <option value="hidden" <?php echo($count == 'hidden')? 'selected' : ''; ?>>
                    Hidden
                </option>
            </select>
        </p>

		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
        $instance = array();
        
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';

        $instance['channel'] = ( ! empty( $new_instance['channel'] ) ) ? sanitize_text_field( $new_instance['channel'] ) : '';

        $instance['layout'] = ( ! empty( $new_instance['layout'] ) ) ? sanitize_text_field( $new_instance['layout'] ) : '';

        $instance['count'] = ( ! empty( $new_instance['count'] ) ) ? sanitize_text_field( $new_instance['count'] ) : '';

		return $instance;
	}

} // class Foo_Widget