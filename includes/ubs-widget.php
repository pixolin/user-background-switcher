<?php

add_action( 'widgets_init', 'ubs_register_widget' );

function ubs_register_widget() {
	register_widget( 'UBS_Widget' );
}

class UBS_Widget extends WP_Widget {

	function __construct() {
		parent::__construct(
			'ubs_widget', // Base ID
			'User Background Switcher', // Name
			array( 'description' => __( 'Let your users select the background color and image', 'ubs' ) ) // Args
		);
	}

	/**
	* Front-end display of widget.
	*/
	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance['title'] );
		echo $args['before_widget'];
		if ( ! empty( $title ) ) {
			echo $args['before_title'] . $title . $args['after_title'];
		}

		if ( ! empty( $instance['textabove'] ) ) {
			echo '<p>'.esc_attr( $instance['textabove'] ).'</p>';
		}

		echo $this->ubs_query();

		echo $args['after_widget'];
	}

	/*
	* Query to add options to dropdown
	*/
	public function ubs_query() {
		$args = array(
			'post_type' => 'bgswitch',
			'posts_per_page' => -1,
			'order' => 'ASC',
		);
		$bgs_query = get_posts( $args );

		$html = '<div class="ubs-dropdown"><select id="bgswitcher">';
		$html .= '<option value="">---</option>';

		foreach ( $bgs_query as $entry ) {
			$html .= '<option value="'.$entry->post_title.'">'. $entry->post_title . '</option>';
		}

		$html .= '</select></div><!-- .ubs-dropdown-->';
		return $html;
	}

	/**
	* Back-end widget form.
	*/
	public function form( $instance ) {
		if ( isset( $instance['title'] ) ) {
			$title = $instance['title'];
		} else {
			$title = __( 'User Background Switcher', 'ubs' );
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
		<label for="<?php echo $this->get_field_id( 'textabove' ); ?>"><?php _e( 'Text above dropdown menu:', 'ubs' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'textabove' ); ?>" name="<?php echo $this->get_field_name( 'textabove' ); ?>" type="text" value="<?php echo esc_attr( $textabove ); ?>">
		</p>
		<?php
	}

	/**
	* Sanitize widget form values as they are saved.
	*/
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['textabove'] = ( ! empty( $new_instance['textabove'] ) ) ? strip_tags( $new_instance['textabove'] ) : '';

		return $instance;
	}
}
