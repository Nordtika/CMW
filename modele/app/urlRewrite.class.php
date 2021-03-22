<?php 

class urlRewrite
{


	public static function call() {
	    global $_SERVER, $_GET;
	    if(strrpos($_SERVER['REQUEST_URI'], "page=") !== false) {
	        $url = self::getSiteUrl();
	        $arg = "";
	        $first = true;
	        foreach($_GET as $value) {
	            if($first) {
	                $first = false;
	                $arg .= $value;
	            } else {
	                $arg .= "/".$value;
	            }
	        }
	        header("Location: ".$url.$arg);
	    } 
	    
	}
	
	public static function getSiteUrl() {
	    global $_SERVER;
	    $uri = substr($_SERVER["SCRIPT_NAME"], 0, strrpos($_SERVER["SCRIPT_NAME"], '/')+1 );
	    $url = $_SERVER['SERVER_NAME'];
	    $ht = $_SERVER["HTTPS"] == "on" ? "https://" : "http://";
	    
	    return $ht.$url.$uri;
	}

}
?>