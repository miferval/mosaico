<?php
/**
 * utilities.php
 */

class Utility{
	function getMonth($num){
		$month = array(	'01' => 'Enero','02' => 'Febrero',
						'03' => 'Marzo','04' => 'Abril',
						'05' => 'Mayo', '06' => 'Junio',
						'07' => 'Julio','08' => 'Agosto',
						'09' => 'Septiembre' ,'10' => 'Octubre',
						'11' => 'Noviembre', '12' => 'Diciembre');
		return $month[$num];
	}

	function getFecha($date){
		$month = date('m' , strtotime($date));
		$mes = $this->getMonth($month);
		$dayYear = date('d, Y' , strtotime($date));

		$fecha = $mes.'&nbsp;'.$dayYear;
		return $fecha;	
	}

	function printFecha(){
		/*/TODO/*/
		setlocale(LC_ALL,"es_ES@euro","es_ES","esp");
		$string = "25/11/2014";
		$date = DateTime::createFromFormat("d/m/Y", $string);
		echo strftime("%A %d de %B del %Y",$date->getTimestamp());
	}

	function get_gravatar( $email, $s = 80, $d = 'mm', $r = 'g', $img = false, $atts = array() ) {
    $url = 'http://www.gravatar.com/avatar/';
    $url .= md5( strtolower( trim( $email ) ) );
    $url .= "?s=$s&d=$d&r=$r";
    if ( $img ) {
        $url = '<img src="' . $url . '"';
        foreach ( $atts as $key => $val )
            $url .= ' ' . $key . '="' . $val . '"';
        $url .= ' />';
    }
    return $url;
	}

	function truncate($str, $len) {
	  $tail = max(0, $len-10);
	  $trunk = substr($str, 0, $tail);
	  $trunk .= strrev(preg_replace('~^..+?[\s,:]\b|^...~', '...', strrev(substr($str, $tail, $len-$tail))));
	  return $trunk;
	}

	function getCurl($url){
		$c = curl_init($url);
		curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($c, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($c, CURLOPT_SSL_VERIFYHOST, false);			
		//get data from facebook and decode JSON
		$page = json_decode(curl_exec($c));
		$feed = curl_exec($c);
		$feed_decoded=json_decode($feed,true);
		//close the connection
		curl_close($c);
		//return the data as an object
		return $feed_decoded;
	}

	

}