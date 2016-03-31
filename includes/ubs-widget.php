<?php

/**
 * Add ubs_widget.
 */
class UBS_Widget extends WP_Widget {

	/**
	* Register widget with WordPress.
	*
	**/
	function __construct() {
		parent::__construct(
			'ubs_widget', // Base ID
			__( 'Background Switcher', 'ubs' ), // Name
			array( 'description' => __( 'Let your users select the background color and image', 'ubs' ) ) // Args
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
		$title = apply_filters( 'widget_title', $instance['title'] );

		echo $args['before_widget'];
		if ( ! empty( $title ) ) {
			echo $args['before_title'] . $title . $args['after_title'];
		}
		echo esc_attr( $instance['textabove'] );
		?>
		<div class="ubs-dropdown">
			<select id="bgswitcher">
				<option value="">Default</option>
				<option value="one">One</option>
				<option value="two">Two</option>
			</select>
		</div>
		<?php

		echo $args['after_widget'];
	}

	/**
	* Back-end widget form.
	*
	* @see WP_Widget::form()
	*
	* @param array $instance Previously saved values from database.
	*/
	public function form( $instance ) {
		if ( isset( $instance['title'] ) ) {
			$title = $instance['title'];
		} else {
			$title = __( 'Background Switcher', 'ubs' );
		}
		if ( isset( $instance['textabove'] ) ) {
			$textabove = $instance['textabove'];
		} else {
			$textabove = __( 'Select background', 'ubs' );
		}
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		<input class="widefat" id="<?php echo $this->get_field_id( 'textabove' ); ?>" name="<?php echo $this->get_field_name( 'textabove' ); ?>" type="text" value="<?php echo esc_attr( $textabove ); ?>">
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
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['textabove'] = ( ! empty( $new_instance['textabove'] ) ) ? strip_tags( $new_instance['textabove'] ) : '';

		return $instance;
	}
}

add_action( 'widgets_init', create_function( '', "register_widget( 'UBS_Widget' );" ) );
