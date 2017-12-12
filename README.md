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
````

# 使用

<img src="http://ox5dwi7xi.bkt.clouddn.com/github/sms-tp.png">

````
use Sms;

//短信发送成功 下面函数返回 true 反之 false
Sms::put('phone','13800000000')->send();

````


# 所有参数完全自定义发送短信模式

````
Sms::put('phone',$phone) //接受短信的手机号
   ->put('signName',$signName) //短信签名
   ->put('templateCode',$templateCode) //短信模板编号
   ->send(['code'=>9999]); //发送短信

````

//验证短信已写入表单验证规则
//假设表单中短信验证码的字段为 code

````
$rules = ['code'=>'required|sms'];

````



