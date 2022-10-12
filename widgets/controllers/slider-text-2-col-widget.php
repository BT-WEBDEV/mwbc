<?php
// Adds widget: Slider/Text 2 Col MWBC
class slider_text_2_col_widget extends WP_Widget {

	function __construct() {
		parent::__construct(
			'slider_text_2_col_widget',
			esc_html__( 'Slider/Text 2 Col (MWBC)', 'textdomain' ),
			array( 'description' => esc_html__( 'This Widget Adds Slider/Text 2 Columns', 'textdomain' ), ) // Args
		);
	}

	private $widget_fields = array(
		array(
			'label' => 'Description',
			'id' => 'Description_slider_text_2_col',
			'type' => 'textarea',
		),
		array(
			'label' => 'Slider ID',
			'id' => 'Slider_ID_slider_text_2_col',
			'type' => 'Textfield',
		),
		array(
			'label' => 'Link',
			'id' => 'Link_slider_text_2_col',
			'type' => 'url',
		),
		array(
			'label' => 'New Window',
			'id' => 'New_window_slider_text_2_col',
			'type' => 'checkbox',
		),
	);

	public function widget( $args, $instance ) {
		echo $args['before_widget'];

        require get_template_directory() . '/widgets/views/slider-text-2-col-view.php';

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

function register_slider_text_2_col_widget() {
	register_widget( 'slider_text_2_col_widget' );
}
add_action( 'widgets_init', 'register_slider_text_2_col_widget' );
