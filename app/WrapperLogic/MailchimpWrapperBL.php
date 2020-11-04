<?php
/**
 * Created by PhpStorm.
 * User: Owner
 * Date: 11/2/2020
 * Time: 10:29 PM
 */

namespace App\WrapperLogic;
use app\Helper\MailchimpFunctions;
use App\event_activities;
use Exception;
use Illuminate\Support\Facades\DB;


class MailchimpWrapperBL
{
    public static function runCampaign()
    {
        try {
            /*//echo "Hello";
            $ninetyDaysAgo = date('Y-m-d', mktime(0, 0, 0, date("m"), date("d") - 800, date("Y")));
            $sentCampaigns = MailchimpFunctions::getCampaignDetails("942c3853687689d38a01ba79385b6211-us17", 'sent', 3);
            //$latestCampaignSendTime = explode("T", $sentCampaigns[0]["send_time"])[0];
            //$twoWeeksFromLatestCampaign = date('Y-m-d', strtotime('-14 days', strtotime($latestCampaignSendTime)));

            var_dump($sentCampaigns);

            $event = new event_activities();
            $event->email = 'darvin.krishnan@ematicsolutions.com';
            $event->open_timestamp = '2020-08-08 00:00:00';
            $event->click_timestamp = '2020-08-08 00:00:00';

            $event->save();*/

         }
        catch (\Exception $e) {
            var_dump('Error occurred', $e->getMessage());
        }
    }
}