<?php
/*
Plugin Name: Beopen Shortcodes (for Nueva Theme)
Plugin URI: 
Description: This plugin contains all the shortcodes featured in Nueva Theme
Version: 1.0
Author: Beopen
Author URI: http://www.beopenthemes.com

Copyright (c) 2015 Beopen

Permission is hereby granted, free of charge, to any person obtaining
a copy of this software and associated documentation files (the
"Software"), to deal in the Software without restriction, including
without limitation the rights to use, copy, modify, merge, publish,
distribute, sublicense, and/or sell copies of the Software, and to
permit persons to whom the Software is furnished to do so, subject to
the following conditions:

The above copyright notice and this permission notice shall be included
in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF
MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT.
IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY
CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT,
TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE
SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
*/


global $beopen_shortcodes;

class beopen_shortcodes {
	
	
	public function __construct() {
		
		global $pricing_table_columns;
		$pricing_table_columns = 0;
		
		add_filter('the_content', array($this, 'beopen_run_shortcode'), 7);
	
		add_filter( 'no_texturize_shortcodes', array($this, 'shortcodes_to_exempt_from_wptexturize' ));
		
		add_action('wp_ajax_insert-shortcodes', array($this, 'admin_insert_shortcodes'));
		
		/* Images, Video, Audio */

		wp_oembed_add_provider('http://www.slideshare.net/*/*', 'http://www.slideshare.net/api/oembed/2');

		wp_oembed_add_provider('http://instagr.am/*/*', 'http://api.instagram.com/oembed');
		wp_oembed_add_provider('http://www.instagram.com/*/*', 'http://api.instagram.com/oembed');
		wp_oembed_add_provider('http://instagram.com/*/*', 'http://api.instagram.com/oembed');
		
		
		add_shortcode('one_half', array($this, 'beopen_one_half'));
		add_shortcode('two_third', array($this, 'beopen_two_third'));
		add_shortcode('one_third', array($this, 'beopen_one_third'));
		add_shortcode('one_fourth', array($this, 'beopen_one_fourth'));

		add_shortcode('one_half_last', array($this, 'beopen_one_half_last'));
		add_shortcode('two_third_last', array($this, 'beopen_two_third_last'));
		add_shortcode('one_third_last', array($this, 'beopen_one_third_last'));
		add_shortcode('one_fourth_last', array($this, 'beopen_one_fourth_last'));	

		add_shortcode('button', array($this, 'beopen_button'));


		add_shortcode('tab', array($this, 'beopen_tab'));
		add_shortcode('tabs', array($this, 'beopen_tabs'));
		add_shortcode('accordion_toggle', array($this, 'beopen_accordion_toggle'));
		add_shortcode('accordion', array($this, 'beopen_accordion'));

		add_shortcode('toggle', array($this, 'beopen_toggle'));
		add_shortcode('code_toggle', array($this, 'beopen_toggle'));

		add_shortcode('message', array($this, 'beopen_message'));

		add_shortcode('tooltip', array($this, 'beopen_tooltip'));

		add_shortcode('highlight', array($this, 'beopen_highlight'));
		add_shortcode('divider', array($this, 'beopen_divider'));
		add_shortcode('listitem', array($this, 'beopen_listitem'));
		add_shortcode('list', array($this, 'beopen_list'));
		add_shortcode('dropcap', array($this, 'beopen_dropcap'));
		add_shortcode('vid', array($this, 'vid_sc'));
		add_shortcode('soundcloud', array($this, 'beopen_soundcloud'));
		add_shortcode('pricing_table', array($this, 'beopen_pricing_table'));
		add_shortcode('plan', array($this, 'beopen_plan'));

		add_shortcode('latest_posts', array($this, 'beopen_latest_posts'));
		add_shortcode('esc', array($this, 'escapeHTML'));

		add_shortcode('progressbar', array($this, 'beopen_progressbar'));	
		add_shortcode('twitter', array($this, 'beopen_twitter'));	
		add_shortcode('h1', array($this, 'beopen_h1'));	
		add_shortcode('h2', array($this, 'beopen_h2'));	
		add_shortcode('h3', array($this, 'beopen_h3'));
		add_shortcode('h4', array($this, 'beopen_h4'));		
		add_shortcode('h5', array($this, 'beopen_h5'));	
		add_shortcode('h6', array($this, 'beopen_h6'));
		add_shortcode('icon', array($this, 'beopen_icon'));

		
		//Add button to page
		add_action('media_buttons', array($this, 'admin_buttons'), 100);
		
		
		
	}
	
	
	
	
	function generate_shortcode_list() {
		global $beopen_shortcodes;
		$beopen_shortcodes = array(
			'Headings' => array(
				'h1' => array(
					'title' => 'Heading 1 with line',
					'options' => array(
						array(
							'label' => 'Title',
							'name' => 'content',
							'value' => '',
							'type' => 'text',
							'description' => ''
						),
					)
				),
				'h2' => array(
					'title' => 'Heading 2 with line',
					'options' => array(
						array(
							'label' => 'Title',
							'name' => 'content',
							'value' => '',
							'type' => 'text',
							'description' => ''
						),
					)
				),
				'h3' => array(
					'title' => 'Heading 3 with line',
					'options' => array(
						array(
							'label' => 'Title',
							'name' => 'content',
							'value' => '',
							'type' => 'text',
							'description' => ''
						),
					)
				),
				'h4' => array(
					'title' => 'Heading 4 with line',
					'options' => array(
						array(
							'label' => 'Title',
							'name' => 'content',
							'value' => '',
							'type' => 'text',
							'description' => ''
						),
					)
				),
				'h5' => array(
					'title' => 'Heading 5 with line',
					'options' => array(
						array(
							'label' => 'Title',
							'name' => 'content',
							'value' => '',
							'type' => 'text',
							'description' => ''
						),
					)
				),
				'h6' => array(
					'title' => 'Heading 6 with line',
					'options' => array(
						array(
							'label' => 'Title',
							'name' => 'content',
							'value' => '',
							'type' => 'text',
							'description' => ''
						),
					)
				),			
			),
			'Columns' => array(
				'one_half' => array(
					'title' => 'One Half Column (1/2)',
					'description' => '',
					'options' => array(
						array(
							'label' => 'Content',
							'name' => 'content',
							'value' => '',
							'type' => 'textarea',
							'description' => ''
						)
					)
				),
				'one_half_last' => array(
					'title' => 'One Half Column (1/2) for Last Column',
					'description' => '',
					'options' => array(
						array(
							'label' => 'Content',
							'name' => 'content',
							'value' => '',
							'type' => 'textarea',
							'description' => ''
						)
					)
				),
				'one_third' => array(
					'title' => 'One Third Column (1/3)',
					'description' => '',
					'options' => array(
						array(
							'label' => 'Content',
							'name' => 'content',
							'value' => '',
							'type' => 'textarea',
							'description' => ''
						)
					)
				),
				'one_third_last' => array(
					'title' => 'One Third Column (1/3) for Last Column',
					'description' => '',
					'options' => array(
						array(
							'label' => 'Content',
							'name' => 'content',
							'value' => '',
							'type' => 'textarea',
							'description' => ''
						)
					)
				),
				'two_third' => array(
					'title' => 'Two Thirds Column (2/3)',
					'description' => '',
					'options' => array(
						array(
							'label' => 'Content',
							'name' => 'content',
							'value' => '',
							'type' => 'textarea',
							'description' => ''
						)
					)
				),
				'two_third_last' => array(
					'title' => 'Two Thirds Column (2/3) for Last Column',
					'description' => '',
					'options' => array(
						array(
							'label' => 'Content',
							'name' => 'content',
							'value' => '',
							'type' => 'textarea',
							'description' => ''
						)
					)
				),
				'one_fourth' => array(
					'title' => 'One Fourth Column (1/4)',
					'description' => '',
					'options' => array(
						array(
							'label' => 'Content',
							'name' => 'content',
							'value' => '',
							'type' => 'textarea',
							'description' => ''
						)
					)
				),
				'one_fourth_last' => array(
					'title' => 'One Fourth Column (1/4) for Last Column',
					'description' => '',
					'options' => array(
						array(
							'label' => 'Content',
							'name' => 'content',
							'value' => '',
							'type' => 'textarea',
							'description' => ''
						)
					)
				),
			),
			'Elements' => array(
				'button' => array(
					'title' => 'Button',
					'options' => array(
						array(
							'label' => 'Content',
							'name' => 'content',
							'value' => '',
							'type' => 'text',
							'description' => ''
						),
						array(
							'label' => 'Link',
							'name' => 'link',
							'value' => '',
							'type' => 'text',
							'description' => ''
						),
						array(
							'label' => 'Target',
							'name' => 'target',
							'value' => '_self',
							'type' => array('_self' => 'Open link in same window (_self)', '_blank' => 'Open link in new window (_blank)'),
							'description' => ''
						),
						array(
							'label' => 'Size',
							'name' => 'size',
							'value' => 'medium',
							'type' => array('tiny' => 'Tiny', 'small' => 'Small', 'medium' => 'Medium', 'large' => 'Large', 'full_width' => 'Full Width'),
							'description' => ''
						),
						array(
							'label' => 'Align',
							'name' => 'align',
							'value' => '',
							'type' => array('' => 'Left', 'center' => 'Center', 'right' => 'Right'),
							'description' => ''
						),
						array(
							'label' => 'Type',
							'name' => 'type',
							'value' => '',
							'type' => array('' => 'Default', 'wireframe' => 'Wireframe'),
							'description' => ''
						),
					)
				),
				'icon' => array(
					'title' => 'Icon',
					'options' => array(
						array(
							'label' => 'Code',
							'name' => 'code',
							'value' => '',
							'type' => 'beopen_icons',
							'description' => ''
						),
						array(
							'label' => 'Size',
							'name' => 'size',
							'value' => '',
							'type' => 'number',
							'description' => 'Size in pixels'
						),
						array(
							'label' => 'Color',
							'name' => 'color',
							'value' => '',
							'type' => 'colorpicker',
							'description' => ''
						)
					)
				),
				'message' => array(
					'title' => 'Message Box',
					'options' => array(
						array(
							'label' => 'Type',
							'name' => 'type',
							'value' => '',
							'type' => array('info' => 'Info', 'success' => 'Success', 'warning' => 'Warning', 'error' => 'Error'),
							'description' => ''
						),
					)
				),
				'tooltip' => array(
					'title' => 'Tooltip',
					'options' => array(
						array(
							'label' => 'Title',
							'name' => 'title',
							'value' => '',
							'type' => 'text',
							'description' => ''
						),
						array(
							'label' => 'Content',
							'name' => 'content',
							'value' => '',
							'type' => 'textarea',
							'description' => ''
						),
					)
				),
				'highlight' => array(
					'title' => 'Highlight',
				),
				'divider' => array(
					'title' => 'Divider',
				),
				'list' => array(
					'title' => 'List',
					'subitems' => array(
						'listitem' => array(
							'title' => 'List item',
							'options' => array(
								array(
									'label' => 'Content',
									'name' => 'content',
									'value' => '',
									'type' => 'textarea',
									'description' => ''
								),
							)
						)
					),
				),
				'progressbar' => array(
					'title' => 'Progress bar',
					'options' => array(
						array(
							'label' => 'Percent (0-100)',
							'name' => 'percent',
							'value' => '50',
							'type' => 'number',
							'description' => ''
						),
						array(
							'label' => 'Text color',
							'name' => 'text_color',
							'value' => '',
							'type' => 'colorpicker',
							'description' => ''
						),
						array(
							'label' => 'Background color',
							'name' => 'background_color',
							'value' => '',
							'type' => 'colorpicker',
							'description' => ''
						),
					)
				),
				'pricing_table' => array(
					'title' => 'Pricing table',
					'options' => array(
						array(
							'label' => 'Columns',
							'name' => 'columns',
							'value' => '4',
							'type' => 'text',
							'description' => ''
						)
					),
					'subitems' => array(
						'plan' => array(
							'title' => 'Pricing table plan',
							'options' => array(
								array(
									'label' => 'Plan title',
									'name' => 'name',
									'value' => '',
									'type' => 'text',
									'description' => ''
								),
								array(
									'label' => 'Featured',
									'name' => 'featured',
									'value' => 'false',
									'type' => array('false' => 'False', 'true' => 'True'),
									'description' => ''
								),
								array(
									'label' => 'Color',
									'name' => 'color',
									'value' => '#1dafec',
									'type' => 'colorpicker',
									'description' => ''
								),
								array(
									'label' => 'Button title',
									'name' => 'linkname',
									'value' => '',
									'type' => 'text',
									'description' => ''
								),
								array(
									'label' => 'Button URL',
									'name' => 'link',
									'value' => '',
									'type' => 'text',
									'description' => ''
								),
								array(
									'label' => 'Price',
									'name' => 'price',
									'value' => '',
									'type' => 'text',
									'description' => 'e.g. $10, $30'
								),
								array(
									'label' => 'Period',
									'name' => 'period',
									'value' => '',
									'type' => 'text',
									'description' => 'eg. monthly, yearly'
								),
								array(
									'label' => 'Content',
									'name' => 'content',
									'value' => '<ul>
	<li><strong>Free</strong> Setup</li>
	<li><strong>20GB</strong> Storage</li>
	<li><strong>200GB</strong> Bandwith</li>
	<li><strong>25</strong> Products</li>
	<li><strong>Basic</strong> Stats</li>
	<li><strong>Basic</strong> Customization</li>
	</ul>',
									'type' => 'textarea',
									'description' => ''
								)
							)
						)
					),
				),
			),
			'Tabs, Accordion, Toggle' => array(
				'tabs' => array(
					'title' => 'Tabs',
					'subitems' => array(
						'tab' => array(
							'title' => 'Tab',
							'options' => array(
								array(
									'label' => 'Title',
									'name' => 'title',
									'value' => '',
									'type' => 'text',
									'description' => ''
								),
								array(
									'label' => 'Content',
									'name' => 'content',
									'value' => '',
									'type' => 'textarea',
									'description' => ''
								),
							)
						)
					),
				),
				'tabs' => array(
					'title' => 'Tabs',
					'subitems' => array(
						'tab' => array(
							'title' => 'Tab',
							'options' => array(
								array(
									'label' => 'Title',
									'name' => 'title',
									'value' => '',
									'type' => 'text',
									'description' => ''
								),
								array(
									'label' => 'Content',
									'name' => 'content',
									'value' => '',
									'type' => 'textarea',
									'description' => ''
								),
							)
						)
					),
				),
				'accordion' => array(
					'title' => 'Accordion',
					'subitems' => array(
						'accordion_toggle' => array(
							'title' => 'Accordion Toggle',
							'options' => array(
								array(
									'label' => 'Title',
									'name' => 'title',
									'value' => '',
									'type' => 'text',
									'description' => ''
								),
								array(
									'label' => 'Content',
									'name' => 'content',
									'value' => '',
									'type' => 'textarea',
									'description' => ''
								),
							)
						)
					),
				),
				'toggle' => array(
					'title' => 'Toggle',
					'options' => array(
						array(
							'label' => 'Title',
							'name' => 'title',
							'value' => '',
							'type' => 'text',
							'description' => ''
						),
						array(
							'label' => 'Content',
							'name' => 'content',
							'value' => '',
							'type' => 'textarea',
							'description' => ''
						),
					)
				),
			),
			'Social + Media' => array(
				'twitter' => array(
					'title' => 'Twitter',
					'options' => array(
						array(
							'label' => 'Twitter username',
							'name' => 'username',
							'value' => '',
							'type' => 'text',
							'description' => ''
						),
						array(
							'label' => 'Latest messages displayed',
							'name' => 'count',
							'value' => '3',
							'type' => 'text',
							'description' => ''
						),
					)
				),
				'soundcloud' => array(
					'title' => 'Soundcloud',
					'options' => array(
						array(
							'label' => 'Url',
							'name' => 'url',
							'value' => '',
							'type' => 'text',
							'description' => ''
						),
						array(
							'label' => 'Width',
							'name' => 'width',
							'value' => '100%',
							'type' => 'text',
							'description' => ''
						),
						array(
							'label' => 'Height',
							'name' => 'height',
							'value' => '81',
							'type' => 'text',
							'description' => ''
						),
						array(
							'label' => 'Comments',
							'name' => 'comments',
							'value' => 'true',
							'type' => array('false' => 'False', 'true' => 'True'),
							'description' => ''
						),
						array(
							'label' => 'Autoplay',
							'name' => 'autoplay',
							'value' => 'false',
							'type' => array('false' => 'False', 'true' => 'True'),
							'description' => ''
						),
						array(
							'label' => 'Color',
							'name' => 'color',
							'value' => '',
							'type' => 'colorpicker',
							'description' => ''
						),
					)
				),
			)
		);

		return $beopen_shortcodes;
	}

	
	public function admin_buttons() {
		$ajax_url = add_query_arg( 
			array( 
				'action' => 'insert-shortcodes'
			), 
			'admin-ajax.php'
		); 
	
		echo "<a class='button beopen-shortcode-generator' href='#' data-url='".$ajax_url."'><img src='".get_template_directory_uri()."/tinymce/beopen-shortcode.png' /> ". __('Beopen Shortcodes', 'beopen')."</a>";
	}
	
	
	
		/* Add Buttons to TinyMCE */	

	function admin_insert_shortcodes() {
		
		global $shortcode_tags;
		
		$beopen_shortcodes = $this->generate_shortcode_list();
		
		$shortcodes = array();
		
		foreach ($beopen_shortcodes as $beopen_shortcode_category => $beopen_shortcodes_item) {
			$shortcodes[] = '----' . $beopen_shortcode_category . '----';
			
			foreach ($beopen_shortcodes_item as $beopen_shortcode_code => $beopen_shortcode_item) {
				
				foreach ($shortcode_tags as $shortcode => $shortcode_function) {
						if ($shortcode == $beopen_shortcode_code) {
							$shortcodes[$shortcode] = '- ' . $beopen_shortcode_item['title'];
						}
				}

			}
		}

		echo '<div id="shortcode-selector">';
		beopen_show_field(array(
			'label' => 'Shortcode',
			'name' => 'shortcode',
			'id' => 'shortcode_choose',
			'default' => '',
			'type' => $shortcodes,
			'description' => ''
        ), false, false);
		echo '</div>';
		
		foreach ($beopen_shortcodes as $beopen_shortcode_category => $beopen_shortcodes_item) {
			
			foreach ($beopen_shortcodes_item as $beopen_shortcode_code => $beopen_shortcode_item) {
				echo '<div id="shortcode-selected-' . esc_attr($beopen_shortcode_code) . '" class="shortcode-item">';
				
				
				if (!empty($beopen_shortcode_item['options'])) {
					foreach ($beopen_shortcode_item['options'] as $option_key => $option) {					
						beopen_show_field($option, false, true, true);
					}
				}
				
				if (!empty($beopen_shortcode_item['subitems'])) {
					foreach ($beopen_shortcode_item['subitems'] as $subitem_name => $subitem) {
						
						echo '<a class="button add-beopen-shortcode-subitem" href="#">Add ' . esc_html($subitem['title']) . '</a>';
						
						echo '<div class="beopen-shortcode-subitem" data-shortcode="'.esc_attr($subitem_name).'">';
						
						echo '<h2>'.$subitem['title'].' <span></span></h2>';
						
						if (!empty($subitem['options'])) {
							foreach ($subitem['options'] as $option_key => $option) {
								beopen_show_field($option, false, true, true);
							}
						}
						
						echo '</div>';
					}
				}

				echo '</div>';
			}
		}
		
		echo '<a class="button insert-beopen-shortcode" href="#">Insert Shortcode</a>';

		die(); // this is required to return a proper result
	}

	
	/* COLUMNS */

	function beopen_one_half($atts, $content = null) {
		return '<div class="col-md-6"><p>' . do_shortcode($content) . '</p></div>';
	}
	
	function beopen_one_half_last($atts, $content = null) {
		return beopen_one_half($atts, $content) . '<div class="clear"></div>';
	}

	function beopen_two_third($atts, $content = null) {
		return '<div class="col-md-8"><p>' . do_shortcode($content) . '</p></div>';
	}
	
	function beopen_two_third_last($atts, $content = null) {
		return beopen_two_third($atts, $content) . '<div class="clear"></div>';
	}

	function beopen_one_third($atts, $content = null) {
		return '<div class="col-md-4"><p>' . do_shortcode($content) . '</p></div>';
	}
	
	function beopen_one_third_last($atts, $content = null) {
		return beopen_one_third($atts, $content) . '<div class="clear"></div>';
	}

	function beopen_one_fourth($atts, $content = null) {
		return '<div class="col-md-3"><p>' . do_shortcode($content) . '</p></div>';
	}
	
	function beopen_one_fourth_last($atts, $content = null) {
		return beopen_one_fourth($atts, $content) . '<div class="clear"></div>';
	}
	

	/* BUTTONS */

	function beopen_button($atts, $content = null) {
		extract(shortcode_atts(array('target' => '_self', 'type' => '', 'align' => '', 'color' => '', 'size' => 'medium', 'title' => '', 'link' => '#'), $atts));

		$htmlstart = '';
		$htmlend = '';
		
		$attributes = '';

		$aclass = array();

		if (in_array($size, array('tiny', 'small', 'medium', 'large', 'full_width'))) {
			$aclass[] = $size;
		} else
		{
			$aclass[] = 'medium';
		}

		if (in_array($color, array('blue', 'green', 'red', 'grey', 'white'))) {
			$aclass[] = $color;
		}

		if (in_array($align, array('left', 'right'))) {
			$aclass[] = $align;
		}

		if (in_array($type, array('square', 'radius', 'wireframe'))) {
			$aclass[] = $type;
		}

		if (in_array($align, array('center'))) {
			$htmlstart = '<p class="text-center">';
			$htmlend = '</p>';
		}

		$aclass[] = 'shortcode';
		$class = implode(' ', $aclass);
		
		if ($title) {
			$attributes .= ' title="'.esc_attr($title).'" ';
		}
		
		if ($link) {
			$attributes .= ' href="' . esc_attr($link) . '" ';			
		}
		
		if ($target) {
			$attributes .= ' target="' . esc_attr($target) . '" ';
		}
		
		

		return $htmlstart . '<a class="' . esc_attr($class) . ' button" '.$attributes.'>' . do_shortcode($content) . '</a>' . $htmlend;
	}

	/* TABS, ACCORDION, TOGGLE */

	function beopen_tab($atts, $content = null) {
		extract(shortcode_atts(array(
			'title' => '',
						), $atts));
		global $single_tab_array;
		$single_tab_array[] = array('title' => esc_attr($title), 'content' => trim(do_shortcode($content)));
		return $single_tab_array;
	}

	function beopen_tabs($atts, $content = null) {
		
		global $beopen_tab_id_inc;
		
		if (empty($beopen_tab_id_inc)) {
			$beopen_tab_id_inc = 1;
		}
		else
		{
			$beopen_tab_id_inc += 1;
		}
		
		extract(shortcode_atts(array('type' => ''
						), $atts));

		global $single_tab_array;
		$single_tab_array = array(); // clear the array



		$tabs_nav = '<ul class="nav nav-tabs ' . $type . '" role="tablist">';
		$tabs_content = '';
		$tabs_output = '';

		@do_shortcode($content); // execute the '[tab]' shortcode first to get the title and content

		foreach ($single_tab_array as $tab => $tab_attr_array) {
			$random_id = $beopen_tab_id_inc;
			$beopen_tab_id_inc += 1;
			$default = ( $tab == 0 ) ? ' class="active"' : '';
			$activeclass = ( $tab == 0 ) ? 'active' : '';;
			$tabs_nav .= '<li' . $default . '><a href="#tab'.esc_attr($random_id).'" role="tab" data-toggle="tab">' . $tab_attr_array['title'] . '</a></li>';
			$tabs_content .= '<div class="tab-pane '.$activeclass.'" id="tab' . $random_id . '">' . $tab_attr_array['content'] . '</div>';
		}
		$tabs_nav .= '</ul>';
		$tabs_output .= $tabs_nav . '<div class="tab-content">' . $tabs_content . '</div>';

		return $tabs_output;
	}

	function beopen_accordion_toggle($atts, $content = null) {
		
		global $beopen_toggle_id_counter;
		global $beopen_accordion_id_counter;
		
		if (empty($beopen_toggle_id_counter)) {
			$beopen_toggle_id_counter = 0;
		}
		
		extract(shortcode_atts(array(
			'title' => '',
			'active' => false
		), $atts));

		$single_tab_array[] = array('title' => $title, 'content' => trim(do_shortcode($content)));

		$class = '';
		$class_title = ' class="collapsed" ';
		if ($active) {
			$class = ' in';
			$class_title = '';
		}
		
		$beopen_toggle_id_counter += 1;
		return '<div class="panel panel-default">'
				. '<div class="panel-heading"><h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion'. esc_attr($beopen_accordion_id_counter).'" href="#collapse'.$beopen_toggle_id_counter.'" ' . $class_title . ' >' . $title . '</a></h4></div>'
				. '<div id="collapse'.esc_attr($beopen_toggle_id_counter).'" class="panel-collapse collapse '.esc_attr($class).'"><div class="panel-body">' . trim(do_shortcode($content)) . '</div></div>'
				. '</div>';
	}

	function beopen_accordion($atts, $content = null) {
		
		global $beopen_accordion_id_counter;
		
		if (empty($beopen_accordion_id_counter)) {
			$beopen_accordion_id_counter = 0;
		}

		$beopen_accordion_id_counter += 1;
		return '<div class="panel-group accordion" id="accordion'.$beopen_accordion_id_counter.'">' . do_shortcode($content) . '</div>';
	}

	function beopen_toggle($atts, $content = null) {
		global $beopen_toggle_id_counter;
		
		if (empty($beopen_toggle_id_counter)) {
			$beopen_toggle_id_counter = 0;
		}
		
		extract(shortcode_atts(array(
			'title' => '',
			'active' => false
						), $atts));

		$class = '';
		if ($active) {
			$class = 'active';
		}

		$beopen_toggle_id_counter += 1;
	
		return '<div class="panel panel-default">'
			. '<div class="panel-heading"><h4 class="panel-title"><a data-toggle="collapse" data-parent="" href="#collapse'.$beopen_toggle_id_counter.'">' . $title . '</a></h4></div>'
			. '<div id="collapse'.esc_attr($beopen_toggle_id_counter).'" class="panel-collapse collapse in"><div class="panel-body">' . trim(do_shortcode($content)) . '</div></div>'
			. '</div>';
		
	}

	/* BOXES */

//[message type="info"]Your message goes here... [/message]

	function beopen_message($atts, $content = null) {
		extract(shortcode_atts(array('type' => 'info'), $atts));

		$class = '';
		if (in_array($type, array('info', 'success', 'warning', 'error'))) {
			$class = $type;
		}
      
		return '<div class="alert alert-'.$type.' fade in" role="alert"><div class="box-icon"><i class="beopen-icon"></i></div>' . do_shortcode($content) . '<a href="" class="close" data-dismiss="alert"><span>&times;</span></a></div>';
	}

	/* Tooltips, Highlight, Dividers */

	function beopen_tooltip($atts, $content = null) {
		extract(shortcode_atts(array('title' => ''), $atts));

		return '<span class="has-tip" data-width="210" data-toggle="tooltip" title="' . esc_attr($title) . '">' . do_shortcode($content) . '</span>';
	}

	function beopen_highlight($atts, $content = null) {
		extract(shortcode_atts(array('title' => ''), $atts));

		return '<span class="label">' . do_shortcode($content) . '</span>';
	}

	function beopen_divider($atts) {
		extract(shortcode_atts(array('type' => ''), $atts));

		return '<div class="divider"></div>';
	}

	/* Lists */

	function beopen_listitem($atts, $content = null) {
		extract(shortcode_atts(array('title' => ''), $atts));

		return '<li><i class="icon-ok"></i>' . do_shortcode($content) . '</li>';
	}

	function beopen_list($atts, $content = null) {
		extract(shortcode_atts(array('type' => ''), $atts));

		return '<ul class="icons">' . do_shortcode($content) . '</ul>';
	}

	/* Tables */

	/* Blockquotes, Dropcaps */

	function vid_sc($atts, $content = null) {
		extract(
				shortcode_atts(array(
			'site' => 'youtube',
			'id' => '',
			'w' => '600',
			'h' => '370'
						), $atts)
		);
		if ($site == "youtube") {
			$src = 'http://www.youtube-nocookie.com/embed/' . $id;
		} else if ($site == "vimeo") {
			$src = 'http://player.vimeo.com/video/' . $id;
		} else if ($site == "dailymotion") {
			$src = 'http://www.dailymotion.com/embed/video/' . $id;
		} else if ($site == "yahoo") {
			$src = 'http://d.yimg.com/nl/vyc/site/player.html#vid=' . $id;
		} else if ($site == "bliptv") {
			$src = 'http://a.blip.tv/scripts/shoggplayer.html#file=http://blip.tv/rss/flash/' . $id;
		} else if ($site == "veoh") {
			$src = 'http://www.veoh.com/static/swf/veoh/SPL.swf?videoAutoPlay=0&permalinkId=' . $id;
		} else if ($site == "viddler") {
			$src = 'http://www.viddler.com/simple/' . $id;
		}
		if ($id != '') {
			return '<iframe width="' . intval($w) . '" height="' . intval($h) . '" src="' . esc_url($src) . '" class="vid iframe-' . esc_attr($site) . '"></iframe>';
		}
	}

	function beopen_soundcloud($atts, $content) {
		extract(
			shortcode_atts(array(
			'url' => $content,
			'width' => '100%',
			'height' => '81',
			'comments' => 'true',
			'auto_play' => 'false',
			'color' => 'ff7700',
			), $atts)
		);

		return '<object class="notfluid" height="' . $height . '" width="' . $width . '"><param name="movie" value="http://player.soundcloud.com/player.swf?url=' . urlencode($url) . '&amp;show_comments=' . $comments . '&amp;auto_play=' . $auto_play . '&amp;color=' . $color . '"></param><param name="allowscriptaccess" value="always"></param><embed class="notfluid" allowscriptaccess="always" height="' . $height . '" src="http://player.soundcloud.com/player.swf?url=' . urlencode($url) . '&amp;show_comments=' . $comments . '&amp;auto_play=' . $auto_play . '&amp;color=' . $color . '" type="application/x-shockwave-flash" width="' . $width . '"></embed></object>';
	}

	/* PRICING TABLES */

	function beopen_pricing_table($atts, $content = null) {
		extract(shortcode_atts(array(
			'columns' => '4'
						), $atts));

		global $pricing_table_columns;

		$pricing_table_columns = $columns;

		return '<div class="pricing_table row">' . do_shortcode($content) . '<div class="clear"></div></div>';
	}

	function beopen_plan($atts, $content = null) {

		extract(shortcode_atts(array(
			'featured' => false,
			'color' => '#1dafec',
			'linkname' => '',
			'link' => '',
			'name' => '',
			'price' => '',
			'period' => ''
						), $atts));

		global $pricing_table_columns;

		$wwidth = floor(12 / $pricing_table_columns);
		$class = 'col-md-' . $wwidth;
		
		$class .= ' col-xs-' . floor(12 / 2);

		if ($featured == 'true') {
			$class .= ' featured';
		}

		$color_style = '';
		$bg_color_style = '';
		if ($color) {
			$color_style = ' style="color: ' . esc_attr($color) . ';" ';
			$bg_color_style = ' style="background-color: ' . esc_attr($color) . ';" ';
		}


		if (($linkname) && ($link)) {
			$extraclass = '';
			if ($featured != 'true') {
				$extraclass .= ' green';
			}
			$link = '<div class="plan-bottom"><a class="button ' . $extraclass . '" '.$bg_color_style.' href="' . esc_url($link) . '">' . $linkname . '</a></div>';
		}


		return '<div class="' . $class . ' plan"><div class="plan-inner">' .
				'<div class="plan-top"><h3 ' . $color_style . '>' . $name . '</h3>' .
				'<div class="plan-price">' . $price . '</div>' .
				'<div class="plan-period">' . $period . '</div>' .
				'</div>' .
				do_shortcode($content) . $link .
				'</div></div>';
	}

	/* Progress Bar */

	function beopen_progressbar($atts, $content = null) {
		extract(shortcode_atts(array(
			'percent' => '50',			
			'text_color' => '',
			'background_color' => ''
						), $atts));

		if ($text_color) {
			$astyle[] = 'color: ' . $text_color;
		}

		if ($background_color) {
			$astyle[] = 'background-color: ' . $background_color;
		}

		
		$astyle_value[] = 'width: ' . intval($percent) . '%';

		$style = '';
		if (!empty($astyle)) {
			$style = ' style="' . implode(';', $astyle) . '"';
		}
		
		$style_value = ' style="' . implode(';', $astyle_value) . '"';

		return '<span class="beopen-progressbar-wrapper"><span class="beopen-progressbar" ' . $style . '><span class="beopen-progressbar-value" '.$style_value.'></span></span>' . $content . '</span>';
	}

	

	/* Special */

	function beopen_shortcode($atts, $content = null) {

		return htmlspecialchars($content);
	}


	function beopen_escapeHTML($atts, $content = null) {

		$escaped_content = str_replace(']', '&#93;', str_replace('[', '&#91;', htmlspecialchars($content)));

		return $escaped_content;
	}
	
	function beopen_escapepreHTML($atts, $content = null) {
		
		return '<pre>' . $this->beopen_escapeHTML($atts, $content) . '</pre>';
	}
	

	/* Twitter */

	function beopen_twitter($atts) {

		global $optionPages;

		extract(shortcode_atts(array(
			'username' => '',
			'count' => 3,
			'query' => 'null',
			'avatarsize' => 'null',
						), $atts));

		$twitter_response = get_transient(FIELD_PREFIX . 'twitter_response');

		if (!$twitter_response) {
			$token = beopen_get_option('twitter_access_token');
			$token_secret = beopen_get_option('twitter_access_token_secret');
			
			$consumer_key = beopen_get_option('twitter_access_consumer_key');
			$consumer_secret = beopen_get_option('twitter_access_consumer_secret');

			$host = 'api.twitter.com';
			$method = 'GET';
			$path = '/1.1/statuses/user_timeline.json'; // api call path

			$query = array(// query parameters
				'screen_name' => $username,
				'count' => $count
			);

			$oauth = array(
				'oauth_consumer_key' => $consumer_key,
				'oauth_token' => $token,
				'oauth_nonce' => (string) mt_rand(), // a stronger nonce is recommended
				'oauth_timestamp' => time(),
				'oauth_signature_method' => 'HMAC-SHA1',
				'oauth_version' => '1.0'
			);

			$oauth = array_map("rawurlencode", $oauth); // must be encoded before sorting
			$query = array_map("rawurlencode", $query);

			$arr = array_merge($oauth, $query); // combine the values THEN sort

			asort($arr); // secondary sort (value)
			ksort($arr); // primary sort (key)
			// http_build_query automatically encodes, but our parameters
			// are already encoded, and must be by this point, so we undo
			// the encoding step
			$querystring = urldecode(http_build_query($arr, '', '&'));

			$url = "https://$host$path";

			// mash everything together for the text to hash
			$base_string = $method . "&" . rawurlencode($url) . "&" . rawurlencode($querystring);

			// same with the key
			$key = rawurlencode($consumer_secret) . "&" . rawurlencode($token_secret);

			// generate the hash
			$signature = rawurlencode(base64_encode(hash_hmac('sha1', $base_string, $key, true)));

			// this time we're using a normal GET query, and we're only encoding the query params
			// (without the oauth params)
			$url .= "?" . http_build_query($query);
			$url = str_replace("&amp;", "&", $url); //Patch by @Frewuill

			$oauth['oauth_signature'] = $signature; // don't want to abandon all that work!
			ksort($oauth); // probably not necessary, but twitter's demo does it
			// also not necessary, but twitter's demo does this too
			if (!function_exists('add_quotes_twitter')) {

				function add_quotes_twitter($str) {
					return '"' . $str . '"';
				}

			}
			$oauth = array_map("add_quotes_twitter", $oauth);

			// this is the full value of the Authorization line
			$auth = "OAuth " . urldecode(http_build_query($oauth, '', ', '));

			$twitter_response = wp_remote_get($url, array('headers' => array('Authorization' => $auth, 'sslverify' => false)));
			
			if (!is_wp_error($twitter_response)) {			
				set_transient(FIELD_PREFIX . 'twitter_response', $twitter_response, 60);
			}
		}

		if (is_wp_error($twitter_response)) {
		}
		else
		if ($twitter_response['response']['code'] != '200') {
			return 'Error code ' . $twitter_response['response']['code'] . '. Please verify the Twitter Access Token and Twitter Access Token Secret!';
		} else {

			$json = $twitter_response['body'];


			$twitter_data = json_decode($json);

			$output = '<ul class="tweet_list">';
			foreach ($twitter_data as $twitter) {

				$output .= '<li>';
				$tweet = $twitter->text;

				if (is_array($twitter->entities->urls))
					foreach ($twitter->entities->urls as $ourl) {

						$tweet = str_replace($ourl->url, '<a href="' . esc_url($ourl->url) . '">' . $ourl->display_url . '</a>', $tweet);
					}


				$output .= $tweet;

				$output .= '</li>';
			}
			$output .= '</ul>';
		}
		return $output;
	}

	
	
	
	function beopen_h1($atts, $content = null) {
		return '<h1 class="alternative">' . do_shortcode($content) . '</h1>';
	}
	
	
	function beopen_h2($atts, $content = null) {
		return '<h2 class="alternative">' . do_shortcode($content) . '</h2>';
	}
	
	
	function beopen_h3($atts, $content = null) {
		return '<h3 class="alternative">' . do_shortcode($content) . '</h3>';
	}
	
	
	function beopen_h4($atts, $content = null) {
		return '<h4 class="alternative">' . do_shortcode($content) . '</h4>';
	}
	
	
	function beopen_h5($atts, $content = null) {
		return '<h5 class="alternative">' . do_shortcode($content) . '</h5>';
	}
	
	
	function beopen_h6($atts, $content = null) {
		return '<h6 class="alternative">' . do_shortcode($content) . '</h6>';
	}
	
	
	function beopen_icon($atts, $content = null) {
		
		extract(shortcode_atts(array(
			'code' => '',
			'size' => '',
			'color' => ''
		), $atts));
		
		
		
		
		if (is_numeric($size)) {
			$size = $size . 'px';
		}
		
		return beopen_renderIcon($code, $size, '', $color);
	}
	

	/* -------------------------------------- */
	/*    Clean up Shortcodes
	  /*-------------------------------------- */

// Actual processing of the shortcode happens here
	function beopen_run_shortcode($content) {
		
		global $wp_embed;

		global $shortcode_tags;
		

		// Backup current registered shortcodes and clear them all out
		$orig_shortcode_tags = $shortcode_tags;
		remove_all_shortcodes();

		add_shortcode('shortcode', array($this, 'beopen_escapeHTML'));
		add_shortcode('sample_shortcode', array($this, 'beopen_escapepreHTML'));		

		add_shortcode('one_half', array($this, 'beopen_one_half'));
		add_shortcode('two_third', array($this, 'beopen_two_third'));
		add_shortcode('one_third', array($this, 'beopen_one_third'));
		add_shortcode('one_fourth', array($this, 'beopen_one_fourth'));
		
		add_shortcode('one_half_last', array($this, 'beopen_one_half_last'));
		add_shortcode('two_third_last', array($this, 'beopen_two_third_last'));
		add_shortcode('one_third_last', array($this, 'beopen_one_third_last'));
		add_shortcode('one_fourth_last', array($this, 'beopen_one_fourth_last'));
	

		add_shortcode('progressbar', array($this, 'beopen_progressbar'));
		
		add_shortcode('button', array($this, 'beopen_button'));


		add_shortcode('tab', array($this, 'beopen_tab'));
		add_shortcode('tabs', array($this, 'beopen_tabs'));
		add_shortcode('accordion_toggle', array($this, 'beopen_accordion_toggle'));
		add_shortcode('accordion', array($this, 'beopen_accordion'));

		add_shortcode('toggle', array($this, 'beopen_toggle'));
		add_shortcode('code_toggle', array($this, 'beopen_toggle'));

		add_shortcode('message', array($this, 'beopen_message'));

		add_shortcode('tooltip', array($this, 'beopen_tooltip'));

		add_shortcode('highlight', array($this, 'beopen_highlight'));
		add_shortcode('divider', array($this, 'beopen_divider'));
		add_shortcode('listitem', array($this, 'beopen_listitem'));
		add_shortcode('list', array($this, 'beopen_list'));
		add_shortcode('dropcap', array($this, 'beopen_dropcap'));
		add_shortcode('vid', array($this, 'vid_sc'));
		add_shortcode('soundcloud', array($this, 'beopen_soundcloud'));
		add_shortcode('pricing_table', array($this, 'beopen_pricing_table'));
		add_shortcode('plan', array($this, 'beopen_plan'));

		add_shortcode('latest_posts', array($this, 'beopen_latest_posts'));

		// Do the shortcode (only the one above is registered)
		$content = $wp_embed->run_shortcode(do_shortcode(($content)));		

		// Put the original shortcodes back
		$shortcode_tags = $orig_shortcode_tags;


		return $content;
	}

	function shortcodes_to_exempt_from_wptexturize($shortcodes){
	    //$shortcodes[] = 'one_half';
	    return $shortcodes;
	}	

	
	
	
}

new beopen_shortcodes;



	


	
	
	

?>