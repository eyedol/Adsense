<?php 
/**
 * Adsense settings view.
 *
 * PHP version 5
 * LICENSE: This source file is subject to LGPL license 
 * that is available through the world-wide-web at the following URI:
 * http://www.gnu.org/copyleft/lesser.html
 * @author     Ushahidi Team <team@ushahidi.com> 
 * @package    Ushahidi - http://source.ushahididev.com
 * @module     API Controller
 * @copyright  Ushahidi - http://www.ushahidi.com
 * @license    http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License (LGPL) 
 */
?>
    <!-- red form -->
    <div class="report-form">
        <?php if($form_error) { ?>
            <div class="red-box">
                <h3><?php echo Kohana::lang('ui_main.error');?></h3>
                <ul>
                    <?php foreach($errors as $error_item => $error_description)  {?>
                        
                <?php print (!$error_description) ? '' : 
                    "<li>".$error_description. "</li>"; } ?>
                </ul>
            </div>
        <?php } ?>
    </div> <!-- end red form -->
    <?php if($form_saved) { ?>
    <div class="green-box">
        <h3><?php echo Kohana::lang('ui_main.configuration_saved');?></h3>
    </div> <!-- end green-box -->
    <?php } ?>
    <p class="google-adsense-settings">
        <h3><?php echo Kohana::lang('adsense.google_adsense'); ?></h3>
        <div class="row">
            <h4><a href="#" class="tooltip" title="<?php echo Kohana::lang('adsense.id_tip');?>"><?php echo Kohana::lang('adsense.id') ?></a>
            </h4>
            <?php print form::input('adsense_pub_id',$form['adsense_pub_id']);?>
        </div>
        <span>Eg: pub-4268725654361605</span>
        <div class="row">
            <h4><a href="#" class="tooltip" title="<?php echo Kohana::lang('adsense.ad_slot_tip');?>">
            <?php echo Kohana::lang('adsense.ad_slot')?></a>
            </h4>
            <?php print form::input('adsense_ad_slot',
                $form['adsense_ad_slot']);?>
        </div>
        <span><?php echo Kohana::lang('adsense.ad_slot_desc') ?></span>
        <div class="row">
            <h4>
            <?php echo Kohana::lang('adsense.ad_size')?>
            </h4>
            <?php print form::dropdown('adsense_size',
                $ad_sizes,$form['adsense_size']);?>
        </div>

        <div class="row">
            <h4>
            <?php echo Kohana::lang('adsense.ad_placement')?>
            </h4>
            <?php print form::dropdown('adsense_ad_placement',
            array('1' => Kohana::lang('adsense.placement_header'),
            '2'=> Kohana::lang('adsense.placement_sidebar'),
            '3' => Kohana::lang('adsense.placement_footer'),
            '4'=> Kohana::lang('adsense.placement_in_report')),$form['adsense_ad_placement']);?>
        </div>
    </p>
</div>
