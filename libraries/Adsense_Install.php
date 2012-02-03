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
            `ad_pub_id` varchar(25) NOT NULL,
            `ad_slot` varchar(25) DEFAULT NULL,
            `ad_size` varchar(15) NOT NULL,
            `ad_placement` int(11) NOT NULL,
             PRIMARY KEY (`id`)
            ) ENGINE=MyISAM;
    
        ");

        if ($this->db->count_records($this->table) == 0) {
            //populate with default values
            $this->db->query("INSERT INTO `".$this->table."` (
                `id`,`ad_pub_id`, `ad_slot`, `ad_size`,
                `ad_placement`) VALUES
                (1, 'pub-0000000000000000', '7543616762', '300x250',2);
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
