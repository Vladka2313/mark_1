<?php
	function GetData($SerachLink) 
	{
	
		do
		{
		$ch = curl_init();
		//$url='http://www.checkupdown.com/status/E307.html';
		//curl_setopt($ch, CURLOPT_VERBOSE, true);
		curl_setopt($ch, CURLOPT_URL,$SerachLink);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; ru; rv:1.9.0.1) Gecko/2008070208');
		//if(isset($this->proxy))curl_setopt($ch, CURLOPT_PROXY, $this->proxy);
		
		$ss=curl_exec($ch);
		echo "\n ".$SerachLink;
		echo "\n ".curl_error($ch);
		//echo $ss;
		echo " HTTP:".curl_getinfo($ch,CURLINFO_HTTP_CODE )." \n";
		$code=curl_getinfo($ch,CURLINFO_HTTP_CODE );
		curl_close($ch);
		}
		while(($code!='200')&&($code!='403'));
		return $ss;
	}
	
	
	$SerachLink="http://www.vorwahl-index.de/0";
	
	$letters=array("3","4","5","6","7","8","9");
	$link = mysql_connect("localhost", "root", "") or die("Could not connect : " . mysql_error());
	mysql_select_db('vorwahl') or die("Could not connect : " . mysql_error());
	mysql_query('SET NAMES utf8');


foreach($letters as $ltr)
{


	
	$res=GetData($SerachLink.$ltr);
	//<a href="/0241" title="Vorwahl von Aachen">Aachen 0241</a>
	//$res='<a href="/0241" title="Vorwahl von Aachen">Aachen 0241</a><br />';
	preg_match_all("/<a href='[^']+' title='[^']+'>([^0-9<>]+)([0-9]+)<\/a><br \/>/s",$res,$math);
	//print_r($math);
	for($i=0;$i<count($math[0]);$i++)//
	{	
		$math[1][$i]=substr($math[1][$i], 0, strlen($math[1][$i])-1);
		$c=$math[1][$i];
		$in=$math[2][$i];
		$query ="insert into city(name,code) values ('$c','$in');";
		mysql_query($query)or die("Query failed : " . mysql_error());
	}
	
	//$math=array_merge($math,$math_new);
	
	$val="";

	 
	 //echo "\n".$query."\n";
	



}	
	 mysql_close($link);
?>