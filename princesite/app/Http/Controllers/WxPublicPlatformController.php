<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WxPublicPlatformController extends Controller
{
    //
    public function initCheck(Request $request){
        
        $signature = $request->signature;
        $timestamp = $request->timestamp;
        $nonce = $request->nonce;
        $tmpArr = array($timestamp,$nonce);
        sort($tmpArr, SORT_STRING);
        $tmpStr = implode($tmpArr);
        $compressed_signature = sha1($tmpStr);
        if($compressed_signature == $signature){
            return TRUE;
        }else{
            return FALSE;
        }
    }
}
