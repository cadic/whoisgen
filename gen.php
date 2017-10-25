<?php

include('whois-gen.php');

header("Content-type: text/plain; charset=koi8-r");

if ( isset($_POST['num']) && is_numeric($_POST['num']) )
{
	$domains = array();
	include_once( 'whois.php' );

	$sogl = preg_split("/,/","r,t,p,s,d,f,g,h,k,l,z,x,c,v,b,n,m");
	$gl = preg_split("/,/","e,u,i,o,a,ie,oo,ee,ea,ei");

	$min_letters = (isset($_POST['min']) && is_numeric($_POST['min'])) ? $_POST['min'] : 4;
	$max_letters = (isset($_POST['max']) && is_numeric($_POST['max'])) ? $_POST['max'] : 7;

	$n = 0;
	while ( $n < $_POST['num'] )
	{
		$length = rand($min_letters, $max_letters);
		$domain = "";
		for ( $i=0; $i < $length; $i++ ) { 
			$letters = ($i % 2) ? $gl : $sogl;
			$domain .= $letters[rand(0,count($letters)-1)];
		}
		$domain .= ".ru";
		$whois = whois("whois.ripn.net",$domain);
		if ( preg_match("/No entries found for the selected source/", $whois) ) {
			$domains[] = $domain;
			$n++;
		} elseif ( preg_match("/You have exceeded allowed connection rate/", $whois) ) {
			break;
		}
	}
}
else
{
	$doms = (isset($_POST['domains'])) ? $_POST['domains'] : "";
	$domains = preg_split("/\n/",preg_replace("/\r/","",$doms));
}

foreach( $domains as $domain )
{
	$whois = generate_whois();
	foreach( $whois as $key => $value )
	{
		$whois[$key] = convert_cyr_string ( $value, "w", "k" );
	}
	$fio = preg_split("/ /",$whois['eng_name']);
	$fname = strtolower($fio[2]);
	$whois['email'] = "$fname@$domain";
	//print_r($whois);
?>
#[DOMAIN TEMPLATE]#
domain: <?=$domain;?>

<?php if ( $_POST['ns1'] !== "" ) { ?>
nserver: <?=$_POST['ns1']?>

<?php } ?>
<?php if ( $_POST['ns2'] !== "" ) { ?>
nserver: <?=$_POST['ns2']?>

<?php } ?>
<?php if ( $_POST['ns3'] !== "" ) { ?>
nserver: <?=$_POST['ns3']?>

<?php } ?>
<?php if ( $_POST['ns4'] !== "" ) { ?>
nserver: <?=$_POST['ns4']?>

<?php } ?>
p-addr: <?=$whois['post_address'];?>

phone: <?=$whois['phone'];?>

state: DELEGATED
fax-no: <?=$whois['phone'];?>

e-mail: <?=$whois['email'];?>

person: <?=$whois['eng_name'];?>

birth-date: <?=$whois['birthdate'];?>

type: CORPORATE
person-r: <?=$whois['rus_name'];?>

passport: <?=$whois['passport'];?>


<?php
}

?>
#[TEMPLATES END]#


<?php foreach( $domains as $domain ) { ?>
<?php echo $domain; ?>

<?php } ?>