<?php
$con = new PDO('mysql:host=localhost;dbname=mywschoo_db', 'root', '');
	$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

header("Content-Disposition: attachment; filename='companies.xls'");

header("Content-Type: application/vnd.ms-excel");

function dataFilter(&$str_val)
{
	$str_val = preg_replace("/\t/", "\\t", $str_val);
	$str_val = preg_replace("/\r?\n/", "\\n", $str_val);
	if(strstr($str_val, '"')) $str_val = '"' . str_replace('"', '""', $str_val) . '"';
}

$post_list = array();


$query = $con->prepare("SELECT name,phone,email,website FROM companies_info");
							$query->execute();



$rowCount = $query->rowCount();


if($rowCount > 0){
	while($row = $query->fetch(PDO::FETCH_ASSOC)){
		$post_list[] = array(     "name"=>$row["name"],"phone"=>$row["phone"],"email"=>$row["email"],"website"=>$row["website"] );

	}
}


$title_flag = false;
foreach($post_list as $post) {
	if(!$title_flag) {

		echo implode("\t", array_keys($post)) . "\n";
		$title_flag = true;
	}

	array_walk($post, 'dataFilter');
	echo implode("\t", array_values($post)) . "\n";

}


?>