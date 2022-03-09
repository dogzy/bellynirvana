<?php




function jr_get_custom_meta(){
	global $post;


	$delicious_meta = get_post_meta($post->ID, 'delicious_recipes_metadata', true);
	$delicious_meta = unserialize($delicious_meta[0]);


	$import_ingredients = get_post_meta($post->ID, '_import_ingredients', true);
	$ingredients = explode('|', $import_ingredients);

	$import_steps = get_post_meta($post->ID, '_import_steps', true);
	$steps = explode('|', $import_steps);

	$import_steps_images = get_post_meta($post->ID, '_import_steps_images', true);
	$steps_images = explode('|', $import_steps_images);

	$steps_images_array = array();

	foreach ($steps as $key => $value) {
		$steps_images_array[] = array(
			'description' => $value,
			'image' => $steps_images[$key],
		);
		# code...
	}
	echo '<h1>The steps data</h1>';
	echo '<pre>';
	print_r($steps_images_array);
	echo '</pre>';

	echo '<h1>The ingradients data</h1>';
	echo '<pre>';
	print_r($ingredients);
	echo '</pre>';

	echo '<h1>delicious_meta Meta is</h1>';
	echo '<pre>';
	print_r($delicious_meta);
	echo '</pre>';

}

add_action('wp_head', 'jr_get_custom_meta');