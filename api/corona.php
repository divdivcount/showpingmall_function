<?php
$ch = curl_init();
$url = 'http://openapi.data.go.kr/openapi/service/rest/Covid19/getCovid19InfStateJson'; /*URL*/
$queryParams = '?' . urlencode('ServiceKey') . '=a1Mb14Z%2FrXV%2FkrLBy3t31nY2CzHJ%2B8ufVJEQN%2Fy4srUAN%2FHX%2FJY4rp%2FJAJxuZJU384i4P0Z1OZI338Pcts%2FFmg%3D%3D'; /*Service Key*/
$queryParams .= '&' . urlencode('pageNo') . '=' . urlencode('1'); /**/
$queryParams .= '&' . urlencode('numOfRows') . '=' . urlencode('1'); /**/
$queryParams .= '&' . urlencode('startCreateDt') . '=' . urlencode('20201128'); /**/
$queryParams .= '&' . urlencode('endCreateDt') . '=' . urlencode('20201128'); /**/

curl_setopt($ch, CURLOPT_URL, $url . $queryParams);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
$response = curl_exec($ch);
curl_close($ch);

var_dump($response);
?>
