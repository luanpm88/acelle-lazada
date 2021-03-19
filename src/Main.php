<?php

namespace Acelle\Plugin\Lazada;

use Acelle\Model\Plugin as PluginModel;
use Acelle\Library\Facades\Hook;

class Main
{
    const NAME = 'acelle/lazada';
    protected $data;

    public function __construct()
    {
        //
    }

    public function getDbRecord()
    {
        return PluginModel::where('name', self::NAME)->first();
    }

    public function registerHooks()
    {
        // // Register hooks
        // Hook::register('filter_aws_ses_dns_records', function (&$identity, &$dkims, &$spf) {
        //     $this->removeAmazonSesBrand($identity, $dkims, $spf);
        // });

        // // Register hooks
        // Hook::register('generate_big_notice_for_sending_server', function ($server) {
        //     return view('awswhitelabel::notification', [
        //         'server' => $server,
        //     ]);
        // });

        // Hook::register('activate_plugin_'.self::NAME, function () {
        //     // Run this method as a test
        //     $this->getRoute53Domains();
        // });

        // Hook::register('deactivate_plugin_'.self::NAME, function () {
        //     return true; // or throw an exception
        // });

        // Hook::register('delete_plugin_'.self::NAME, function () {
        //     return true; // or throw an exception
        // });
    }

    public function activate()
    {
        $record = $this->getDbRecord();
        $record->activate();
    }
}
