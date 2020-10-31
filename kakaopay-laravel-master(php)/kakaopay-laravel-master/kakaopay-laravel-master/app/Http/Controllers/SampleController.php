<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sample;

class SampleController extends Controller
{
    private $SampleService;

    function __construct() {
        // Sample 모델에서 return 받은 TID 를 approve 에서 이용할 수 있는 방법을 고민해야함.
        $this->SampleService = new Sample();
    }

    public function ready(Request $req, $agent, $opentype) {

        $readyResponse = $this->SampleService->ready($agent, $opentype);
        $req->session()->push('TID',$readyResponse->tid);

        $data = [];

        if ($agent == 'mobile') {
            // 모바일은 결제대기 화면으로 redirect 한다.
            // In mobile, redirect to payment stand-by screen
            return \Redirect::to($readyResponse->next_redirect_mobile_url);
        }

        if ($agent == 'app') {
            // 앱에서 결제대기 화면을 올리는 webview 스킴
            // In app, webview app scheme for payment stand-by screen
            $data = [ "webviewUrl" => "app://webview?url=".$readyResponse->next_redirect_app_url ];
            return \View::make('app.webview.ready')->with($data);
        }

        // pc
        $data = [ 'response' => $readyResponse ];
        return \View::make("$agent.$opentype.ready")->with($data);
    }

    public function approve(Request $req, $agent, $opentype) {
        $approveResponse = $this->SampleService->approve($req['pg_token'],$req->session()->pull('TID')[0]);
        $data = [ 'response' => $approveResponse ];
        return \View::make("$agent.$opentype.approve")->with($data);
    }

    public function cancel(Request $req, $agent, $opentype) {
        return \View::make("$agent.$opentype.cancel");
    }

    public function fail(Request $req, $agent, $opentype) {
        return \View::make("$agent.$opentype.fail");
    }
}
