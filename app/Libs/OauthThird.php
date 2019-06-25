<?php
/**
 * OauthThird.php
 * User: Eric.Guo
 * Date: 2019/6/19
 * Time: 17:05
 *
 * TODO：第三方登陆
 */
namespace App\Libs;
class OauthThird
{
    /**
     * TODO 获取百度CODE
     *
     * @return mixed
     */
	public function getBaiduCode()
	{
        $code = request()->get('code');
        return $code;
	}

    public function getBaiduAccessToken()
    {
        $code = $this->getBaiduCode();
        $redirect_uri  = env('BAIDU_REDIRECT_URI');
        $client_secret = env('BAIDU_SECRET_KEY');
        $client_id     = env('BAIDU_API_KEY');
        $url           = "https://openapi.baidu.com/oauth/2.0/token?grant_type=authorization_code&code=$code&client_id=$client_id&client_secret=$client_secret&redirect_uri=$redirect_uri";
        # 发送CURL，获得Access_Token
        $res           = $this->https_request($url);
        $data          = json_decode($res, true);
        return $data['access_token'];
    }

    public function getBaiduUserinfo($accessToken='')
    {
        $access_token = $accessToken;
        $url  = 'https://openapi.baidu.com/rest/2.0/passport/users/getInfo?access_token='.$access_token;
        $res  = $this->https_request($url);
        $userinfo = json_decode($res, true);
        return $userinfo;
    }

    public static function https_request($url, $data = null){
        # 初始化一个cURL会话
        $curl = curl_init();
        //设置请求选项, 包括具体的url
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);  //禁用后cURL将终止从服务端进行验证
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
        if (!empty($data)){
            curl_setopt($curl, CURLOPT_POST, 1);  //设置为post请求类型
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);  //设置具体的post数据
        }
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($curl);  //执行一个cURL会话并且获取相关回复
        curl_close($curl);  //释放cURL句柄,关闭一个cURL会话
        return $response;
    }
}