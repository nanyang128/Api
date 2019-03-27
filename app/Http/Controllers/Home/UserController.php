<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    //hbuilder登录接口
    public function login(Request $request){
        $arr=$request->all();

        $url="http://passport.nanyang128.club/pas_login";

        $data=[
            'username'=>$arr['username'],
            'password'=>$arr['password'],
        ];

        $api_data=$this->curlRequest($url,$data);
        print_r($api_data);

    }

    //hbuilder注册接口
    public function register(Request $request){

        $arr=$request->all();

        $url="http://passport.nanyang128.club/register";

        $data=[
            'username'=>$arr['username'],
            'phone'=>$arr['phone'],
            'password'=>$arr['password']
        ];

        $register_data=$this->curlRequest($url,$data);
        print_r($register_data);
    }

    //hbuolder退出接口
    public function secede(Request $request){
        $arr=$request->all();

        $url="http://passport.nanyang128.club/pas_secede";

        $data=[
            'id'=>$arr['id'],
        ];
        $api_data=$this->curlRequest($url,$data);
        print_r($api_data);

    }






    /**
    使用curl方式实现get或post请求
    @param $url 请求的url地址
    @param $data 发送的post数据 如果为空则为get方式请求
    return 请求后获取到的数据
     */
    function curlRequest($url,$data = ''){
        $ch = curl_init();
        $params[CURLOPT_URL] = $url;    //请求url地址
        $params[CURLOPT_HEADER] = false; //是否返回响应头信息
        $params[CURLOPT_RETURNTRANSFER] = true; //是否将结果返回
        $params[CURLOPT_FOLLOWLOCATION] = true; //是否重定向
        $params[CURLOPT_TIMEOUT] = 30; //超时时间
        if(!empty($data)){
            $params[CURLOPT_POST] = true;
            $params[CURLOPT_POSTFIELDS] = $data;
        }
        $params[CURLOPT_SSL_VERIFYPEER] = false;//请求https时设置,还有其他解决方案
        $params[CURLOPT_SSL_VERIFYHOST] = false;//请求https时,其他方案查看其他博文
        curl_setopt_array($ch, $params); //传入curl参数
        $content = curl_exec($ch); //执行
        curl_close($ch); //关闭连接
        return $content;
    }
}
