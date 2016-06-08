<?php

$t=time();
$t=$t%3;
if($t==0){
   //echo "failure";
    return 0;
}
else{ //echo "success";
	return 1;
}




?>