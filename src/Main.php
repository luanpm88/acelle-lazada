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
        $record = $this->getDbRecord();
        $data = $record->getData();

        config([
            'lazada.key' => isset($data['lazada_key']) ? $data['lazada_key'] : null,
            'lazada.secret' => isset($data['lazada_secret']) ? $data['lazada_secret'] : null,
        ]);

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

        Hook::register('activate_plugin_'.self::NAME, function () {
            \Acelle\Plugin\Lazada\Main::test(config('lazada.key'), config('lazada.secret'));
        });

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

    public static function test($key, $secret)
    {
        $lazada = new \Acelle\Library\Lazada\LazadaConnection($key, $secret);
        $data = $lazada->getBrands();

        if(isset($data['type']) && $data['type'] == "ISV") {
            throw new \Exception('Lazada key or secret is not valid!');
        }
    }
}
