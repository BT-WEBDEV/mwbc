<?php

$output = '';
foreach ( $this->widget_fields as $widget_field ) {
    $default = '';
    if ( isset($widget_field['default']) ) {
        $default = $widget_field['default'];
    }
    $widget_value = ! empty( $instance[$widget_field['id']] ) ? $instance[$widget_field['id']] : esc_html__( $default, 'textdomain' );
    switch ( $widget_field['type'] ) {
        case 'textarea':
            $output .= '<p>';
            $output .= '<label for="'.esc_attr( $this->get_field_id( $widget_field['id'] ) ).'">'.esc_attr( $widget_field['label'], 'textdomain' ).':</label> ';
            $output .= '<textarea class="widefat" id="'.esc_attr( $this->get_field_id( $widget_field['id'] ) ).'" name="'.esc_attr( $this->get_field_name( $widget_field['id'] ) ).'" rows="6" cols="6" value="'.esc_attr( $widget_value ).'">'.$widget_value.'</textarea>';
            $output .= '</p>';
            break;
        case 'header':
            $output .= '<hr>';
            $output .= '<h4 style="margin: 0px;">';
            $output .= esc_attr( $widget_field['label'], 'textdomain' ).':';
            $output .= '</h4>';
            break;
        case 'media':
            $media_url = '';
            if ($widget_value) {
                $media_url = wp_get_attachment_url($widget_value);
            }
            $output .= '<p>';
            $output .= '<label for="'.esc_attr( $this->get_field_id( $widget_field['id'] ) ).'">'.esc_attr( $widget_field['label'], 'textdomain' ).':</label> ';
            $output .= '<input style="display:none;" class="widefat" id="'.esc_attr( $this->get_field_id( $widget_field['id'] ) ).'" name="'.esc_attr( $this->get_field_name( $widget_field['id'] ) ).'" type="'.$widget_field['type'].'" value="'.$widget_value.'">';
            $output .= '<span id="preview'.esc_attr( $this->get_field_id( $widget_field['id'] ) ).'" style="margin-right:10px;border:2px solid #eee;display:block;width: 100px;height:100px;background-image:url('.$media_url.');background-size:contain;background-repeat:no-repeat;"></span>';
            $output .= '<button id="'.$this->get_field_id( $widget_field['id'] ).'" class="button select-media custommedia">Add Media</button>';
            $output .= '<input style="width: 19%;" class="button remove-media" id="buttonremove" name="buttonremove" type="button" value="Clear" />';
            $output .= '</p>';
            break;
        case 'checkbox':
            $output .= '<p>';
            $output .= '<input class="checkbox" type="checkbox" '.checked( $widget_value, true, false ).' id="'.esc_attr( $this->get_field_id( $widget_field['id'] ) ).'" name="'.esc_attr( $this->get_field_name( $widget_field['id'] ) ).'" value="1">';
            $output .= '<label for="'.esc_attr( $this->get_field_id( $widget_field['id'] ) ).'">'.esc_attr( $widget_field['label'], 'textdomain' ).'</label>';
            $output .= '</p>';
            break;
        case 'select':
            $output .= '<p>';
            $output .= '<label for="'.esc_attr( $this->get_field_id( $widget_field['id'] ) ).'">'.esc_attr( $widget_field['label'], 'textdomain' ).':</label> ';
            $output .= '<select id="'.esc_attr( $this->get_field_id( $widget_field['id'] ) ).'" name="'.esc_attr( $this->get_field_name( $widget_field['id'] ) ).'">';
            foreach ($widget_field['options'] as $option) {
                if ($widget_value == $option) {
                    $output .= '<option value="'.$option.'" selected>'.$option.'</option>';
                } else {
                    $output .= '<option value="'.$option.'">'.$option.'</option>';
                }
            }
            $output .= '</select>';
            $output .= '</p>';
            break;
        default:
            $output .= '<p>';
            $output .= '<label for="'.esc_attr( $this->get_field_id( $widget_field['id'] ) ).'">'.esc_attr( $widget_field['label'], 'textdomain' ).':</label> ';
            $output .= '<input class="widefat" id="'.esc_attr( $this->get_field_id( $widget_field['id'] ) ).'" name="'.esc_attr( $this->get_field_name( $widget_field['id'] ) ).'" type="'.$widget_field['type'].'" value="'.esc_attr( $widget_value ).'">';
            $output .= '</p>';
    }
}
echo $output;

?>