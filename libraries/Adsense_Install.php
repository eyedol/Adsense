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

    private $table;
    //load the default database library
    public function __construct()
    {
        $this->table = Kohana::config('database.default.table_prefix').
            "adsense_settings";
        $this->db = Database::instance();
    }

    /**
     * Creates the required tables for this plugin
     */
    public function run_install()
    {
        //create table
        $this->db->query("
            CREATE TABLE IF NOT EXISTS `".$this->table."` (
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

        if ($this->db->count_records($this->table) == 0) {
            //populate with default values
            $this->db->query("INSERT INTO `".$this->table."` (
                `id`, `ad_border`, `ad_pub_id`, `ad_channel`, `ad_size`,
                `ad_type`,
                `ad_placement`, `ad_border_color`, `ad_text_color`,
                `ad_bg_color`, 
                `ad_link_color`, `ad_uri_color`) VALUES
            
                (1, 'normal', 'pub-0000000000000000', '', '300x250', 'text', 2, 
                'f0f0f0', '000000', 'f0f0f0', '426cb7', '426cb7');
            ");
        }
    }

    /**
     * Deletes the database tables for this plugin
     */
    public function uninstall()
    {
        $this->db->query("DROP TABLE `".$this->table."`");
    }
}
