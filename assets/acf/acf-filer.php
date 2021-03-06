<?php
if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_5d9c408ef1f9c',
	'title' => 'Simple Theme filer',
	'fields' => array(
		array(
			'key' => 'field_5d9c40ae8e176',
			'label' => 'Filer til download',
			'name' => 'filer_til_download',
			'type' => 'repeater',
			'instructions' => 'Offentlige filer (kan ses UDEN login!)',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'collapsed' => '',
			'min' => 0,
			'max' => 0,
			'layout' => 'block',
			'button_label' => 'Ny fil',
			'sub_fields' => array(
				array(
					'key' => 'field_5f6c54995bcf0',
					'label' => 'Overskrift',
					'name' => 'filer_overskrift',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
				array(
					'key' => 'field_5f6c54ad5bcf1',
					'label' => 'Filer',
					'name' => 'filer_filer',
					'type' => 'repeater',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'collapsed' => '',
					'min' => 0,
					'max' => 0,
					'layout' => 'table',
					'button_label' => '',
					'sub_fields' => array(
						array(
							'key' => 'field_5f6c54cc5bcf2',
							'label' => 'File',
							'name' => 'sub_file',
							'type' => 'file',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'return_format' => 'array',
							'library' => 'all',
							'min_size' => '',
							'max_size' => '',
							'mime_types' => '',
						),
					),
				),
			),
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'post',
			),
		),
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'page',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'field',
	'hide_on_screen' => '',
	'active' => true,
	'description' => 'Offentlige filer',
));

endif;