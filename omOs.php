<?php
header( 'Location: omOs.html' ) ;
$user_agent     =   $_SERVER['HTTP_USER_AGENT'];
function getOS() { 
    global $user_agent;
    $os_platform    =   "SPAM BOT";
    $os_array       =   array(
                            '/windows nt 10/i'     =>  'Windows 10',
                            '/windows nt 6.3/i'     =>  'Windows 8.1',
                            '/windows nt 6.2/i'     =>  'Windows 8',
                            '/windows nt 6.1/i'     =>  'Windows 7',
                            '/windows nt 6.0/i'     =>  'lWindows Vista',
                            '/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
                            '/windows nt 5.1/i'     =>  'Windows XP',
                            '/windows xp/i'         =>  'Windows XP',
                            '/windows nt 5.0/i'     =>  'Windows 2000',
                            '/windows me/i'         =>  'Windows ME',
                            '/win98/i'              =>  'Windows 98',
                            '/win95/i'              =>  'Windows 95',
                            '/win16/i'              =>  'Windows 3.11',
                            '/macintosh|mac os x/i' =>  'Mac OS X',
                            '/mac_powerpc/i'        =>  'Mac OS 9',
                            '/linux/i'              =>  'Linux',
			                '/kalilinux/i'          =>  'Wannabe Hacker',
                            '/ubuntu/i'             =>  'Ubuntu',
                            '/iphone/i'             =>  'iPhone',
                            '/ipod/i'               =>  'iPod',
                            '/ipad/i'               =>  'iPad',
                            '/android/i'            =>  'Android',
                            '/blackberry/i'         =>  'BlackBerry',
                            '/webos/i'              =>  'Mobile',
			                '/Windows Phone/i'      =>  'Windows Phone'
                        );
    foreach ($os_array as $regex => $value) { 
        if (preg_match($regex, $user_agent)) {
            $os_platform    =   $value;
        }
    }   
    return $os_platform;
}
function getBrowser() {
    global $user_agent;
    $browser        =   "Unknown Browser";
    $browser_array  =   array(
                            '/msie/i'       =>  'Internet Explorer',
                            '/firefox/i'    =>  'Firefox',
			    '/Mozilla/i'    =>	'Mozila',
			    '/Mozilla/5.0/i'=>	'Mozila',
                            '/safari/i'     =>  'Safari',
                            '/chrome/i'     =>  'Chrome',
                            '/edge/i'       =>  'Edge',
                            '/opera/i'      =>  'Opera',
			    '/OPR/i'        =>  'Opera',
                            '/netscape/i'   =>  'Netscape',
                            '/maxthon/i'    =>  'Maxthon',
                            '/konqueror/i'  =>  'Konqueror',
			    '/Bot/i'	    =>	'Spam',
			    '/Valve Steam GameOverlay/i'  =>  'Steam',
                            '/mobile/i'     =>  'made by Necis Orcus'
                        );
}
$user_os        =   getOS();
$user_browser   =   getBrowser();



$host = gethostbyaddr($ip);
   $site_refer = $_SERVER['HTTP_REFERER'];{
       
    if ( !empty($_SERVER['HTTP_CLIENT_IP']) ) {
        // Check IP from internet.
        $ip = $_SERVER['HTTP_CLIENT_IP'];
       } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']) ) {
        // Check IP is passed from proxy.
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
       } else {
        // Get IP address from remote address.
        $ip = $_SERVER['REMOTE_ADDR'];
       }
	if($site_refer == ""){
		$site = "dirrect connection";
	}
else{
		$site = $site_refer;
    }
}
$ipdat = @json_decode(file_get_contents( 
    "http://www.geoplugin.net/json.gp?ip=" . $ip)); 
$time = date('Y-m-d H:i:s');
$make_json = json_encode(array('content'=>"Om os  | $ipdat->geoplugin_countryName | $ipdat->geoplugin_continentName | $ipdat->geoplugin_currencyCode | $ipdat->geoplugin_timezone | $ip | $user_os | $user_browser | $time \n", "username" => "$ip"));
$exec = curl_init("https://discordapp.com/api/webhooks/783278384377102388/eRFWws-eeOKdRft9rz54bbX5_uoYa84-ViqU23zWB1QWtZvQcwNJayOnPPkDmFTL4WCY");
curl_setopt( $exec, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
curl_setopt( $exec, CURLOPT_POST, 1);
curl_setopt( $exec, CURLOPT_POSTFIELDS, $make_json);
curl_setopt( $exec, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt( $exec, CURLOPT_HEADER, 0);
curl_setopt( $exec, CURLOPT_RETURNTRANSFER, 1);
$response = curl_exec( $exec );
?>
