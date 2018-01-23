<?php

$urls = array ('https://api.github.com/repos/diglabby/blog/events',
'https://api.github.com/users/tyuba4/events', 'https://api.github.com/repos/diglabby/liga/events');
   
function getActivityFromServer($url){
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url );
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true );
    curl_setopt($ch, CURLOPT_VERBOSE, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Accept: application/vnd.github.v3+json','User-Agent: Tyuba4-App'));
    curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);

    $html = curl_exec ($ch);
    $html = json_decode($html);
    curl_close ($ch);
    return $html;
}
$htmlall= [];
foreach($urls as $url){ 
$arr = getActivityFromServer($url);
$htmlall= array_merge ($htmlall, $arr);
}
$arrResult = [];
foreach ($htmlall as $one){
    array_push($arrResult, (array)$one);
    
}

    //$responseInfo = curl_getinfo($ch);
    //print_r($responseInfo);
function sorta($a, $b) {
    if ($a['created_at'] < $b['created_at'])
     return 1;
}
usort($arrResult, 'sorta');   
echo json_encode($arrResult);
    






