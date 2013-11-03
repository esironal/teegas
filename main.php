<?php

global $post;

function main() {
	global $post;
	
    //Get the uri string from the query
    $uri = $_SERVER['QUERY_STRING'];

    //Make sure to decode characters including non-latin
    $uri = urldecode($uri);

    // START processing $_GET variables
    if (!USE_MOD_REWRITE && strpos($uri, '?') !== false) {
        $_GET = array(); // empty $_GET array since we're going to rebuild it
        list($uri, $get_var) = explode('?', $uri);
        $exploded_get = explode('&', $get_var);

        if (count($exploded_get)) {
            foreach ($exploded_get as $get) {
                list($key, $value) = explode('=', $get);
                $_GET[$key] = $value;
            }
        }
    } else if (!USE_MOD_REWRITE && (strpos($uri, '&') !== false || strpos($uri, '=') !== false)) {
    // We're NOT using mod_rewrite, and there's no question mark wich points to GET variables in combination with site root.
        $uri = '/';
    }
    // If we're using mod_rewrite, we should have a PAGE entry.
    if (USE_MOD_REWRITE && array_key_exists('PAGE', $_GET)) {
        $uri = $_GET['PAGE'];
        unset($_GET['PAGE']);
    } else if (USE_MOD_REWRITE)   // We're using mod_rewrite but don't have a PAGE entry, assume site root.
        $uri = '/';

    // Needed to allow for ajax calls to backend
    if (array_key_exists('AJAX', $_GET)) {
        $uri = '/'.ADMIN_DIR.$_GET['AJAX'];
        unset($_GET['AJAX']);
    }
    // END processing $_GET variables
    // remove suffix page if founded
    if (URL_SUFFIX !== '' and URL_SUFFIX !== '/')
        $uri = preg_replace('#^(.*)('.URL_SUFFIX.')$#i', "$1", $uri);

    if ($uri != null && $uri[0] != '/')
        $uri = '/'.$uri;
		
    //Get pages from uri
	if (! ($post instanceof Post) ) {
		$post = new Post();
	}
	$post->findByUri($uri);
    
	//run and generate contents
	echo  executeTemplate($post);
}

function getTemplateName($type, $bstype){
  if (file_exists( TEMPLATEPATH . $type . '-' . $bstype . '.php' )) {
    $ret = TEMPLATEPATH . $type . '-' . $bstype . '.php';
  } else if (file_exists( TEMPLATEPATH . $type . '.php' )) {
    $ret = TEMPLATEPATH . $type . '.php';
  }	else {
	$ret = DEFAULT_TEMPLATEPATH . $type . '.php';
  }
  return $ret;
}

function executeTemplate($post) { 
  global $bstype; // $bstype can be set via [layout] shortcode
  $maingrids = 12;
  $sidegrids = 4;
  //$post = $in;

  $content = $post->content();

  ob_start();

  //Header
  include ( getTemplateName('header', $bstype));
  
  //Navigation bar.
  include ( getTemplateName('navbar', $bstype));

  //Main contents. Sidebar is inside of the contents.
  include ( getTemplateName('content', $bstype));
  
  //Footer
  include ( getTemplateName('footer', $bstype));

  $out = ob_get_contents();
  if (function_exists('beforeOutput')) {
	  $out = beforeOutput($out);
  }

  ob_end_clean();
  
  return $out;
}



?>
