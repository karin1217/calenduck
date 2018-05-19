<?php

namespace App\Http\Controllers;

use App\Handlers\ApiRequestHandler;
use App\Models\Word;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KidsController extends Controller
{
    /**
     * 展示儿童页面
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function words()
    {
        return view('kids.words.show');
    }

    /**
     * 查找单词发音
     *
     * @param Request $request
     * @param ApiRequestHandler $apiRequestHandler
     */
    public function voice(Request $request, ApiRequestHandler $apiRequestHandler, Word $word)
    {
        // 请求的单词
        $requestWord = $request->word;
        // 查找数据库中是否存在
        $result = $word->where('word',$requestWord)->first();
        // 如果数据库中存在，则直接返回库中的结果
        if($result)
            exit($result->pronunciation);

        // 数据库是查找百度的 AccessToken
        $tokenInDB = DB::table('baidus')->first();
        // 如果数据不存在，则通过第三方发送请求
        if( ! $tokenInDB ){
            $accessToken = $this->_requireAccessToken($apiRequestHandler);
            // 存储到数据库中
            DB::table('baidus')->insert(['access_token'=>$accessToken]);

        } else {
            $accessToken = $tokenInDB->access_token;
        }

        $result = $this->_requireVoice($apiRequestHandler, $accessToken, $requestWord);

        if( ! $result )
            exit($result);

        $data['word'] = $requestWord;
        $data['pronunciation'] = $result;
        // 将读音存入数据库用作缓存
        $word->insert($data);

        exit($result);
    }

    /**
     * 通过 GuzzleHttp 发送一个百度语音合成请求
     *
     * @param ApiRequestHandler $apiRequestHandler
     * @param $accessToken
     * @param $word
     * @return string
     */
    private function _requireVoice(ApiRequestHandler $apiRequestHandler, $accessToken, $word)
    {
        $apiBaseUrl = 'http://tsn.baidu.com/';
        $apiName = 'text2audio';
        $apiParams = 'lan=zh&ctp=1&cuid=abcdxxx&tok='.$accessToken.'&tex='.urlencode($word).'&vol=9&per=0&spd=3&pit=5';

        $apiQuery = $apiName . '?' . $apiParams;
        $result = $apiRequestHandler->get($apiBaseUrl,$apiQuery);

        if( ! $result )
        {
            return false;
        }

        $result = base64_encode($result);
        return 'data:audio/mp3;base64,'.$result;
    }

    /**
     * 通过 GuzzleHttp 发送一个百度 AccessToken 请求
     *
     * @param ApiRequestHandler $apiRequestHandler
     * @return bool
     */
    private function _requireAccessToken(ApiRequestHandler $apiRequestHandler)
    {
        $apiBaseUrl = 'https://openapi.baidu.com/';
        $apiName = 'oauth/2.0/token';
        $apiParams = 'grant_type=client_credentials&client_id='.env('BD_APP_KEY').'&client_secret='.env('BD_APP_SECRET');

        $apiQuery = $apiName . '?' . $apiParams;
        $result = $apiRequestHandler->get($apiBaseUrl,$apiQuery);
        if( ! $result )
            return false;

        $result = json_decode($result);
        return $result->access_token;
    }
}
