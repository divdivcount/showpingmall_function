<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sample extends Model
{
    private $tid;

    public function ready($agent, $openType) {

        $properties = \Config::get('kakaopay.properties');
        $client = new \GuzzleHttp\Client();

        $form_params = [];
        $form_params["cid"] = $properties['cid'];                       // 가맹점 코드
        $form_params["partner_order_id"] = "test12345";                 // 주문번호 : test12345  를 사용
        $form_params["partner_user_id"] = "1";                          // 회원 ID
        $form_params["item_name"] = "상품명";                           // 상품명
        $form_params["quantity"] = "1";                                 // 수량
        $form_params["total_amount"] = "1100";                          // 상품 총액
        $form_params["tax_free_amount"] = "0";                          // 상품 비과세 금액
        $form_params["vat_amount"] = "100";                             // 상품 부가세 금액

        $form_params["approval_url"] = $properties['sample_host']."/approve/$agent/$openType";  // 결제성공 redirect url
        $form_params["cancel_url"] = $properties['sample_host']."/cancel/$agent/$openType";     // 결제취소 redirect url
        $form_params["fail_url"] = $properties['sample_host']."/fail/$agent/$openType";         // 결제실패 redirect url

        $request = $client->post('https://kapi.kakao.com/v1/payment/ready', [
            'headers' => [
                'Authorization' => 'KakaoAK '.$properties['kakao_api_admin_key'],
                'Content-Type' => 'application/x-www-form-urlencoded',
            ],
            'form_params' => $form_params
        ]);

        $readyResponse = json_decode((string)$request->getBody());
        $this->tid = $readyResponse->tid;

        return $readyResponse;
    }

    public function approve($pg_token,$tid) {
        $properties = \Config::get('kakaopay.properties');
        $client = new \GuzzleHttp\Client();

        $form_params = [];
        $form_params["cid"] = $properties['cid'];                       // 가맹점 코드
        $form_params["tid"] = $tid;                                     // 결제 고유번호
        $form_params["partner_order_id"] = "test12345";                 // 주문번호(ready할 때 사용했던 값)
        $form_params["partner_user_id"] = "1";                          // 회원 ID(ready할 때 사용했던 값)
        $form_params["pg_token"] = $pg_token;                           // pg token

        try {
            $request = $client->post('https://kapi.kakao.com/v1/payment/approve', [
                'headers' => [
                    'Authorization' => 'KakaoAK '.$properties['kakao_api_admin_key'],
                    'Content-Type' => 'application/x-www-form-urlencoded',
                ],
                'form_params' => $form_params
            ]);

            $approveResponse = $request->getBody();

            return $approveResponse;
        } catch (Exception $e) {
            return $e;
        }
    }
}
