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
        $this->template->content = new View('admin/addons/plugin_settings');
        $this->template->content->title = Kohana::lang('adsense.settings');
        
        //Settings Form view
        $this->template->content->settings_form = new View('admin/adsense_settings');

        
        //setup and initialize for fields
        $form = array
        (
            'adsense_pub_id' => '',
            'adsense_ad_slot' => '',
            'adsense_size' => 0,
            'adsense_ad_placement' => 0,
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
            $post->add_rules('adsense_ad_slot', 'required');
            
            //passed validation test.
            if($post->validate())
            {
                $adsense_settings = ORM::factory('adsense_settings',1);
                $adsense_settings->ad_pub_id = $post->adsense_pub_id;
                $adsense_settings->ad_slot = $post->adsense_ad_slot;
                $adsense_settings->ad_size = $post->adsense_size;
                $adsense_settings->ad_placement = $post->adsense_ad_placement;

                //save new record
                $adsense_settings->save();
                //everything is okay!
                $form = arr::overwrite($form,$post->as_array());
                $form_saved = TRUE;
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
            $form['adsense_ad_slot'] = $adsense_settings->ad_slot;
            $form['adsense_size'] = $adsense_settings->ad_size;
            $form['adsense_ad_placement'] = $adsense_settings->ad_placement;
        }
        //enable color picker javascript library
        $this->template->content->settings_form->ad_sizes = Kohana::config('adsense.ad_sizes');
        $this->template->content->settings_form->form = $form;
        $this->template->content->settings_form->errors = $errors;
        $this->template->content->settings_form->form_error = $form_error;
        $this->template->content->settings_form->form_saved = $form_saved;
    }
    
}
