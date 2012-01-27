<?php defined('SYSPATH') OR die('No direct access allowed.');
    $config['ad_sizes'] = array(
            '300x250' => Kohana::lang('adsense.ad_size_medium_rectangle'), 
            '336x280' => Kohana::lang('adsense.ad_size_large_rectangle'),
            '728x90' => Kohana::lang('adsense.ad_size_leaderboard'),
            '160x600' => Kohana::lang('adsense.ad_size_wide_skyscraper'),
            '468x60' => Kohana::lang('adsense.ad_size_banner'),
            '234x60' => Kohana::lang('adsense.ad_size_half_banner'),
            '120x600' => Kohana::lang('adsense.ad_size_skyscraper'),
            '120x240' => Kohana::lang('adsense.ad_size_vertical_banner'),
            '250x250' => Kohana::lang('adsense.ad_size_square'),
            '200x200'=> Kohana::lang('adsense.ad_size_small_square'),
            '180x150'=> Kohana::lang('adsense.ad_size_small_rectangle'),
            '125x125' => Kohana::lang('adsense.ad_size_button'),
            '728x15' => Kohana::lang('adsense.ad_size_horizontal_large'),
            '468x15' => Kohana::lang('adsense.ad_size_horizontal_medium'),
            '200x90' => Kohana::lang('adsense.ad_size_vertical_x_large'),
            '180x90' => Kohana::lang('adsense.ad_size_vertical_large'),
            '160x90'=> Kohana::lang('adsense.ad_size_vertical_medium'),
            '120x90' => Kohana::lang('adsense.ad_size_vertical_small')
        );

    $config['ad_type'] = array(
        'text' => Kohana::lang('adsense.type_text'),
        'text_image' => Kohana::lang('adsense.type_text_image')
    );
?>
