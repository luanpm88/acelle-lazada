<?php

namespace Acelle\Plugin\Lazada\Controllers;

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
}
