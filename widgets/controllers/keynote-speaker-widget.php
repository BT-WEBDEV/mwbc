<?php
// Adds widget: Keynote Speaker MWBC
class keynote_speaker_mwbc_widget extends WP_Widget {

	function __construct() {
		parent::__construct(
			'keynote_speaker_mwbc_widget',
			esc_html__( 'Keynote Speaker (MWBC)', 'textdomain' ),
			array( 'description' => esc_html__( 'This Widget Adds Keynote Speaker List', 'textdomain' ), ) // Args
		);
	}

	private $widget_fields = array(
        array(
			'label' => 'Name',
			'id' => 'keynote_speaker_name_mwbc',
			'type' => 'text',
		),
		array(
			'label' => 'Description',
			'id' => 'keynote_speaker_description_mwbc',
			'type' => 'textarea',
        ),
        array(
			'label' => 'Media',
			'id' => 'keynote_speaker_media_mwbc',
			'type' => 'media',
		)	
	);

	public function widget( $args, $instance ) {
		echo $args['before_widget'];

        require get_template_directory() . '/widgets/views/keynote-speaker-view.php';

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

function register_keynote_speaker_mwbc_widget() {
	register_widget( 'keynote_speaker_mwbc_widget' );
}
add_action( 'widgets_init', 'register_keynote_speaker_mwbc_widget' );
