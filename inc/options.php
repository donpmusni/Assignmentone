<?php
function dp_add_submenu(){
	add_submenu_page( 'themes.php', 'Options Page', 'Assignment 1 Options', 'manage_options', 'theme_options', 'dp_options_page');}
	add_action( 'admin_menu', 'dp_add_submenu' );

	function dp_settings_init(){

		register_setting('theme_options', 'dp_options_settings');

		add_settings_section(
        'dp_options_section',//id
        'Theme Features',//section title
        'dp_options_page_section_callback',
        'theme_options');
		function dp_options_page_section_callback(){
			echo 'Options to edit homepage:';
		}




//selectbox to change the font of the Site Identity

		add_settings_field(
			'title_font',
			'Choose a Title Font',
			'dp_change_font',
			'theme_options',
			'dp_options_section');

		function dp_change_font(){
			$dpoptions = get_option('dp_options_settings');
			?>

			<select name="dp_options_settings[dp_change_font]">
				<option value="'Helvetica','Arial',sans-serif" <?php if(isset($dpoptions['dp_change_font'])) selected($dpoptions['dp_change_font'], 1); ?>>Helvetica (default)</option>

				<option value="cursive" <?php if(isset($dpoptions['dp_change_font'])) selected($dpoptions['dp_change_font'], 2); ?>>Comic Sans (best font)</option>

			</select>
			<?php
		}

//text box to edit Services section on home page
		add_settings_field(
			'services',
			'Enter content for your Services Section',
			'services_box',
			'theme_options',
			'dp_options_section');

		function services_box(){
			$dpoptions = get_option('sf_options_settings');
			?>

			<textarea cols="60" rows="5" name="dp_options_settings[services]">
				<?php if(isset($dpoptions['services'])) echo $dpoptions['services'];?>
			</textarea>
			<?php
		}

   //add text box to change link of "experience" button
		add_settings_field( 
            'butt_link', //id
            '"Experience" Button Link Text', //title
            'dp_render', //$callback
            'theme_options', //page
            'dp_options_section');

		function dp_render(){
			$dpoptions = get_option('dp_options_settings');
			?>

			<input type="text" name="dp_options_settings[butt_link]" value="<?php if(isset($dpoptions['butt_link']))echo   $dpoptions['butt_link'];?>"/><br/>

			<?php
		}


		function dp_options_page(){
			?>
			<form action="options.php" method="post">
				<h2>Options Page</h2>
				<?php
				settings_fields('theme_options');
				do_settings_sections('theme_options');
				submit_button();
				?>
			</form>
			<?php
		}


	}
	add_action('admin_init', 'dp_settings_init');