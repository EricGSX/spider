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

	private function getBaiduCode()
	{
	    //DOC http://developer.baidu.com/wiki/index.php?title=docs/oauth/rest/file_data_apis_list

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
        $url  = 'https://openapi.baidu.com/rest/2.0/passport/users/getLoggedInUser?access_token='.$access_token;
        $res  = $this->https_request($url);
        $userinfo = json_decode($res, true);
        return $userinfo;
    }

    public function baiduLogout($accessToken='')
    {
        $access_token = $accessToken;
        $url  = 'https://openapi.baidu.com/rest/2.0/passport/auth/revokeAuthorization?access_token='.$access_token;
        $res  = $this->https_request($url);
        $result = json_decode($res, true);
        return $result;
    }

    public function getGithubCode()
    {
        $code = request()->get('code');
        return $code;
    }

    public function getGithubAccessToken()
    {
        //https://alone88.cn/archives/525.html
        $code = $this->getGithubCode();
        $ch = curl_init();
        $data = array(
            'client_id'=>env('GITHUB_CLIENTID'),
            'client_secret'=>env('GITHUB_SECRET_KEY'),
            'code'=>$code,
            'redirect_uri'=>env('GITHUB_REDIRECT_URI'),
            'grant_type'=>'authorization_code',
        );
        dump($data);
        $url = "https://github.com/login/oauth/access_token";
        $res           = $this->https_request($url,$data);
        dd($res);
        curl_setopt($ch, CURLOPT_URL,"https://github.com/login/oauth/access_token");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: application/json'));
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $server_output = curl_exec($ch);
        var_dump($server_output);




        die;
        $redirect_uri  = env('GITHUB_REDIRECT_URI');
        $client_secret = env('GITHUB_SECRET_KEY');
        $client_id     = env('GITHUB_CLIENTID');
        $url           = "https://github.com/login/oauth/access_token?code=$code&client=$client_id&client secret=$client_secret";
        # 发送CURL，获得Access_Token
        $res           = $this->https_request($url);
        $data          = json_decode($res, true);
        return $res;
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