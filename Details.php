function getClientIP(){
  if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
  } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
  } else {
    $ip = $_SERVER['REMOTE_ADDR'];
  }
  return $ip;
}

$ipaddress = getClientIP();

function ip_details($ip) {
  $json = file_get_contents("http://ipinfo.io/{$ip}/geo");
  $details = json_decode($json, true);
  return $details;
}

$details = ip_details($ipaddress);
echo $details['city'];