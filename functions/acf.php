<?php

	if( function_exists('acf_add_local_field_group') ):

		// Social Menu Icons
		acf_add_local_field_group(array(
			'key' => 'aimhigher_social_icons',
			'title' => 'Social Menu Icons',
			'fields' => array(
				array(
					'key' => 'aimhigher_social_icons_field_social_icon',
					'label' => 'Icon',
					'name' => 'icon',
					'type' => 'image',
					'required' => 1,
					'return_format' => 'url',
					'preview_size' => 'thumbnail',
					'library' => 'all',
					'mime_types' => 'svg',
				),
			),
			'location' => array(
				array(
					array(
						'param' => 'nav_menu_item',
						'operator' => '==',
						'value' => 'location/social_menu',
					),
				),
			),
			'label_placement' => 'top',
			'instruction_placement' => 'label',
			'active' => true,
		));

		// Options - Business Info
		acf_add_local_field_group(array(
			'key' => 'aimhigher_business_info',
			'title' => 'Business Info',
			'fields' => array(
				array(
					'key' => 'aimhigher_business_info_field_phone',
					'label' => 'Phone Number',
					'name' => 'phone',
					'type' => 'text',
					'wrapper' => array(
						'width' => '51',
						'class' => '',
						'id' => '',
					),
				),
				array(
					'key' => 'aimhigher_business_info_field_email',
					'label' => 'Email Address',
					'name' => 'email',
					'type' => 'text',
					'wrapper' => array(
						'width' => '51',
						'class' => '',
						'id' => '',
					),
				),
				array(
					'key' => 'aimhigher_business_info_field_address',
					'label' => 'Address',
					'name' => 'address',
					'type' => 'group',
					'wrapper' => array(
						'width' => '51',
						'class' => '',
						'id' => '',
					),
					'layout' => 'block',
					'sub_fields' => array(
						array(
							'key' => 'aimhigher_business_info_field_line_1',
							'label' => 'Address Line 1',
							'name' => 'line_1',
							'type' => 'text',
						),
						array(
							'key' => 'aimhigher_business_info_field_line_2',
							'label' => 'Address Line 2',
							'name' => 'line_2',
							'type' => 'text',
						),
						array(
							'key' => 'aimhigher_business_info_field_suburb',
							'label' => 'Suburb',
							'name' => 'suburb',
							'type' => 'text',
						),
						array(
							'key' => 'aimhigher_business_info_field_state',
							'label' => 'State',
							'name' => 'state',
							'type' => 'text',
						),
						array(
							'key' => 'aimhigher_business_info_field_post_code',
							'label' => 'Post Code',
							'name' => 'post_code',
							'type' => 'text',
						),
					),
				),
			),
			'location' => array(
				array(
					array(
						'param' => 'options_page',
						'operator' => '==',
						'value' => 'business-details',
					),
				),
			),
			'style' => 'seamless',
			'label_placement' => 'top',
			'instruction_placement' => 'label',
			'active' => true,
		));

	endif;
    
?>