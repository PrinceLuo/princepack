<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WxPublicPlatformController extends Controller
{
    //
    public function initCheck(Request $request){
        
        $token = 'luo_test_token';
        $signature = $request->signature;
        $timestamp = $request->timestamp;
        $nonce = $request->nonce;
        $echostr = $request->echostr;
        $tmpArr = array($timestamp,$nonce,$token);
        sort($tmpArr, SORT_STRING);
        $tmpStr = implode($tmpArr);
        $compressed_signature = sha1($tmpStr);
        if($compressed_signature == $signature){
            return $echostr;
        }else{
            return '';
        }
    }
}
