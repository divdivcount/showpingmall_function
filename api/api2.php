<!doctype html>
<html>
<head>
    <meta charset="utf-8">
</head>
<body>

<?php
    $url  = "http://openapi.airkorea.or.kr/openapi/services/rest/ArpltnInforInqireSvc/getMsrstnAcctoRltmMesureDnsty";
    $url .= "?stationName=종로구";
    $url .= "&dataTerm=month";
    $url .= "&pageNo=1";
    $url .= "&numOfRows=10";
    $url .= "&ServiceKey=XFYG4yqKhbqAt1RXHmB9rvvSitYslilv1hzRaVmJM50aUlifxOYfhvQuNhx%2FYWOqN3AillVnYq8eqI3U38JoXw%3D%3D";
    $url .= "&ver=1.3";

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);
    if (!$response) {
        exit("Error #" . curl_errno($ch) . ": " . curl_error($ch));
    }

    $xml = simplexml_load_string($response);

    $list = $xml->body->items->item;
    for ($i = 0; $i < count($list); $i++) {
        $p = $list[$i];

        echo "측정 일시: ", $p->dataTime, "<br>";
        echo "미세먼지 농도: ", $p->pm10Value, "<br>";
        echo "초미세먼지 농도: ", $p->pm25Value, "<br>";

        $grade = ["", "좋음", "보통", "나쁨", "매우나쁨"];
        echo "미세먼지 등급: ", $grade[(string)$p->pm10Grade], "<br>";
        echo "초미세먼지 등급: ", $grade[(string)$p->pm25Grade], "<br><br>";
    }

    curl_close ($ch);
?>

</body>
</html>
