<?php
function enc($str)
			{
  		for($i=0; $i<10;$i++)
  				{
   			 $str=strrev(base64_encode($str)); //apply base64 first and then reverse the string
 				 }
  			return $str;
  
			}
			
			
function dec($str)
		{
 		for($i=0; $i<10;$i++)
 		 {
    		$str=base64_decode(strrev($str)); //apply base64 first and then reverse the string}
 		 }
  		return $str;
		} 



?>