<?php

namespace LaraMall\AlidySms;

use LaraMall\AlidySms\Alidayu;

class Sms
{
    //手机号码
    protected $phone;
    //模板签名
    protected $signName;
    //短信模板编号
    protected $templateCode;

    /*
    |-------------------------------------------------------------------------------
    |
    | 设置属性 链似操作
    |
    |-------------------------------------------------------------------------------
    */
    public function put($key, $value)
    {
        $this->$key = $value;
        return $this;
    }

    /*
    |-------------------------------------------------------------------------------
    |
    | 发送短信执行函数
    |
    |-------------------------------------------------------------------------------
    */
    public function send_exec(array $data = array())
    {
        $obj = new Alidayu(config('sms.ACCESS_KEY_ID'), config('sms.ACCESS_KEY_SECRET'));
        $response = $obj->sendSms(
            $this->signName,           // 短信签名
            $this->templateCode,       // 短信模板编号
            $this->phone,              // 短信接收者
            $data,                     // 短信模板中字段的值
            ""                         // 流水号
        );
        //发送失败
        return $response->Code == 'OK';
    }

    /*
    |-------------------------------------------------------------------------------
    |
    | 发送短信函数
    |
    |-------------------------------------------------------------------------------
    */
    public function send($phone,$act,array $data = array())
    {
        $this->put('phone',$phone);
        list($this->signName,$this->templateCode) = config('sms.CONFIG')[$act];
        return $this->send_exec($data);
    }
}