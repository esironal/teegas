<?php

defined('CACHE_EXPIRE') or define('CACHE_EXPIRE', '600');

class Cache {
	
	public $expire;
	public $exclude;
	
	//$value must be text
			 
	function __construct($expire=CACHE_EXPIRE, $exclude=array()) {
		$this->expire  = $expire;
		$this->exclude = $exclude;
	}

	function put ($key, $value) {
		$filePath = $this->getFilePath($key);
		if ( file_put_contents($filePath, $value) ) return true;
		return false;
	}
	
	function get ($key, $comptime=null) {
		$filePath = $this->getFilePath($key);
		if ( $filePath == null ) return false;
		if (!file_exists($filePath)) return false;
		if ( (!empty($comptime) && filemtime($filePath) > $comptime ) or 
			( filemtime($filePath) + $this->expire)  > time() ) {
			return file_get_contents($filePath);
		} else {
			return false;
		}
	}

	function delete($key){
		$filePath = $this->getFilePath($key);
		if ( file_exists($filePath)) unlink ( $filePath );
		return true;
	}
 
	private function getFilePath($key) {
		if (in_array($key, $this->exclude)) return null;
		return CACHEPATH . md5($key) . '.txt';
	}
}

?>
