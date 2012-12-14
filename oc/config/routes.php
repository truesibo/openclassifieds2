<?php defined('SYSPATH') or die('No direct access allowed.');

// -- Routes Configuration and initialization -----------------------------------------

/**
 * Set the routes. Each route must have a minimum of a name, a URI and a set of
 * defaults for the URI.
 */

/**
 * Reserved pages for OC usage. They use the i18n translation
 * We will use them with extension .htm to avoid repetitions with others.
 */

/**
 * Item / post new
 * URL::title(__('publish new'))
 */
Route::set('post_new', URL::title(__('publish new')).'html')
->defaults(array(
		'controller' => 'post',    
		'action'     => 'listing',
));

//-------END reserved pages

/**
 * user admin/panel route
 */
Route::set('oc-panel', 'oc-panel/(<controller>(/<action>(/<id>)))')
->defaults(array(
		'directory'  => 'panel',
		'controller' => 'home',
		'action'     => 'index',
));

/*
	user profile route 
 */
 
Route::set('profile', 'user/<seoname>')
->defaults(array(
		'controller' => 'user',
		'action'     => 'index',
));


/**
 * page view public
 */
Route::set('page','p/<seotitle>.html')
->defaults(array(
		'controller' => 'page',    
		'action'     => 'view',
));

/**
 * Item / post view public
 */
Route::set('post', 'post(/<seotitle>.html)')
->defaults(array(
		'directory'  => 'panel',
		'controller' => 'post',    
		'action'     => 'view',
));


/**
 * SERP / listing (all posts || posts sorted by category / listing)
 */
Route::set('listing', 'listing(/<category>)(/<location>)')
->defaults(array(
		'controller' => 'posts',    
		'action'     => 'listing',
));



/**
 * Error router
 */
Route::set('error', 'oc-error/<action>/<origuri>/<message>',
array('action' => '[0-9]++',
                    	  'origuri' => '.+', 
                    	  'message' => '.+'))
->defaults(array(
    'controller' => 'error',
    'action'     => 'index'
));

/**
 * Default route
 */
Route::set('default', '(<controller>(/<action>(/<id>)))')
->defaults(array(
		'controller' => 'home',
		'action'     => 'index',
));