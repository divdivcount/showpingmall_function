<!doctype html>
<html>
<head>
    <meta charset="utf-8">
</head>
<body>

<?php 
    $url  = "https://dapi.kakao.com/v2/local/search/keyword.json";
    $url .= "?query=" . urlencode("신구대학교 남관"); 
    
    $ch = curl_init(); 
    
    curl_setopt($ch, CURLOPT_URL, $url); 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
    curl_setopt($ch, CURLOPT_HTTPHEADER, ["Authorization: KakaoAK 04d1584681e321464818e8d4b96d96d6"]); 
    
    $response = curl_exec($ch);
    if (!$response) {
        exit("Error #" . curl_errno($ch) . ": " . curl_error($ch));
    }
  
    $data = json_decode($response);
    $p = $data->documents[0];
    
    echo "이름: ", $p->place_name, "<br>";
    echo "지번주소: ", $p->address_name, "<br>";
    echo "도로명주소: ", $p->road_address_name, "<br>";
    echo "경도(x): ", $p->x, "<br>";
    echo "위도(y_: ", $p->y, "<br>";
    
    curl_close ($ch); 
?>    

</body>
</html>