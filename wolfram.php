<?php


$APP_ID="Y47X4R-X4G9JTT33W";
$INPUT=$_REQUEST['q'];
$URL = "http://api.wolframalpha.com/v2/query?input=".urlencode($INPUT)."&appid=".$APP_ID;
//echo $URL;

$ch1=curl_init();
curl_setopt($ch1,CURLOPT_URL,$URL);
curl_setopt($ch1,CURLOPT_FOLLOWLOCATION,FALSE);
curl_setopt($ch1,CURLOPT_RETURNTRANSFER,TRUE);
curl_setopt($ch1,CURLOPT_HEADER,TRUE);
$resp=curl_exec($ch1);
preg_replace('/&amp;/', '&', $resp);
//header('Content-Type: text/plain');
//echo $resp;
preg_match_all('%<pod title=\'(.*?)\'\s*.*?>\s*<subpod.*?>\s*<plaintext>(.*?)</plaintext>\s*(?:<img src=\'(.*?)\')?%si', $resp, $rarr);
echo "<table>"
for($i=0; $i<count($rarr[0]); $i++){
	if($rarr[2][$i]==""){
	echo "<tr> <td> ".$rarr[1][$i]."</td><td><img src=\"".$rarr[3][$i]."\"/></td></tr>";
	}
	else{
		
		echo "<tr> <td> ".$rarr[1][$i]."</td><td>".$rarr[2][$i]."</td></tr>";
	}
}
echo "</table>"
















?>