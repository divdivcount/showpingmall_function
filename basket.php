<?php
session_start();
?>
<!doctype html>
<html>
<head>
  <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
  <script type="text/javascript" src="https://service.iamport.kr/js/iamport.payment-1.1.5.js"></script>
  <style>
.table {
  border-collapse: collapse;
  border-top: 3px solid #168;
}
.table th {
  color: #168;
  background: #f0f6f9;
  text-align: center;
}
.table th, .table td {
  padding: 10px;
  border: 1px solid #ddd;
}
.table th:first-child, .table td:first-child {
  border-left: 0;
}
.table th:last-child, .table td:last-child {
  border-right: 0;
}
.table tr td:first-child{
  text-align: center;
}
.table caption{caption-side: bottom; display: none;}
  </style>
  <?php require_once('modules/form_head.php'); ?>
</head>
<body>

<?php
// $cart = explode(',', $_SESSION["cart"]);
// for ($i = 0; $i < count($cart); $i+=4) {
//
//         $var = $cart[$i];
//         if(!empty($var)){
//         $id = $cart[$i + 1];
//         $price = $cart[$i + 2];
//         $name = $cart[$i + 3];
//         $d[$var][$id]["price"] = $price;
//         $d[$var][$id]["name"] = $name;
//         $d[$var][$id]["qty"]++;
//       }
//     }

    ?>
      <table class= "table">
        <th>
        품목
        </th>
        <th>
        품목 아이디
        </th>
        <th>
        제품 이름
        </th>
        <th>
        제품 가격
        </th>
        <th>
        수량
        </th>
        <th>
        삭제
        </th>
        <?php
          $d = $_SESSION["cart"];
          print_r( $d);
        if(!$d){
          ?>
          <tr>
            <td>장바구니를 담아주세요</td>
          </tr>
          <?php
        }else{
          $k = 0;
        foreach ($d as $cat_key => $cat_arr) {
            foreach ($cat_arr as $id_key => $id_val) {
                $k++;
              ?>

        <tr>
          <td>
          <?= $cat_key ?>
          </td>
          <td>
          <?= $id_key ?>
          </td>
          <td>
          <?= $id_val["name"] ?>
          </td>
          <td>
          <?= $id_val["price"]*$id_val["qty"] ?>
          </td>
          <td>
          <form action="changeqty.php?" method="get">
          <input type="hidden" name="var" value="<?=$cat_key?>">
          <input type="hidden" name="id" value="<?= $id_key ?>">
          <input type="text" id="qty<?= $k ?>" name="qty" value="<?= $id_val["qty"] ?>">
          <input type="button" name="" value="^" onclick="document.getElementById('qty<?= $k ?>').value++" />
          <input type="button" name="" value="v" onclick="document.getElementById('qty<?= $k ?>').value--"/>

          <input type="submit" value="수량변경" />
        </form>
          </td>
          <td>
          <input type="button" class="button vertical" id="obj" value="삭제" onclick="javascript:location.href='cart_del.php?var=<?= $cat_key ?>&id=<?= $id_key ?>&name=<?= $id_val["name"] ?>'"/>
          </td>
        </tr>
          <?php
          $total = [$id_val["price"]*$id_val["qty"]];

          for($i = 0; $i < count($total); $i++){
             $sum += $total[$i];
            }
          ?>
        <?php
                }
              }
              echo $sum."총금액";
            }
            function qty_down(){
              $d[$var][$id]["qty"]--;
            }
            ?>
      </table>
      <button id="check_module" type="button">결제</button>
    </body>

    <script>

    $("#check_module").click(function () {
    var IMP = window.IMP; // 생략가능
    IMP.init('imp70544914');

    IMP.request_pay({
    pg: 'kakao', // version 1.1.0부터 지원.
    /*
    'kakao':카카오페이,
    html5_inicis':이니시스(웹표준결제)
    'nice':나이스페이
    'jtnet':제이티넷
    'uplus':LG유플러스
    'danal':다날
    'payco':페이코
    'syrup':시럽페이
    'paypal':페이팔
    */
    pay_method: 'card',
    /*
    'samsung':삼성페이,
    'card':신용카드,
    'trans':실시간계좌이체,
    'vbank':가상계좌,
    'phone':휴대폰소액결제
    */
    merchant_uid: 'merchant_' + new Date().getTime(),
    /*
    merchant_uid에 경우
    https://docs.iamport.kr/implementation/payment
    위에 url에 따라가시면 넣을 수 있는 방법이 있습니다.
    참고하세요.
    나중에 포스팅 해볼게요.
    */
    name: '주문명:결제테스트',
    //결제창에서 보여질 이름
    amount: 1000,
    //가격
    buyer_email: 'iamport@siot.do',
    buyer_name: '구매자이름',
    buyer_tel: '010-1234-5678',
    buyer_addr: '서울특별시 강남구 삼성동',
    buyer_postcode: '123-456',
    m_redirect_url: 'https://localhost/ky_project/basket.php'
    /*
    모바일 결제시,
    결제가 끝나고 랜딩되는 URL을 지정
    (카카오페이, 페이코, 다날의 경우는 필요없음. PC와 마찬가지로 callback함수로 결과가 떨어짐)
    */
    }, function (rsp) {
    console.log(rsp);
    if (rsp.success) {
    var msg = '결제가 완료되었습니다.';
    msg += '고유ID : ' + rsp.imp_uid;
    msg += '상점 거래ID : ' + rsp.merchant_uid;
    msg += '결제 금액 : ' + rsp.paid_amount;
    msg += '카드 승인번호 : ' + rsp.apply_num;
    } else {
    var msg = '결제에 실패하였습니다.';
    msg += '에러내용 : ' + rsp.error_msg;
    }
    alert(msg);
    });
    });
    </script>
    </html>
