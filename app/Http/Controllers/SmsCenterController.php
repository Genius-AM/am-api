<?php

namespace App\Http\Controllers;

use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use \Illuminate\Support\Facades\Log;

class SmsCenterController extends Controller
{
    protected const MIN_INT_COD = 11111;
    protected const MAX_ITN_COD = 99999;


    protected $login;
    protected $psw;


    public function __construct()
    {
        $this->login = config('services.smscru.login');
        $this->psw = config('services.smscru.password');
    }

    public function create(): SmsCenterController
    {
        return new static();
    }


    public function send(Request $request,)
    {
        $mes = rand(self::MIN_INT_COD, self::MAX_ITN_COD);
        $session = Session::put('SmsCode', $mes);

        $client = new Client();

        $response = $client->request('get', 'https://smsc.ru/sys/send.php', [
            'form-params' => [
                'login' => config('services.smscru.login'),
                'psw' => config('services.smscru.password'),
                'phones' => $request->input('phone'),
                'mes' => $session
            ]
        ]);
    }

    public function checkCod(Request $request)
    {
        if( $request->input('smsCod') == $request->session()->get('SmsCode') ){
                return redirect()->route('des');
        }
        else{
            Log::error('Неправильный код');
        }
    }
}
