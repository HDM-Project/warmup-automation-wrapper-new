<?php
/**
 * Created by PhpStorm.
 * User: Owner
 * Date: 11/2/2020
 * Time: 10:29 PM
 */

namespace App\Helper;
use Exception;
use DrewM\MailChimp\MailChimp;


class MailchimpFunctions
{

    /*
     * Gets sent camapigns from date...
     */
    public static function getSentCampaigns($mailChimpApiKey, $since_send_time, $count, $offset)
    {
        try {

            $mailChimp = new MailChimp($mailChimpApiKey);

            $getCampaignsDetails = [];

            $counts = $count;
            $offsets = $offset;
            $status = 'sent';
            $allCampaigns = [];

            do {
                $getCampaignsDetails['count'] = $counts;
                $getCampaignsDetails['offset'] = $offsets;
                $getCampaignsDetails['status'] = $status;
                $getCampaignsDetails['since_send_time'] = $since_send_time;

                $campaigns = $mailChimp->get('campaigns', $getCampaignsDetails, 300);

                if (!$mailChimp->success()) {
                    $error = $mailChimp->getLastError();
                    throw new \Exception("Error getting sent campaigns: $error");
                }

                $campaigns = $campaigns['campaigns'];
                $allCampaigns = array_merge($allCampaigns, $campaigns);

                $offset += $count;
            } while (!empty($campaigns));

            return $allCampaigns;
        }

        catch (\Exception $e) {
            var_dump('Error occurred', $e->getMessage());
        }

    }

    public static function getCampaignDetails($mailChimpApiKey, $status, $count, $offset, $since_send_time)
    {
        try {

            $mailChimp = new MailChimp($mailChimpApiKey);

            $getListCountArgs = [];
            $getListCountArgs['count'] = $count;
            $getListCountArgs['offset'] = $offset;
            $getListCountArgs['since_send_time'] = $since_send_time;
            $getListCountArgs['status'] = $status;

            $result = $mailChimp->get("/campaigns", $getListCountArgs, 300);

            if (!$mailChimp->success()) {
                $error = $mailChimp->getLastError();
                throw new \Exception("Error getting list count: $error");
            }

            return $result;
        }
        catch (\Exception $e) {
            var_dump('Error occurred', $e->getMessage());
        }

    }

    public static function getSubscriberEmailActivity($mailChimpApiKey, $campaignId, $count, $offset)
    {
        try {

            $mailChimp = new MailChimp($mailChimpApiKey);

            $getListCountArgs = [];
            $getListCountArgs['fields'] = $count;
            $getListCountArgs['fields'] = $offset;

            $result = $mailChimp->get("/reports/$campaignId", $getListCountArgs, 300);

            if (!$mailChimp->success()) {
                $error = $mailChimp->getLastError();
                throw new \Exception("Error getting list count: $error");
            }

            return $result;
        }
        catch (\Exception $e) {
            var_dump('Error occurred', $e->getMessage());
        }
    }


    public static function getSubscriberList($mailChimpApiKey, $mailChimpListId, $count, $offset, $userstatus)
    {
        try {

            $mailChimp = new MailChimp($mailChimpApiKey);

            $getListCountArgs = [];
            $getListCountArgs['fields'] = $count;
            $getListCountArgs['fields'] = $offset;
            $getListCountArgs['fields'] = $userstatus;

            $result = $mailChimp->get("/lists/$mailChimpListId/members", $getListCountArgs, 300);

            if (!$mailChimp->success()) {
                $error = $mailChimp->getLastError();
                throw new \Exception("Error getting list count: $error");
            }

            return $result['members'];
        }
        catch (\Exception $e) {
            var_dump('Error occurred', $e->getMessage());
        }

    }

}