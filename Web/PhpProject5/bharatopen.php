<?php
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("rideonstock", $con);
$html = '';
//$html .= '<li>';
$html .= '<h3>nameString</h3>';
//$html .= '</li>';

$result = mysql_query("SELECT Price 
    FROM bharat_petroleum
    WHERE Time=
      (SELECT min(Time)
      FROM bharat_petroleum
      WHERE Date=(SELECT max(Date)
    FROM bharat_petroleum  )AND Time > '09:15:00')
       AND Date=
      (SELECT max(Date)
       FROM bharat_petroleum)");
$row= mysql_fetch_assoc($result);

$display_name = $row['Price'];

			
			
			$output = str_replace('nameString', $display_name, $html);

			
			

			echo($output);
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
