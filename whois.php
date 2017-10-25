<?php

function whois($url, $domain)
{
  // Соединение с сокетом TCP, ожидающим на сервере "whois.arin.net" по 
  // 43 порту. В результате возвращается дескриптор соединения $sock.
  $sock = fsockopen($url, 43, $errno, $errstr);
  if (!$sock) exit("$errno($errstr)");
  else
  {
	// Записываем строку из переменной $_POST["ip"] в дескриптор сокета.
	fputs ($sock, $domain."\r\n");
	// Осуществляем чтение из дескриптора сокета.
	$text = "";
	while (!feof($sock))
	{
	  $text .= fgets ($sock, 128)."<br>";
	}
	// закрываем соединение
	fclose ($sock);

	// Ищем реферальный сервер
	$pattern = "|ReferralServer: whois://([^\n<:]+)|i";
	preg_match($pattern, $text, $out);
	if(!empty($out[1])) return whois($out[1], $domain);
	else return $text;
  }
}

?>