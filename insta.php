<?php
$url = $_GET['url'];
$d = explode("?",$url);
$url = $d[0];
    $headers = array();
    $headers[]= 'content-type: application/json; charset=utf-8';
    $headers[] = 'cookie: mid=YgPwWAALAAG-nvexe9EaghltG_wM; ig_did=3114D330-8756-4154-89C0-CFDACBDCF5B1; ig_nrcb=1; ig_gdpr_signup=%7B%22count%22%3A2%2C%22timestamp%22%3A1647594151293%7D; csrftoken=MD7l8JHlLryOHZzRo27SPJ88XvVVwtIE; ds_user_id=52212374517; sessionid=52212374517%3A03CQXtLnoWXkeQ%3A2; rur="ODN\05452212374517\0541679130449:01f762555caea621245a05d558916346319c7fae0ba7804c22b7aea0e545e132eef73e3b"';
    $headers[] = 'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.99 Safari/537.36';

    
    $method = curl_init();

    curl_setopt($method, CURLOPT_URL, $url.'?__a=1');
    curl_setopt($method, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($method, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($method);
    curl_close($method);
   $response = json_decode($response,1);
   $data = $response['items'][0];
   if($data["media_type"] == 1 or $data["media_type"] == 8)
   {
      $img =  $data["image_versions2"]["candidates"][0]["url"];
    $data = array(
        'img_url' => $img,
        'type' => $data["media_type"],
        );
        $jsonfile = json_encode($data, JSON_PRETTY_PRINT);
    echo $jsonfile;
   }elseif($data["media_type"] == 2){
       $video_url = $data["video_versions"][0]["url"];
       $data = array(
        'video_url' => $video_url,
        'type' => $data["media_type"],
        );
        $jsonfile = json_encode($data, JSON_PRETTY_PRINT);
        echo $jsonfile;
   }
?>