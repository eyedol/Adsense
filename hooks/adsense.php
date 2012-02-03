<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Actionable Hook - Load All Events
 *
 * PHP version 5
 * LICENSE: This source file is subject to LGPL license
 * that is available through the world-wide-web at the following URI:
 * http://www.gnu.org/copyleft/lesser.html
 * @author       Ushahidi Team <team@ushahidi.com>
 * @package       Ushahidi - http://source.ushahididev.com
 * @copyright  Ushahidi - http://www.ushahidi.com
 * @license       http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License (LGPL)
 */

class adsense {


    /**
     * Registers the main event add method
     */

    public function __construct()
    {
        // Hook into rounting
        Event::add('system.pre_controller', array($this, 'add'));
    }

    /**
     * Adds events to the ushahidi application
     */
    public function add()
    {
        //get the enabled postion
        $position = $this->_get_postion();
        
        // place adsense at header of the page
        if ($position == 1) 
        {
            Event::add('ushahidi_action.header_item', array($this,
                '_place_adsense'));
        } 
        
        // place add at main sidebar
        else if ($position == 2) 
        {
            if (Router::$controller == 'main')
            {
                switch ( Router::$method )
                {
                    case 'index':
                        Event::add('ushahidi_action.main_sidebar', 
                            array($this, '_place_adsense'));
                        break;
                }
            }


        }

        //place adsense at footer of the page
        else if ($position == 3) 
        {
            // footer
            Event::add('ushahidi_action.main_footer', array($this,
                '_place_adsense'));
        }

        //place adsense below a report

        else if ($position == 4) {

            if (Router::$controller == 'reports') 
            {
                switch(Router::$method)
                {
                    case 'view':
                        Event::add('ushahidi_action.report_extra', 
                            array($this,'_place_adsense'));
                    break;
                }
            }
        }
    }

    /**
     * Place adsense
     */
    public function _place_adsense()
    {
        $ad_settings = ORM::factory('adsense_settings',1);
        $size = $ad_settings->ad_size;
        $w_h = explode('x',$size);        
        $adsense_code = '<script type="text/javascript"><!--
        ';
        $adsense_code .= ' google_ad_client = "ca-'.$ad_settings->ad_pub_id.'";
        google_ad_slot = "'.$ad_settings->ad_slot.'";
        google_ad_width = '.$w_h[0].';
        google_ad_height = '.$w_h[1].';
        //-->
        </script>
        <script type="text/javascript"
            src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
        </script>';	
        $adsense = View::factory('adsense');
        $adsense->adsense_code = $adsense_code;
        $adsense->render(TRUE);
    }
    
    private function _get_postion()
    {
        $adsense_settings = ORM::factory('adsense_settings',1);
        return $adsense_settings->ad_placement;
    }
}

new adsense();
