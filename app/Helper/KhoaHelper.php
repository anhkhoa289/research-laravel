<?php

if (!function_exists('echoSomething')) {
	function echoSomething(String $someString)
	{
		echo "<h1>$someString</h1>";
	}
}

if (!function_exists('is_assoc')) {
    function is_assoc($array = [])
    {
        $check = array_filter($array, function($key) {
            return !is_numeric($key);
        }, ARRAY_FILTER_USE_KEY);
        return !empty($check);
    }
}

if (!function_exists('is_indexed')) {
    function is_indexed($array = [])
    {
        $check = array_filter($array, function($key) {
            return !is_numeric($key);
        }, ARRAY_FILTER_USE_KEY);
        return empty($check);
    }
}