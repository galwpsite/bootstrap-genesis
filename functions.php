<?php
/**
 * functions.php
 *
 */

/**
 * Include all php files in the /includes directory
 *
 * https://gist.github.com/theandystratton/5924570
 */
add_action( 'genesis_setup', 'bsg_load_lib_files', 15 );

function bsg_load_lib_files() {
    foreach ( glob( dirname( __FILE__ ) . '/lib/*.php' ) as $file ) { include $file; }
}

if (in_array($_SERVER['REMOTE_ADDR'], array('127.0.0.1', '::1'))) {
  add_action("wp_enqueue_scripts","wpc_add_livereload");
}
function wpc_add_livereload(){
  wp_register_script('livereload', 'http://localhost:35729/livereload.js?snipver=1', null, false, true);
  wp_enqueue_script('livereload');
}
