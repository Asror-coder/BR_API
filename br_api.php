<!DOCTYPE html>
<html>
    <head>  
        <meta charset="utf-8"/>
		<title>GraphQL API</title>
    </head>
    <body>
        <?php

            $curl = curl_init();

            curl_setopt_array($curl, [
            CURLOPT_URL => "https://demo.baanreserveren.nl/graphql/club",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "{\"query\":\"mutation CreateReservation ($input : CreateReservationInput!) {\\n  createReservation(input: $input)\\n  {\\n  \\tid\\n  }\\n}\\n\",\"variables\":{\"input\":{\"resource_id\":1999,\"date\":\"2021-02-28\",\"start_time\":\"15:00\",\"end_time\":\"16:00\"}}}",
            CURLOPT_HTTPHEADER => [ 
                "Content-Type: application/json",
                "user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.182 Safari/537.36"
            ],
            CURLOPT_HTTPAUTH => CURLAUTH_BASIC,
            CURLOPT_USERPWD => "",
            ]); 

            $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);

            if ($err) {
            echo "cURL Error #:" . $err;
            } else {
            echo $response;
            }
        ?>
        
    </body>
</html>
