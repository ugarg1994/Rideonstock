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
    FROM acc
    WHERE Time=
      (SELECT max(Time) FROM acc
      WHERE Date=(SELECT max(Date) FROM acc
       Where Date < ( SELECT max(Date) from acc)))
       AND Date=
      (SELECT max(Date) FROM acc
       Where Date < ( SELECT max(Date) from acc))");
$row= mysql_fetch_assoc($result);

$display_name = $row['Price'];

			
			
			$output = str_replace('nameString', $display_name, $html);

			
			
                        //echo('Previous Price: ');
			echo($output);
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
