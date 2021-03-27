<?php
   function sendSms(){
    $input_xml="
    <request>
    <head>
    <operation>submit</operation>                        
    <login>------</login>                                    
    <password>------</password>                           
    <title>-------</title>                               
    <scheduled>NOW</scheduled>                          
    <isbulk>false</isbulk>
    <controlid>111</controlid>
    <unicode>false</unicode>                              
    </head>
    <body>
       <msisdn>994709990907</msisdn>
         <message>test sms</message> 
    </body>
    </request>";

          $url = "https://sms.atltech.az:7443/bulksms/api";
      $ch = curl_init();

          curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
          curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
          curl_setopt($ch, CURLOPT_VERBOSE, true);
          curl_setopt($ch, CURLOPT_KEYPASSWD, '');
          curl_setopt($ch, CURLOPT_URL, $url);
          curl_setopt($ch, CURLOPT_POSTFIELDS, $input_xml);
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
          curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 300);

          $data = curl_exec($ch);
          $err = curl_errno($ch)." ".curl_error($ch);

          curl_close($ch);
          $array_data = json_decode(json_encode(simplexml_load_string($data)), true);
      //	$status = $array_data['Response']['Status'];
  echo $data;
  }
  

?>