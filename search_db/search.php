<?php 

require_once("dao/DBConnection.php");

$c = new DBConnection();

$q = trim(strip_tags(strtolower($_GET['term'])));
$return = array();

$query = "SELECT post_name, guid
		FROM `oferta_posts` 
		WHERE `post_name` LIKE '%$q%' 
			AND `post_parent` = 0
			AND `post_type` = 'page'
			AND `post_status` = 'publish'";

$resultset = $c->query($query);

$json = '[';
$first = true;

while ($row = $c->fetch($resultset)) 
{
	$page = replace ( $row[0] );
	if (!$first) 
	{
		$json .=  ',';
	} 
	else 
	{
		$first = false;
	}
	$json .= '{"value":"'.$page.'", "url": "'.$row[1].'"}';
}

$json .= ']';

echo $json;

function replace ( $row )
{
	// Change "-" -> " "
	$row = str_replace("-"," ",$row);
	$row = str_replace("ano","año",$row);
	
	return $row;
}