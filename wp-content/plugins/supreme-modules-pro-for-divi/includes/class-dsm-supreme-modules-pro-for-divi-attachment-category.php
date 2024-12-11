<?php
/**
 * Register the custom divi supreme attachment category taxonomy.
 *
 * @link       https://divisupreme.com
 *
 * @package    Dsm_Supreme_Modules_Pro_For_Divi
 * @subpackage Dsm_Supreme_Modules_Pro_For_Divi/includes
 */

/**
 * Register the custom divi supreme attachment category taxonomy.
 *
 * @link       https://divisupreme.com
 *
 * @package    Dsm_Supreme_Modules_Pro_For_Divi
 * @subpackage Dsm_Supreme_Modules_Pro_For_Divi/includes
 */
class Dsm_Supreme_Modules_Pro_For_Divi_Attachment_Category {

	/**
	 * Taxonomy slug.
	 *
	 * @var string
	 */
	private static $slug = 'dsm-attachment-category';

	/**
	 * Constructor.
	 *
	 * @return void
	 */
	public function __construct() {
		add_action( 'init', array( $this, 'register_taxonomy' ), 1 );
		add_action( 'wp_enqueue_media', array( $this, 'load_assets' ), 10 );
		add_filter( 'attachment_fields_to_edit', array( $this, 'render_custom_selectbox' ), 10, 2 );
		add_filter( 'attachment_fields_to_save', array( $this, 'handle_store' ), 10, 2 );
	}

	/**
	 * Loads necessary assets.
	 *
	 * @return void
	 */
	public function load_assets() {
		wp_enqueue_script( 'dsm-select-two', plugins_url( '/public/js/select2.min.js', __DIR__ ), array(), DSM_PRO_VERSION, true );
		wp_enqueue_style( 'dsm-select-two', plugins_url( '/public/css/select2.css', __DIR__ ), array(), DSM_PRO_VERSION, 'all' );
	}

	/**
	 * Handles storing the new attachment field.
	 *
	 * @param \WP_Post $post - Post.
	 * @param array    $attachment_data - Attachment data.
	 *
	 * @return void
	 */
	public function handle_store( $post, $attachment_data ) {
		if ( isset( $attachment_data['dsm_attachment_categories'] ) ) {
			$term_ids = explode( ',', $attachment_data['dsm_attachment_categories'] );
			$term_ids = array_map( 'intval', $term_ids ); // Ensure all IDs are integers
			wp_set_object_terms( $post['ID'], $term_ids, self::$slug );
		}
		return $post;
	}

	/**
	 * Renders the custom control view.
	 *
	 * @param \WP_Post $post - Post.
	 *
	 * @return string - View Content.
	 */
	public function render_terms_control( $post ) {

		$terms = get_terms(
			array(
				'taxonomy'   => static::$slug,
				'hide_empty' => false,
			)
		);

		if ( is_wp_error( $terms ) || ! is_array( $terms ) ) {
			return '';
		}

		// Start output buffering
		ob_start();

		?>

		<select style="width: 100%;" class="dsm-attachment-categories-select" name="dsm_attachment_categories[]" multiple="multiple">
			<?php foreach ( $terms as $term ) : ?>
				<option 
					<?php echo has_term( $term->term_id, self::$slug, $post->ID ) ? 'selected' : ''; ?>
					value="<?php echo esc_attr( $term->slug ); ?>">
					<?php echo esc_html( $term->name ); ?>
				</option>
			<?php endforeach; ?>
		</select>

		<script>
			jQuery(document).ready(function() {

				const $ = jQuery;

				$('form.compat-item').each(function() {
					const actualTermControlRoot = $('.compat-field-dsm-attachment-category');
					const actualTermControl 	= actualTermControlRoot.find('input[type="text"]');
					
					const newTermSelectbox 	= $('select.dsm-attachment-categories-select');
	
					newTermSelectbox.select2();
				
					newTermSelectbox.on('change', function() {
						const newValue = $(this).val();
						actualTermControl.val(newValue.join(','));
					})
	
					actualTermControlRoot.hide();
				})
			})
		</script>

		<?php

		// End output buffering and return the buffer content
		$content = ob_get_clean();

		return $content;
	}

	/**
	 * Renders a custom control in the core media library modal to select attachment terms.
	 */
	public function render_custom_selectbox( $fields, $post ) {

		$fields['dsm_attachment_categories'] = array(
			'label' => __( 'Attachment Category - Divi Supreme', 'dsm-supreme-modules-pro-for-divi' ),
			'input' => 'html',
			'html'  => $this->render_terms_control( $post ),
		);

		return $fields;
	}

	/**
	 * Registers the taxonomy.
	 */
	public function register_taxonomy() {

		$labels = array(
			'name'              => __( 'Attachment Category - Divi Supreme', 'dsm-supreme-modules-pro-for-divi' ),
			'singular_name'     => __( 'Attachment Category - Divi Supreme', 'dsm-supreme-modules-pro-for-divi' ),
			'search_items'      => __( 'Search Categories', 'dsm-supreme-modules-pro-for-divi' ),
			'all_items'         => __( 'All Categories', 'dsm-supreme-modules-pro-for-divi' ),
			'parent_item'       => __( 'Parent Category', 'dsm-supreme-modules-pro-for-divi' ),
			'parent_item_colon' => __( 'Parent Category:', 'dsm-supreme-modules-pro-for-divi' ),
			'edit_item'         => __( 'Edit Category', 'dsm-supreme-modules-pro-for-divi' ),
			'update_item'       => __( 'Update Category', 'dsm-supreme-modules-pro-for-divi' ),
			'add_new_item'      => __( 'Add New Category', 'dsm-supreme-modules-pro-for-divi' ),
			'new_item_name'     => __( 'New Category Name', 'dsm-supreme-modules-pro-for-divi' ),
			'menu_name'         => __( 'Categories', 'dsm-supreme-modules-pro-for-divi' ),
		);

		$args = array(
			'hierarchical'          => true,
			'labels'                => $labels,
			'show_ui'               => true,
			'show_admin_column'     => true,
			'query_var'             => true,
			'update_count_callback' => '_update_generic_term_count',
			'rewrite'               => array( 'slug' => 'dsm-attachment-category' ),
		);

		register_taxonomy( self::$slug, array( 'attachment' ), $args );
	}
}

