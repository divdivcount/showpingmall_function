<!doctype html>
<html>
<head>
    <meta charset="utf-8">
</head>
<body>

<?php 
    $url  = "http://www.kobis.or.kr/kobisopenapi/webservice/rest/boxoffice/searchDailyBoxOfficeList.json";
    $url .= "?key=16e98c70e5626702a383a60b381d066c";
    $url .= "&targetDt=20200101";
    
    $ch = curl_init(); 
    
    curl_setopt($ch, CURLOPT_URL, $url); 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
    
    $response = curl_exec($ch);
    if (!$response) {
        exit("Error #" . curl_errno($ch) . ": " . curl_error($ch));
    }
    
    $data = json_decode($response);
    
    $list = $data->boxOfficeResult->dailyBoxOfficeList;
    
    for ($i = 0; $i < count($list); $i++) {
        echo "순위: ", $list[$i]->rank, "<br>";
        echo "이름: ", $list[$i]->movieNm, "<br>";
        echo "누적관객수: ", $list[$i]->audiAcc, "<br><br>";
    }
    
    curl_close ($ch); 
?>    

</body>
</html>