<?php
// Adds widget: Image/Text 2 Col MWBC
class image_text_2_col_mwbc_widget extends WP_Widget {

	function __construct() {
		parent::__construct(
			'image_text_2_col_mwbc_widget',
			esc_html__( 'Image/Text 2 Col (MWBC)', 'textdomain' ),
			array( 'description' => esc_html__( 'This Widget Adds Image Text 2 Columns', 'textdomain' ), ) // Args
		);
		add_action( 'admin_footer', array( $this, 'media_fields' ) );
		add_action( 'customize_controls_print_footer_scripts', array( $this, 'media_fields' ) );
	}

	private $widget_fields = array(
		array(
			'label' => 'Description',
			'id' => 'Description_image_text_2_col_mwbc',
			'type' => 'textarea',
		),
		array(
			'label' => 'Image',
			'id' => 'Image_image_text_2_col_mwbc',
			'type' => 'media',
		),
		array(
			'label' => 'Reverse Position',
			'id' => 'checkbox_image_text_2_col_mwbc',
			'type' => 'checkbox',
		),
		array(
			'label' => 'Link',
			'id' => 'Link_image_text_2_col_mwbc',
			'type' => 'url',
		),
		array(
			'label' => 'New Window',
			'id' => 'New_window_image_text_2_col_mwbc',
			'type' => 'checkbox',
		),
		
	);

	public function widget( $args, $instance ) {
		echo $args['before_widget'];

        require get_template_directory() . '/widgets/views/img-text-2-col-view.php';

		echo $args['after_widget'];
	}

	public function media_fields() {
		require get_template_directory() . '/widgets/media-generator.php';
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

function register_image_text_2_col_mwbc_widget() {
	register_widget( 'image_text_2_col_mwbc_widget' );
}
add_action( 'widgets_init', 'register_image_text_2_col_mwbc_widget' );
