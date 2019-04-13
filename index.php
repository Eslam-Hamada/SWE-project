<?php 


$curl =curl_init() ; //starting the curl seesion and storing it's instance

//set the varaible the will be sending in CURL
$var= 12;

//setting the url  of server 
curl_setopt($curl , CURLOPT_URL, "http://localhost/phpmyadmin/db_structure.php?server=1&db=social+network");

//setting the varaible in CURL option
curl_setopt($curl , CURLOPT_POSTFIELDS, "MyVar" .$var )

//executing the request and stroring the server's response in variable  
$response= curl_exec($curl);

//store the server response , call it data
$data =json_decode($response);

//displaying the data
for($a=0 ; $a<count($data) ;$a++)
{
	echo $data[$a]->user_id;
	echo "<br />";
	echo $data[$a]->follower_id;
}