<?php

namespace Acelle\Plugin\Lazada\Controllers;

use Validator;
use Acelle\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Acelle\Plugin\Lazada\Main;
use Acelle\Model\SendingServer;

class MainController extends Controller
{
    /**
     * Lazada setting page.
     *
     * @return string
     **/
    public function index(Request $request)
    {
        $main = new Main();
        $record = $main->getDbRecord();
        $data = $record->getData();

        return view('lazada::index', [
            'plugin' => $record,
            'data' => $data,
        ]);
    }

    /**
     * Save setting.
     *
     * @return string
     **/
    public function save(Request $request)
    {
        $main = new Main();
        $record = $main->getDbRecord();
        $data = $record->getData();

        $validator = Validator::make($request->all(), [
            'lazada_key' => 'required',
            'lazada_secret' => 'required',
        ]);

        // save
        $record->updateData([
            'lazada_key' => $request->lazada_key,
            'lazada_secret' => $request->lazada_secret,
        ]);

        // redirect if fails
        if ($validator->fails()) {
            return view('lazada::index', [
                'errors' => $validator->errors(),
                'plugin' => $record,
                'data' => $data,
            ]);
        }

        // success
        $request->session()->flash('alert-success', trans('lazada::messages.setting.updated'));
        return redirect()->action('Admin\PluginController@index');
    }
}
