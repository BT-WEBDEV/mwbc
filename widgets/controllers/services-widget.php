<?php
// Adds widget: Services MWBC
class services_mwbc_widget extends WP_Widget {

	function __construct() {
		parent::__construct(
			'services_mwbc_widget',
			esc_html__( 'Services (MWBC)', 'textdomain' ),
			array( 'description' => esc_html__( 'This Widget Adds Services List', 'textdomain' ), ) // Args
		);
	}

	private $widget_fields = array(
		array(
			'label' => 'Color',
			'id' => 'color_select',
			'type' => 'select',
			'options' => array(
				'Blue',
				'Red',
			),
		),
		array(
			'label' => 'Icon 1',
			'id' => 'icon_1_services_mwbc',
			'type' => 'media',
		),
		array(
			'label' => 'Title 1',
			'id' => 'title_1_services_mwbc',
			'type' => 'text',
		),
		array(
			'label' => 'Description 1',
			'id' => 'description_1_mwbc',
			'type' => 'textarea',
		),
		array(
			'label' => 'Link 1',
			'id' => 'link_1_services_mwbc',
			'type' => 'url',
		),
		array(
			'label' => 'Icon 2',
			'id' => 'icon_2_services_mwbc',
			'type' => 'media',
		),
		array(
			'label' => 'Title 2',
			'id' => 'title_2_services_mwbc',
			'type' => 'text',
		),
		array(
			'label' => 'Description 2',
			'id' => 'description_2_mwbc',
			'type' => 'textarea',
		),
		array(
			'label' => 'Link 2',
			'id' => 'link_2_services_mwbc',
			'type' => 'url',
		),
		array(
			'label' => 'Icon 3',
			'id' => 'icon_3_services_mwbc',
			'type' => 'media',
		),
		array(
			'label' => 'Title 3',
			'id' => 'title_3_services_mwbc',
			'type' => 'text',
		),
		array(
			'label' => 'Description 3',
			'id' => 'description_3_mwbc',
			'type' => 'textarea',
		),
		array(
			'label' => 'Link 3',
			'id' => 'link_3_services_mwbc',
			'type' => 'url',
		)
	);

	public function widget( $args, $instance ) {
		echo $args['before_widget'];

        require get_template_directory() . '/widgets/views/services-view.php';

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

function register_services_mwbc_widget() {
	register_widget( 'services_mwbc_widget' );
}
add_action( 'widgets_init', 'register_services_mwbc_widget' );
