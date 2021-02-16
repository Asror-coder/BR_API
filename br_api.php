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
            CURLOPT_POSTFIELDS => "{\"query\":\"query {\\n  court_reservations(dates: [\\\"2021-02-05\\\"], resources: [1999]) {\\n     total\\n          nodes {\\n            resource {\\n              name\\n            }\\n            start_time\\n            end_time\\n          }\\n        }\\n      }\"}",
            CURLOPT_HTTPHEADER => [ 
                "Content-Type: application/json" 
            ],
            CURLOPT_HTTPAUTH => CURLAUTH_BASIC,
            CURLOPT_USERPWD => "API-BR-debook:APIkasdfhoisfh340rtu3fnr3ewfhr3gewy8h03g",
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