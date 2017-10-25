<?php

function whois($url, $domain)
{
  // ���������� � ������� TCP, ��������� �� ������� "whois.arin.net" �� 
  // 43 �����. � ���������� ������������ ���������� ���������� $sock.
  $sock = fsockopen($url, 43, $errno, $errstr);
  if (!$sock) exit("$errno($errstr)");
  else
  {
	// ���������� ������ �� ���������� $_POST["ip"] � ���������� ������.
	fputs ($sock, $domain."\r\n");
	// ������������ ������ �� ����������� ������.
	$text = "";
	while (!feof($sock))
	{
	  $text .= fgets ($sock, 128)."<br>";
	}
	// ��������� ����������
	fclose ($sock);

	// ���� ����������� ������
	$pattern = "|ReferralServer: whois://([^\n<:]+)|i";
	preg_match($pattern, $text, $out);
	if(!empty($out[1])) return whois($out[1], $domain);
	else return $text;
  }
}

?>