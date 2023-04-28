<?php
/**
 * @link https://developer.wordpress.org/themes/functionality/widgets/
 */

namespace Cradle;

/**
 * @link https://developer.wordpress.org/reference/classes/wp_widget/
 */
class Widget extends \WP_Widget {
	private $options = [];
	private $template = '';

	public function __construct($id_base, $name, $widget_options, $options, $template) {
		$this->options = array_map(function ($option) {
			return new WidgetOption(
				$option['name'],
				$option['type'],
				$option['description'],
				$option['default_value']
			);
		}, $options);

		$this->template = $template;

		parent::__construct($id_base, $name, $widget_options);
	}

	public function widget($args, $instance) {
		foreach ($this->options as $option) {
			$args[$option->name] = $option->get_value($instance);
		}

		echo $args['before_widget'];
		get_widget($this->template, $args);
		echo $args['after_widget'];
	}

	public function form($instance) {
		foreach ($this->options as $option) {
			$option->form_field($instance, $this);
		}
	}

	public function update($new_instance, $old_instance) {
		$instance = $old_instance;

		foreach ($this->options as $option) {
			$instance[$option->name] = $option->sanitize($new_instance[$option->name] ?? null);
		}

		return $instance;
	}
}

class WidgetOption {
	public $name;
	public $type = 'text';
	public $description = '';
	public $default_value = '';

	public function __construct($name, $type, $description, $default_value) {
		$this->name = $name;
		$this->type = $type;
		$this->description = $description;
		$this->default_value = $default_value;
	}

	public function get_value($instance) {
		return $instance[$this->name] ?? $this->default_value;
	}

	public function sanitize($value) {
		switch ($this->type) {
			case 'text':
				return sanitize_text_field($value);
			case 'checkbox':
				return !empty($value) ? 1 : 0;
			default:
				return null;
		}
	}

	public function form_field($instance, $widget) {
		$id = $widget->get_field_id($this->name);
		$name = $widget->get_field_name($this->name);
		$value = $this->get_value($instance);

		switch ($this->type) {
			case 'text':
				$this->form_field_text($id, $name, $value);
				break;
			case 'checkbox':
				$this->form_field_checkbox($id, $name, $value);
				break;
		}
	}

	private function form_label($id) {
		?>
		<label for="<?php echo esc_attr($id); ?>">
			<?php echo esc_html($this->description); ?>
		</label>
		<?php
	}

	private function form_field_text($id, $name, $value) {
		?>
		<p>
			<?php $this->form_label($id); ?>
			<input
				type="text"
				class="widefat"
				id="<?php echo esc_attr($id); ?>"
				name="<?php echo esc_attr($name); ?>"
				value="<?php echo esc_attr($value); ?>"
			>
		</p>
		<?php
	}

	private function form_field_checkbox($id, $name, $value) {
		?>
		<p>
			<input
				type="checkbox"
				class="checkbox"
				id="<?php echo esc_attr($id); ?>"
				name="<?php echo esc_attr($name); ?>"
				<?php checked((bool) $value); ?>
			>
			<?php $this->form_label($id); ?>
		</p>
		<?php
	}
}
