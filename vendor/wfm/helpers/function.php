<?php

function debug($data, $die=false){
	echo '<pre>'. print_r($data, 1) .' </pre>';
  if($data){
		die;
	}

}

function h($str)
{
    return htmlspecialchars($str);
}