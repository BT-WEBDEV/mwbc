<?php
// Adds widget: Advisory Board MWBC
class advisory_board_mwbc_widget extends WP_Widget {

	function __construct() {
		parent::__construct(
			'advisory_board_mwbc_widget',
			esc_html__( 'Advisory Board (MWBC)', 'textdomain' ),
			array( 'description' => esc_html__( 'This Widget Adds Advisory Board List', 'textdomain' ), ) // Args
		);
	}

	private $widget_fields = array(
		array(
			'label' => 'Description',
			'id' => 'advisory_board_description_mwbc',
			'type' => 'textarea',
        ),
        array(
			'label' => 'Total',
			'id' => 'total_advisory_board_mwbc',
			'type' => 'number',
		)		
	);

	public function widget( $args, $instance ) {
		echo $args['before_widget'];

        require get_template_directory() . '/widgets/views/advisory-board-view.php';

		echo $args['after_widget'];
	}

    public function field_generator( $instance ) {
        require get_template_directory() . '/widgets/widget-generator.php';
    }

	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( '', 'textdomain' );
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title:', 'textdomain' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<?php
		$this->field_generator( $instance );
	}

	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		foreach ( $this->widget_fields as $widget_field ) {
			switch ( $widget_field['type'] ) {
				default:
					$instance[$widget_field['id']] = ( ! empty( $new_instance[$widget_field['id']] ) ) ? strip_tags( $new_instance[$widget_field['id']] ) : '';
			}
		}
		return $instance;
	}
}

function register_advisory_board_mwbc_widget() {
	register_widget( 'advisory_board_mwbc_widget' );
}
add_action( 'widgets_init', 'register_advisory_board_mwbc_widget' );
