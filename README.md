# AlidySms
<p>新版阿里大于短信接口的Laravel组件 for Laravel 5.5+ </p>

https://dysms.console.aliyun.com/dysms.htm
# 系统要求
````
php >= 7.0+

laravel >= 5.5+

````

# 安装
````
composer require tongv/aliyun-dysms
````
# 设置配置文件
````
php artisan vendor:publish --provider="LaraMall\AlidySms\AlidySmsServiceProvider"

修改 config/sms.php 中的阿里大于短信相关参数

  	//id
	'ACCESS_KEY_ID'=>'',
	//秘钥
	'ACCESS_KEY_SECRET'=>'',
	//config 每个操作对应的签名和模版编号
    'CONFIG'=>[
        'register'=>['签名','SMS_115928888'],
    ],
````

# 使用

<img src="http://ox5dwi7xi.bkt.clouddn.com/github/sms-tp.png">

````
use Sms;

//短信发送成功 下面函数返回 true 反之 false
Sms::sned('13800000000','register',['code'=>'123456']);

````



