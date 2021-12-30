<?php
$lon="106.816666";
$lat="-6.200000";
$excl="alerts";
$myAPI="9b0cb0c7c245a266425cacc740643215"; 
$url="https://api.openweathermap.org/data/2.5/onecall?lat=".$lat."&lon=".$lon."&exclude=".$excl."&appid=".$myAPI."";
$json=file_get_contents($url);
$data=json_decode($json,true);

echo "Wather Forecast :";
echo "<br>";

foreach($data["daily"] as $day => $value) {
  $ts = $value['dt'];
  $dt = new DateTime('@' . $ts);
  $dt->setTimezone(new DateTimeZone('Asia/Jakarta'));
  $getDate = $dt->format('D, j M Y : ');

  $a = array_filter($value["temp"]);
  $average = round(array_sum($a)/count($a), 2);
  
  echo "$getDate"." ". $average."&deg; C". "<br />";
}
?>

