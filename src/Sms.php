<?php

namespace LaraMall\AlidySms;
use LaraMall\AlidySms\Alidayu;

class Sms
{
    //手机号码
    protected $phone;
    //session key
    protected $key;
    //短信模板中的字段
    protected $field;
    //短信内容
    protected $content;
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
    public function put($key,$value)
    {
    	$this->$key 		= $value;
    	return $this;
    }

    /*
    |-------------------------------------------------------------------------------
    |
    | 发送短信函数
    |
    |-------------------------------------------------------------------------------
    */
    public function send(array $data=array())
    {
        $obj       = new Alidayu(config('sms.ACCESS_KEY_ID'),config('sms.ACCESS_KEY_SECRET'));
        $response   = $obj->sendSms(
                                $this->signName,           // 短信签名
                                $this->templateCode,       // 短信模板编号
                                $this->phone,              // 短信接收者
                                $data,                     // 短信模板中字段的值
                                ""                         // 流水号
        );
        //发送失败
        return $response->Code =='OK';
    }
}