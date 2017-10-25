<?php
include('whois-gen.php');

function array2xml($buffer) {
    $xml  = "<?xml version=\"1.0\" encoding=\"windows-1251\"?>\n";
    $xml .= "<service version=\"1.0\">\n";
    foreach($buffer as $val) {
        $xml .= "    <profile>\n";
        
        foreach ($val as $key => $value) {
            $xml .= "        <{$key}>".$value."</{$key}>\n";
        }
        
        $xml .= "    </profile>\n";
    }
    $xml .= "</service>\n";
    
    return $xml;
}

if(isset($_GET['n'])){
	$n = $_GET['n'];
	if($n>50) $n = 50;
} else {
	$n = 10;
}

$out = array();

for($i=0;$i<$n;$i++){
	$out[] = generate_whois();
}

$xml = array2xml($out);

header("Content-type: text/xml");
echo $xml;
?> 