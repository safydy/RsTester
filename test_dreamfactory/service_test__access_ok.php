<?php

       $url = "http://192.168.1.153:8800/rest/remote_SQL/test";
//       $url = "http://192.168.1.153:8800/rest/db/todo";
       $url_session = "http://192.168.1.153:8800/rest/user/session";
       
       
    $data = array("email" => "safidy@hni.org", "password" => "hni@df");   
    $data_client_a = array("email" => "client_a@hni.org", "password" => "pass@ca");   
    $data_string = json_encode($data); 
    $data_string_ca = json_encode($data_client_a); 
       
//    param curl_setopt() 
//    CURLOPT_CUSTOMREQUEST : -X
//    CURLOPT_HTTPHEADER :  -H
//    CURLOPT_POSTFIELDS : -d
//    

       //# LIKE IN DW API
        //echo "<br>" . $url;
//        $ch = curl_init();
//        curl_setopt($ch, CURLOPT_URL, $url_session);
//        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
//        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
//        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
//        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
//        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0)");
//        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
//        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_DIGEST);
//        curl_setopt($ch, CURLOPT_USERPWD, "safidy@hni.org:hni@df");
//        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);  



       
       //# NEW ACCESS
//
//    $ch = curl_init();       
//    curl_setopt($ch, CURLOPT_URL, $url_session);
//    curl_setopt($ch, CURLOPT_SSLVERSION, 3);
//    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");   //-X                                                                  
//    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);   //-d                                                               
//    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);  
//    curl_setopt($ch, CURLOPT_HTTPHEADER, array(         //-H                                                                 
//        'X-DreamFactory-Application-Name: remote_SQL'
//    ));                                                                                                                        
//
//    
//        //# EXECUTE
//        $result = curl_exec ($ch);
//        $vCurlErrorNo = curl_errno($ch);                          
////        curl_close($ch);
//        
//        echo "vCurlErrorNo : " . $vCurlErrorNo."<br>";
////        $result = fctAccentDecode($result);
//        $tRes = json_decode($result,true);
//        var_dump($tRes);
//        
//        Echo "session_id <br>";
//        $vSessionId = $tRes['session_id'];
//        var_dump($vSessionId);
// 
        
        echo "#################<br>";
        $ch = curl_init();      
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,TRUE);
        curl_setopt($ch, CURLOPT_SSLVERSION, 3); // -3
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET'); //-X 
//        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
//        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0)");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
//        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_DIGEST); 
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE); 
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(         //-H                                                                 
//            "X-DreamFactory-Session-Token : $vSessionId",
            'X-DreamFactory-Application-Name: remote_SQL'
        ));        
//         curl_setopt($ch, CURLOPT_HTTPHEADER, array(           //-H                                                               
//            'X-DreamFactory-Application-Name: remote_SQL'
//        ));        
//        curl_setopt($ch, CURLOPT_USERPWD, "client_a@hni.org:pass@ca");
        curl_setopt($ch, CURLOPT_USERPWD, "safidy@hni.org:hni@df");
         
        $result = curl_exec ($ch);
        $vCurlErrorNo = curl_errno($ch);                          
        curl_close($ch);
        
        echo "vCurlErrorNo : " . $vCurlErrorNo."<br>";
//        $result = fctAccentDecode($result);
        $tRes = json_decode($result,true);
        var_dump($tRes);        
        //exemple d'une ligne dans le $tRes : {"action"=>"soft-delete", "short_code"=>"350141008", "date"=>"2014-12-02 06:38:46", "entity_type"=>"csb"}
        //il y a aussi action=>'hard-delete'


    /*Note :
    *
     * J'ai ajouté un DS et Sujet 'testpa' le 2015-02-09 puis je l'ai supprimé
     * normalement, cette action devrait figurer dans cette update
     * Resultat : 
     * -DS : NOK (A demander au pres de l'équipe DW)
     * -Sujet : OK
     */
?>



