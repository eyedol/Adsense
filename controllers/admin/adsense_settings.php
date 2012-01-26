<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Controller for adsense admin settings
 *
 * PHP version 5
 * LICENSE: This source file is subject to LGPL license 
 * that is available through the world-wide-web at the following URI:
 * http://www.gnu.org/copyleft/lesser.html
 * @author	   Ushahidi Team <team@ushahidi.com> 
 * @package	   Ushahidi - http://source.ushahididev.com
 * @copyright  Ushahidi - http://www.ushahidi.com
 * @license	   http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License (LGPL) 
 */

class Adsense_Settings_Controller extends Admin_Controller {

    public function __construct()
    {   
        
        parent::__construct();
        
        $this->template->this_page = 'addons';
    }

    public function index()
    {
        $this->template->content = new View('admin/plugins_settings');
        $this->template->content->title = Kohana::lang('adsense.settings');
        
        //Settings Form view
        $this->template->content->settings_form = new View('admin/adsense_settings');

        
        //setup and initialize for fields
        $form = array
        (
            'adsense_pub_id' => '',
            'adsense_custom_channel' => '',
            'adsense_border' => 0,
            'adsense_size' => 0,
            'adsense_bg_color' => '',
            'adsense_border_color' => '',
            'adsense_bg_color' => '',
            'adsense_text_color' => '',
            'adsense_link_color' => '',
            'adsense_uri_color' => '',
            'adsense_ad_placement' => 0,
            'adsense_ad_type' => 0,
        );

        $errors = $form;
        $form_error = FALSE;
        $form_saved = FALSE;

        //check, has the form been submitted, if so, setup validation
        if($_POST)
        {
            $post = new Validation($_POST);

            //add filters
            $post->pre_filter('trim', TRUE);

            //add validation rules
            $post->add_rules('adsense_pub_id', 'required');
            
            //passed validation test.
            if($post->validate())
            {
                //everything is okay!
                $form = arr::overwrite($form,$post->as_array());
                $adsense_settings = ORM::factory('adsense_settings',1);
                $adsense_settings->ad_pub_id = $post->adsense_pub_id;
                $adsense_settings->ad_channel = $post->adsense_custom_channel;
                $adsense_settings->ad_size = $post->adsense_size;
                $adsense_settings->ad_border = $post->adsense_border;
                $adsense_settings->ad_border_color = $post->adsense_border_color;
                $adsense_settings->ad_bg_color = $post->adsense_bg_color;
                $adsense_settings->ad_link_color = $post->adsense_link_color;
                $adsense_settings->ad_text_color = $post->adsense_text_color;
                $adsense_settings->ad_uri_color = $post->adsense_uri_color;
                $adsense_settings->ad_placement = $post->adsense_ad_placement;
                $adsense_settings->ad_type = $post->adsense_ad_type;

                //save new record
                $adsense_settings->save();
            }
            else
            {
                //repopulate the form fields
                $form = arr::overwrite($form,$post->as_array());

                //populate the error fields, if any
                $errors = arr::overwrite($errors,$post->errors('adsense'));
                $form_error = TRUE;
            }
        }

        else
        {
            // retrieve current settings.
            $adsense_settings = ORM::factory('adsense_settings',1);
            $form['adsense_pub_id'] = $adsense_settings->ad_pub_id;
            $form['adsense_custom_channel'] = $adsense_settings->ad_channel;
            $form['adsense_border'] = $adsense_settings->ad_border;
            $form['adsense_size'] = $adsense_settings->ad_size;
            $form['adsense_border_color'] = $adsense_settings->ad_border_color;
            $form['adsense_bg_color'] = $adsense_settings->ad_bg_color;
            $form['adsense_link_color'] = $adsense_settings->ad_link_color;
            $form['adsense_text_color'] = $adsense_settings->ad_text_color;
            $form['adsense_uri_color'] = $adsense_settings->ad_uri_color;
            $form['adsense_ad_placement'] = $adsense_settings->ad_placement;
            $form['adsense_ad_type'] = $adsense_settings->ad_type;
        }
        //enable color picker javascript library
        $this->template->colorpicker_enabled = TRUE;
        $this->template->js = new View('admin/adsense_settings_js');
        $this->template->content->settings_form->ad_sizes = Kohana::config('adsense.ad_sizes');
        $this->template->content->settings_form->form = $form;
        $this->template->content->settings_form->errors = $errors;
        $this->template->content->settings_form->form_error = $form_error;
        $this->template->content->settings_form->form_saved = $form_saved;
    }
    
}
