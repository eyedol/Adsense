<?php
/**
 * Performs install/uninstall methods for the Adsense plugin
 *
 * PHP version 5
 * LICENSE: This source file is subject to LGPL license 
 * that is available through the world-wide-web at the following URI:
 * http://www.gnu.org/copyleft/lesser.html
 * @author	   Ushahidi Team <team@ushahidi.com> 
 * @package    Ushahidi - http://source.ushahididev.com
 * @module	   SMSSync Installer
 * @copyright  Ushahidi - http://www.ushahidi.com
 * @license    http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License (LGPL) 
 */

class Adsense_Install {
    
    //load the default database library
    public function __construct()
    {
        $this->db = Database::instance();
    }

    /**
     * Creates the required tables for this plugin
     */
    public function run_install()
    {
        $this->db->query("
            CREATE TABLE IF NOT EXISTS `".
            Kohana::config('database.default.table_prefix').
            "adsense_settings` (
            `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
            `ad_border` varchar(15) DEFAULT NULL,
            `ad_pub_id` varchar(25) NOT NULL,
            `ad_channel` varchar(25) DEFAULT NULL,
            `ad_size` varchar(15) NOT NULL,
            `ad_type` varchar(25) DEFAULT NULL,
            `ad_placement` int(11) NOT NULL,
            `ad_border_color` varchar(15) DEFAULT NULL,
            `ad_text_color` varchar(15) DEFAULT NULL,
            `ad_bg_color` varchar(15) DEFAULT NULL,
            `ad_link_color` varchar(15) DEFAULT NULL,
            `ad_uri_color` varchar(15) DEFAULT NULL,
            PRIMARY KEY (`id`)
            ) ENGINE=MyISAM;
    
        ");
    }

    /**
     * Deletes the database tables for this plugin
     */
    public function uninstall()
    {
        $this->db->query('DROP TABLE `'.Kohana::config('database.default.table_prefix').'adsense_settings`');
    }
}
