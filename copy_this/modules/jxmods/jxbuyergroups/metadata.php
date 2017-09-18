<?php
/**
 * Metadata version
 */
$sMetadataVersion = '1.1';
 
/**
 * Module information
 * 
 * @link      https://bitbucket.org/jobarthel/jxbuyergroups
 * @license   http://www.gnu.org/licenses/gpl-3.0.html GPL v3 or later
 * @copyright (C) 2017, Joachim Barthel
 * @author    Joachim Barthel <jobarthel@gmail.com>
 * 
 */

 $aModule = array(
    'id'           => 'jxbuyergroups',
    'title'        => 'jxBuyerGroups - Adds users to groups depending on the bought products',
    'description'  => array(
                        'de' => 'Modul zum Erfassen und Speichern der Original Referer URL zu jeden Bestellung.',
                        'en' => 'Module which preserves the origin referer url and stores it according the related order.'
                        ),
    'thumbnail'    => 'jxbuyergroups.png',
    'version'      => '0.1',
    'author'       => 'Joachim Barthel',
    'url'          => 'https://bitbucket.org/jobarthel/jxbuyergroups',
    'email'        => 'jobarthel@gmail.com',
    'extend'       => array(
                        ),
    'extend'       => array(
                            'oxorder'      => 'jxmods/jxbuyergroups/models/jxbuyergroups_oxorder'
                        ),
    'files'        => array(/*
                            'jxbuyergroups_events' => 'jxmods/jxreferer/application/events/jxbuyergroups_events.php'/*,
                            'jxreferer_report' => 'jxmods/jxreferer/application/controllers/admin/jxreferer_report.php'
                        */),
    'templates'    => array(/*
                            'jxreferer_report.tpl' => 'jxmods/jxreferer/application/views/admin/tpl/jxreferer_report.tpl',
                                            */),
    'blocks'       => array(/*
                        array(
                            'template' => 'order_main.tpl', 
                            'block'    => 'admin_order_main_form',                     
                            'file'     => '/out/blocks/admin_order_main_form.tpl'
                          )
                        */),
    'events'       => array(/*
                        'onActivate'   => 'jxbuyergroups_events::onActivate', 
                        'onDeactivate' => 'jxbuyergroups_events::onDeactivate'
                        */),
    'settings'     => array(/*
                        array(
                            'group' => 'JXREFERER_SETTINGS', 
                            'name'  => 'sJxRefererCampaign',  
                            'type'  => 'str', 
                            'value' => 'pk_campaign'
                            ),
                        array(
                            'group' => 'JXREFERER_SETTINGS', 
                            'name'  => 'sJxRefererKeyword',  
                            'type'  => 'str', 
                            'value' => 'pk_kwd'
                            ),
                        */)
);
