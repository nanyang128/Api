<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AliPayController extends Controller
{
    //hbuilder支付宝接口
    public function aliPay(Request $request){
        $data=$request->all();
        print_r($data);
    }
}
