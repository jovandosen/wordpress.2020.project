<?php

class ExampleWidget extends WP_Widget
{
	public function __construct()
	{
		parent::__construct('example-widget', 'Example Widget');

		add_action('widgets_init', function(){
			register_widget('ExampleWidget');
		});
	}

	public $args = array(
        'before_title'  => '<h4 class="widgettitle">',
        'after_title'   => '</h4>',
        'before_widget' => '<div class="widget-wrap">',
        'after_widget'  => '</div></div>'
    );

    public function widget($args, $instance)
    {
    	echo $args['before_widget'];

    	if(!empty($instance['foo'])){
    		echo $args['before_title'] . $instance['foo'] . $args['after_title'];
    	}

    	echo $args['after_widget'];
    }

    public function form($instance)
    {
    	$foo = !empty($instance['foo']) ? $instance['foo'] : esc_html__('', 'example');
    	?>
    	<p>
    		<label for="<?php echo esc_attr( $this->get_field_id( 'foo' ) ); ?>"><?php echo esc_html__( 'Foo:', 'example' ); ?></label>
    		<input class="widefat" type="text" name="<?php echo esc_attr( $this->get_field_name( 'foo' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'foo' ) ); ?>" value="<?php echo esc_attr($foo); ?>">
    	</p>
    	<?php
    }

    public function update($new_instance, $old_instance)
    {
    	$instance = array();

    	$instance['foo'] = ( !empty($new_instance['foo']) ) ? strip_tags($new_instance['foo']) : '';

    	return $instance;
    }
}