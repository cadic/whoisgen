<?

function translate($text) {
	$search = array ("'А'","'Б'","'В'","'Г'","'Д'","'Е'","'Ё'","'Ж'","'З'",
					"'И'","'Й'","'К'","'Л'","'М'","'Н'","'О'","'П'","'Р'",
					"'С'","'Т'","'У'","'Ф'","'Х'","'Ц'","'Ч'","'Ш'","'Щ'",
					"'Ъ'","'Ы'","'Ь'","'Э'","'Ю'","'Я'","'а'","'б'","'в'",
					"'г'","'д'","'е'","'ё'","'ж'","'з'","'и'","'й'","'к'",
					"'л'","'м'","'н'","'о'","'п'","'р'","'с'","'т'","'у'",
					"'ф'","'х'","'ц'","'ч'","'ш'","'щ'","'ъ'","'ы'","'ь'",
					"'э'","'ю'","'я'","' '","'[,\"\.\?\:\']'");

	$replace = array ("a","b","v","g","d","e","e","zh","z",
					"i","j","k","l","m","n","o","p","r",
					"s","t","u","f","h","c","ch","sh","sc",
					"","y","","e","u","ya","a","b","v",
					"g","d","e","e","j","z","i","y","k",
					"l","m","n","o","p","r","s","t","u",
					"f","h","c","ch","sh","sc","","y","",
					"e","u","ya","-","");
	$text = preg_replace($search, $replace, $text);
	return $text;
}

function generate_whois(){
	$names = file('names_men.txt');
	$surnames = file('surnames_men.txt');
	$famil = file('famil.txt');
	$addr = file('index.txt');
	
	$output = array();
	$nn = rand(0,count($names)-1);
	$sn = rand(0,count($surnames)-1);
	$fn = rand(0,count($famil)-1);
	$f = trim($famil[$fn]);
	$n = trim($names[$nn]);
	$s = trim($surnames[$sn]);
	$output['rus_name'] = "$f $n $s";
	$output['eng_name'] = ucwords(translate($n)." ".substr(translate($s),0,1)." ".translate($f));
	$date = date("d.m.Y", strtotime("-".rand(50,3000)." days"));
	$output['passport'] = mt_rand(1000,2899).mt_rand(100000,999999)." выдан ".rand(1,170)." отделением милиции г.Москвы $date";
	$an = rand(0,count($addr)-1);
	$dn = rand(1,100);
	$kn = rand(1,100);
	$output['reg_address'] = trim($addr[$an]).", $dn, кв.$kn";
	if(rand(1,100)>50){
		$an = rand(0,count($addr)-1);
		$dn = rand(1,100);
		$kn = rand(1,100);
	}
	if(substr($f,-1)=="в" or substr($f,-1)=="н") {$f .= "у";}
	if(substr($n,-1)=="й" or substr($n,-1)=="ь") {
		$n = substr($n,0,-1)."ю";
	} elseif(substr($n,-1)=="а" or substr($n,-1)=="я") {
		$n = substr($n,0,-1)."е";
	} else {
		$n .= "у";
	}
	$s .= "у";
	$output['post_address'] = preg_replace("/, Москва,/",", г.Москва,",trim($addr[$an])).", д.$dn, кв.$kn, $f $n $s";
	$birthdate = date("d.m.Y", strtotime("-".rand(8000,13500)." days"));
	$output['birthdate'] = $birthdate;
	$output['phone'] = "+7 495 ".rand(1000000,9999999);

	return $output;
}

?>