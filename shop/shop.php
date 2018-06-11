<?php
    $link = "https://fnbr.co/api/shop";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $link);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, FALSE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'x-api-key: 89a8c526-95d1-45f2-b517-d04550f6f702'
    ));
    $response = curl_exec($ch);
    curl_close($ch);
    $fp = fopen("json/shop.json", "w");
    fwrite($fp, $response);
    fclose($fp);
    
    $data = json_decode(file_get_contents("json/shop.json"));
    foreach($data->data->featured as $ft)
    {
        print '<a href="'.$ft->images->gallery.'"><img src="'.$ft->images->gallery.'"height="350" width="350" hspace="10"" />';
    }
    foreach($data->data->daily as $dl)
    {
        print '<a href="'.$dl->images->gallery.'"><img src="'.$dl->images->gallery.'"height="350" width="350" hspace="10"" />';
    }
?>