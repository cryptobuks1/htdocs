<?php
/*
* Add-on Name: Ultimate Google Trends
* Add-on URI: https://www.brainstormforce.com
*/
if(!class_exists("Ultimate_Google_Trends")){
	class Ultimate_Google_Trends{
		function __construct(){
			add_action("admin_init",array($this,"google_trends_init"));
			add_shortcode("ultimate_google_trends",array($this,"display_ultimate_trends"));
		}
		function google_trends_init(){
			if ( function_exists('vc_map'))
			{
				vc_map( array(
					"name" => __("Google Trends", "smile"),
					"base" => "ultimate_google_trends",
					"class" => "vc_google_trends",
					"controls" => "full",
					"show_settings_on_create" => true,
					"icon" => "vc_google_trends",
					"description" => __("Display Google Trends to show insights.", "smile"),
					"category" => __("Ultimate VC Addons", "smile"),
					"params" => array(
						/*array(
							"type" => "dropdown",
							"class" => "",
							"heading" => __("Compare", "smile"),
							"param_name" => "search_by",
							"admin_label" => true,
							"value" => array(
								__("Multiple Search Terms", "smile") => "q",
								//__("Search Term at Location", "smile") => "geo",
								//__("Search Term over Time Range", "smile") => "date"
							)
						),*/
						array(
							"type" => "textarea",
							"class" => "",
							"heading" => __("Comparison Terms", "smile"),
							"param_name" => "gtrend_query",
							"value" => "",
							"description" => __("Enter maximum 5 terms separated by comma. Example: <em>Google, Facebook, LinkedIn</em>", "smile"),	
							"dependency" => Array("element" => "search_by","value" => array("q")),				
						),
						/*array(
							"type" => "textfield",
							"class" => "",
							"heading" => __("Comparison Term", "smile"),
							"param_name" => "gtrend_query_2",
							"value" => "",
							"description" => __("Enter single term. Example: <em>Love</em>", "smile"),	
							"dependency" => Array("element" => "search_by","value" => array("geo","date")),				
						),*/
						array(
							"type" => "dropdown",
							"class" => "",
							"heading" => __("Location", "smile"),
							"param_name" => "location_by",
							"admin_label" => true,
							"value" => array(
								__("Worldwide", "smile") => "", 
								__("Argentina", "smile") => "", 
								__("Australia", "smile") => "",
								__("Austria", "smile") => "", 
								__("Bangladesh", "smile") => "",
								__("Belgium", "smile") => "", 
								__("Brazil", "smile") => "",
								__("Bulgaria", "smile") => "", 
								__("Canada", "smile") => "",
								__("Chile", "smile") => "", 
								__("China", "smile") => "",
								__("Colombia", "smile") => "", 
								__("Costa Rica", "smile") => "",
								__("Croatia", "smile") => "", 
								__("Czech Republic", "smile") => "",
								__("Denmark", "smile") => "", 
								__("Dominican Republic", "smile") => "",
								__("Ecuador", "smile") => "", 
								__("Egypt", "smile") => "",
								__("El Salvador", "smile") => "", 
								__("Estonia", "smile") => "",
								__("Finland", "smile") => "", 
								__("France", "smile") => "",
								__("Germany", "smile") => "", 
								__("Ghana", "smile") => "",
								__("Guatemala", "smile") => "", 
								__("Honduras", "smile") => "",
								__("Hong Kong", "smile") => "", 
								__("Hungary", "smile") => "",
								__("India", "smile") => "IN", 
								__("Indonesia", "smile") => "", 
								__("Ireland", "smile") => "",
								__("Israel", "smile") => "", 
								__("Italy", "smile") => "",
								__("Japan", "smile") => "", 
								__("Kenya", "smile") => "",
								__("Latvia", "smile") => "", 
								__("Lithuania", "smile") => "",
								__("Malaysia", "smile") => "", 
								__("Mexico", "smile") => "",
								__("Netherlands", "smile") => "", 
								__("New Zealand", "smile") => "",
								__("Nigeria", "smile") => "", 
								__("Norway", "smile") => "",
								__("Pakistan", "smile") => "", 
								__("Panama", "smile") => "",
								__("Peru", "smile") => "", 
								__("Philippines", "smile") => "",
								__("Poland", "smile") => "", 
								__("Portugal", "smile") => "",
								__("Puerto Rico", "smile") => "", 
								__("Romania", "smile") => "",
								__("Russia", "smile") => "", 
								__("Saudi Arabia", "smile") => "",
								__("Senegal", "smile") => "", 
								__("Serbia", "smile") => "",
								__("Singapore", "smile") => "", 
								__("Slovakia", "smile") => "",
								__("Slovenia", "smile") => "", 
								__("South Africa", "smile") => "",
								__("South Korea", "smile") => "", 
								__("Spain", "smile") => "",
								__("Sweden", "smile") => "", 
								__("Switzerland", "smile") => "",
								__("Taiwan", "smile") => "", 
								__("Thailand", "smile") => "",
								__("Turkey", "smile") => "", 
								__("Uganda", "smile") => "",
								__("Ukraine", "smile") => "", 
								__("United Arab Emirates", "smile") => "",
								__("United Kingdom", "smile") => "", 
								__("United States", "smile") => "",
								__("Uruguay", "smile") => "",
								__("Venezuela", "smile") => "",
								__("Vietnam", "smile") => "",
							)
						),
						array(
							"type" => "dropdown",
							"class" => "",
							"heading" => __("Graph type", "smile"),
							"param_name" => "graph_type",
							"admin_label" => true,
							"value" => array(__("Interest over time", "smile") => "TIMESERIES_GRAPH_0", __("Interest over time with average", "smile") => "TIMESERIES_GRAPH_AVERAGES_CHART", __("Regional interest in map", "smile") => "GEO_MAP_0_0", __("Regional interest in table", "smile") => "GEO_TABLE_0_0", __("Related searches (Topics)", "smile") => "TOP_ENTITIES_0_0", __("Related searches (Queries)", "smile") => "TOP_QUERIES_0_0"),
							"dependency" => Array("element" => "search_by","value" => array("q"))
						),
						/*array(
							"type" => "dropdown",
							"class" => "",
							"heading" => __("Graph type", "smile"),
							"param_name" => "graph_type_2",
							"admin_label" => true,
							"value" => array(__("Top Entities", "smile") => "TOP_ENTITIES_0_0", __("Top Queries", "smile") => "TOP_QUERIES_0_0"),
							"dependency" => Array("element" => "search_by","value" => array("geo", "date"))
						),*/
						array(
							"type" => "textfield",
							"class" => "",
							"heading" => __("Frame Width (optional)", "smile"),
							"param_name" => "gtrend_width",
							"value" => "",
							"description" => __("For Example: <em>500</em>", "smile")
						),
						array(
							"type" => "textfield",
							"class" => "",
							"heading" => __("Frame Height (optional)", "smile"),
							"param_name" => "gtrend_height",
							"value" => "",
							"description" => __("For Example: <em>350</em>", "smile")
						),
						array(
								"type" => "textfield",
								"heading" => __("Extra class name", "js_composer"),
								"param_name" => "el_class",
								"description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "js_composer")
						),
						array(
							"type" => "heading",
							"sub_heading" => "<span style='display: block;'><a href='http://bsf.io/skwuz' target='_blank'>Watch Video Tutorial &nbsp; <span class='dashicons dashicons-video-alt3' style='font-size:30px;vertical-align: middle;color: #e52d27;'></span></a></span>",
							"param_name" => "notification",
							'edit_field_class' => 'ult-param-important-wrapper ult-dashicon ult-align-right ult-bold-font ult-blue-font vc_column vc_col-sm-12',
						),
					)
				));
			}
		}
		function display_ultimate_trends($atts,$content = null){
			$width = $height = $graph_type = $graph_type_2 = $search_by = $location_by = $gtrend_query = $gtrend_query_2 = $el_class = '';
			extract(shortcode_atts(array(
				//"id" => "map",
				"gtrend_width" => "",
				"gtrend_height" => "",
				"graph_type" => "TIMESERIES_GRAPH_0",
				"graph_type_2" => "",
				"search_by" => "q",
				"location_by" => "",
				"gtrend_query" => "",
				"gtrend_query_2" => "",
				"el_class" => ""
			), $atts));
			if($search_by === 'q')
			{
				$graph_type_new = $graph_type;
				$gtrend_query_new = $gtrend_query;
			}
			else
			{
				$graph_type_new = $graph_type_2;
				$gtrend_query_new = $gtrend_query_2;
			}
			if($gtrend_width != '')
			{
				$width = $gtrend_width;
				$width = '&amp;w='.$width;
			}
			if($gtrend_height != '')
			{
				$height = $gtrend_height;
				$height = '&amp;h='.$height;
			}
			$id = uniqid('vc-trends-');
			$output = '<div id="'.$id.'" class="ultimate-google-trends '.$el_class.'">
				<script type="text/javascript" src="//www.google.com/trends/embed.js?hl=en-US&amp;q='.$gtrend_query_new.'&cmpt='.$search_by.'&amp;geo='.$location_by.'&amp;content=1&amp;cid='.$graph_type_new.'&amp;export=5'.$width.$height.'"></script>
			</div>';
			return $output;
		}
	}
	new Ultimate_Google_Trends;
}