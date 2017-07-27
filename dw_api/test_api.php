<?php

/* 
 * We want to track actions (soft-delete, hard-delete) into sms_poi & sms_reg & sms_res
 */
        $vDateDebut = "01-01-2013";
        $vAujourdhui = date('d-m-Y');
        $vLastDate = date_format(date_create($vAujourdhui), 'd-m-Y'); 

//exemple      $url = 'https://app.datawinners.com/api/entity/actions/18-12-2012/25-04-2015/';
//      $url = "https://app.datawinners.com/api/entity/actions/" . $vDateDebut . "/" . $vDateFin;
        $url = "https://app.datawinners.com/api/entity/actions/";//c'est le même si on ne mentionne pas les dates >>> depuis le début
      $url2 = "https://app.datawinners.com/feeds/014?start_date=01-04-2016 0:0:0&end_date=21-04-2016 23:59:59";
      $url3 = 'https://app.datawinners.com/api/get_for_form/014/01-04-2016/21-04-2016/';
        $cred = "dafytahiana@gmail.com:hnitest";
        //echo "<br>" . $url;

        //initiate curl
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
    curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0)");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_DIGEST);//get_for_form >> DIGEST / FEED >> BASIC
    curl_setopt($ch, CURLOPT_USERPWD, $cred);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);

        //execute
        $result = curl_exec ($ch);
        $vCurlErrorNo = curl_errno($ch);                          
        curl_close($ch);

        echo "vCurlErrorNo : " . $vCurlErrorNo;
        var_dump($result);
        $tRes = json_decode($result,true);
        var_dump($tRes);
 
        //exemple d'une ligne dans le $tRes : {"action"=>"soft-delete", "short_code"=>"350141008", "date"=>"2014-12-02 06:38:46", "entity_type"=>"csb"}
        //il y a aussi action=>'hard-delete'

        if($vCurlErrorNo == 0){
            echo "no error";
        }
?>