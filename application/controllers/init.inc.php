<?php

/**
 * 
 * Initialize the current page.
 * 1.check magic_quotes_gpc
 * 2.stripslashes from the data.
 * 
 * */

header('Content-Type:text/html;charset=utf-8');

if(!function_exists('stripslashes_deep'))
{
	/**
	 * Un-slashes from a string or an array by using reduce method.
	 * 
	 * @param	(mixed) $str - The input string.
	 * @author	
	 * 
	 * */
	function stripslashes_deep($value)
	{
		$value = is_array($value) ?
					array_map('stripslashes_deep', $value) :
					stripslashes($value);
		
		return $value;
	}
}


/**
 * 1.check magic_quotes_gpc
 * 2.stripslashes from the data.
 * 
 * @param	mixed $data
 * @return	mixed $data
 * 
 * */
function checkTrip($data)
{
	/**
	 * From PHP 5.40, get_magic_quotes_gpc() always returns FALSE!
	 * */
	if(get_magic_quotes_gpc())
	{
		if(is_array($data))
		{
			foreach($data as $key=>$val)
			{
				if(is_array($val))
				{
					foreach ($val as $key2=>$val2)
					{
						$data[$key][key2] = stripslashes($val2);
					}
				} else {
					$data[$key] = stripslashes($val);
				}
			}
			
			return $data;
		} else {
			return stripslashes($data);
		}
	} else {
		return $data;
	}
}

