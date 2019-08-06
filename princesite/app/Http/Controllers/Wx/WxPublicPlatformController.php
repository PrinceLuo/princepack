<?php

namespace App\Http\Controllers\Wx;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//include app_path().'Util/cardSDK.php';

class WxPublicPlatformController extends Controller {

    //
    public function initCheck(Request $request) {
          

//        $token = 'luo_test_token';
        $token = 'wechat_token_20190715';
        $signature = $request->signature;
        \Illuminate\Support\Facades\Log::info('Check the signature from request: '. $signature);
//        $signature = '';
        $timestamp = $request->timestamp;
//        $timestamp = time();
//        echo $timestamp."<br>";
        $nonce = $request->nonce;
//        $nonce = 12345;
        
        $echostr = $request->echostr;
//        $echostr = 'abcde';
        $tmpArr = array($timestamp, $nonce, $token);
        sort($tmpArr, SORT_STRING);
        $tmpStr = implode($tmpArr);
        $compressed_signature = sha1($tmpStr);
//        var_dump($compressed_signature);die();
        \Illuminate\Support\Facades\Log::info('Check the signature we made: '.$compressed_signature);
        if ($compressed_signature == $signature) {
            return $echostr;
        } else {
            return 'Fail.';
        }
 
//        $token = 'wechat_token_20190715';
//        $signature = $request->signature;
//        $timestamp = $request->timestamp;
//        $nonce = $request->nonce;
//        $echostr = $request->echostr;
//        $signature_obj = new Signature();
//        $signature_obj->add_data($token);
//        $signature_obj->add_data($timestamp);
//        $signature_obj->add_data($nonce);
//        $encrypt_signature = $signature_obj->get_signature();
//        if($encrypt_signature == $signature){
//            return $echostr;
//        }else{
//            return NULL;
//        }
    }

    /*
    public function uploadLogo() {
//        echo storage_path();
//        exit();
//        session()->flush();
//        $content = \Illuminate\Support\Facades\Storage::get('public/punching.jpg');
//        $content = file_get_contents(public_path('images/brand/punching.jpg'));
        $data = [];
        $filepath = public_path('images/brand/punching.jpg');
        if(class_exists('\CURLFile')){
            $data['buffer'] = new \CURLFile($filepath, 'image/jpeg');
        }else{
            $data['buffer'] = '@'.realpath($filepath);
        }
//        $access_token = $this->getAccessToken();
        $access_token = $this->getAccessToken();
        if ($access_token) {
            echo "Check the access token here: " . $access_token . "<br>";
        } else {
            echo "Fail getting the access token.";
        }
//        $data['buffer'] = $content;
        $url = 'http://api.weixin.qq.com/cgi-bin/media/uploadimg?access_token=' . $access_token;
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_NOBODY, 0);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        $r = curl_exec($curl);
        curl_close($curl);
        dd($r);
//        $client = new \GuzzleHttp\Client();
//        try {
//            $response = $client->request('POST', 'http://api.weixin.qq.com/cgi-bin/media/uploadimg?access_token=' . $access_token . '&type=image', [
//                'query' => [
//                    'buffer' => $content,
//                    'access_token' => $access_token,
//                    'type'=>'image',
//                    ]
//            ]);
//            dd($response->getBody()->getContents());
////                print_r($response->getBody());
//            exit();
//        } catch (\GuzzleHttp\Exception\RequestException $ex) {
//            echo \GuzzleHttp\Psr7\str($ex->getRequest());
//            if ($ex->hasResponse()) {
//                echo \GuzzleHttp\Psr7\str($ex->getResponse());
//            }
//        }
//        echo "Check the access token here: ".$access_token;
    }
*/

    public function testAccessToken() {
        // get the token and save it to session
        $appid = config('services.WxPublicPlatformTest.APPID');
        $appsecret = config('services.WxPublicPlatformTest.APPSECRET');
        $client = new \GuzzleHttp\Client();
        try {
            $response = $client->request('GET', 'https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid='
                    . $appid . '&secret=' . $appsecret);
//            dd($response->getBody());
            $arr = json_decode($response->getBody()->getContents());
            var_dump($arr->access_token);
        } catch (\GuzzleHttp\Exception\RequestException $ex) {
            echo \GuzzleHttp\Psr7\str($ex->getRequest());
            if ($ex->hasResponse()) {
                echo \GuzzleHttp\Psr7\str($ex->getResponse());
            }
        }
    }

    private function getAccessToken() {
        $appid = config('services.WxPublicPlatformTest.APPID');
        $appsecret = config('services.WxPublicPlatformTest.APPSECRET');
        $access_token = NULL;
        $client = new \GuzzleHttp\Client();
        try {
            $response = $client->request('GET', 'https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid='
                    . $appid . '&secret=' . $appsecret);
//            dd($response->getBody());
//            $access_token = json_decode($response->getBody()->getContents())->access_token;
//            var_dump($arr->access_token);
            $res_obj = json_decode($response->getBody()->getContents());
            if (property_exists($res_obj, 'errcode')) {
                $content = $response->getBody()->getContents();
//                print_r($response->getBody()->getContents());
                \Illuminate\Support\Facades\Log::info('Recieve an error message while requesting the Wx access_token: ' . $content);
                return NULL;
            } elseif (property_exists($res_obj, 'access_token')) {
                return $res_obj->access_token;
            } else {
                \Illuminate\Support\Facades\Log::info('Recieve an unexpected response while requesting the Wx access_token: ' . $content);
            }
        } catch (\GuzzleHttp\Exception\RequestException $ex) {
            // should put it into log
//            echo \GuzzleHttp\Psr7\str($e->getRequest());
            $exception_message = \GuzzleHttp\Psr7\str($ex->getRequest());
            \Illuminate\Support\Facades\Log::info('Catch an exception while requesting the Wx access_token: ' . $exception_message);
            if ($ex->hasResponse()) {
//                echo \GuzzleHttp\Psr7\str($e->getResponse());
                $exception_message = \GuzzleHttp\Psr7\str($ex->getResponse());
                \Illuminate\Support\Facades\Log::info('Catch an exception while requesting the Wx access_token: ' . $exception_message);
            }
            return NULL;
        }
        return $access_token;
    }

    public function uploadLogo() {

        $url = NULL;
        $data = [];
        $filepath = public_path('images/brand/punching.jpg');
        if(class_exists('\CURLFile')){
            $data['buffer'] = new \CURLFile($filepath, 'image/jpeg');
        }else{
            $data['buffer'] = '@'.realpath($filepath);
        }
        $access_token = $this->getAccessToken();
        if ($access_token) {
            echo "Check the access token here: " . $access_token . "<br>";
        } else {
            echo "Fail getting the access token.";
        }
        $url = 'http://api.weixin.qq.com/cgi-bin/media/uploadimg?access_token=' . $access_token;
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_NOBODY, 0);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        $r = curl_exec($curl);
        curl_close($curl);
//        dd($r);
        $res_obj = \GuzzleHttp\json_decode($r);
        if (property_exists($res_obj, 'errcode')){
            $content = $response->getBody()->getContents();
            \Illuminate\Support\Facades\Log::info('Recieve an error message while requesting the Wx logo url: ' . $content);
            return NULL;
        }elseif(property_exists($res_obj, 'url')){
            return $res_obj->url;
        }else{
            \Illuminate\Support\Facades\Log::info('Recieve an unexpected response while requesting the Wx logo url: ' . $content);
            return NULL;
        }
    }
}
