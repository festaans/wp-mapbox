<?php

/********************* META BOX DEFINITIONS ***********************/

/**
 * Prefix of meta keys (optional)
 * Use underscore (_) at the beginning to make keys hidden
 * Alt.: You also can make prefix empty to disable it
 */
// Better has an underscore as last sign
$prefix = 'map_';

global $meta_boxes;

$meta_boxes = array();

/********************* moretitles META BOX ***********************/

//map metabox
$meta_boxes[] = array(
      // Meta box id, UNIQUE per meta box. Optional since 4.1.5
  'id' => 'map',

  // Meta box title - Will appear at the drag and drop handle bar. Required.
  'title' => 'Map',

  // Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
  'pages' => array('page'),

  // Where the meta box appear: normal (default), advanced, side. Optional.
  'context' => 'advanced',

  // Order of meta box: high (default), low. Optional.
  'priority' => 'low',

  // Auto save: true, false (default). Optional.
  'autosave' => true,

    'fields' => array(
      array(
        'id'            => 'address',
        'name'          => 'Address',
        'type'          => 'text',
        'std'           => 'Centurion, South Africa',
      ),
      array(
        'id'            => 'loc',
        'type'          => 'map',
        'std'           => '-25.838942,28.216527',     // 'latitude,longitude[,zoom]' (zoom is optional)
        'style'         => 'width: 759px; height: 300px',
        'address_field' => 'address',                     // Name of text field where address is entered. Can be list of text fields, separated by commas (for ex. city, state)
      ),
    )
  );

/********************* META BOX REGISTERING ***********************/

/**
 * Register meta boxes
 *
 * @return void
 */
function map_register_meta_boxes()
{
  // Make sure there's no errors when the plugin is deactivated or during upgrade
  if ( !class_exists( 'RW_Meta_Box' ) )
    return;

  global $meta_boxes;
  foreach ( $meta_boxes as $meta_box )
  {
    new RW_Meta_Box( $meta_box );
  }
}
// Hook to 'admin_init' to make sure the meta box class is loaded before
// (in case using the meta box class in another plugin)
// This is also helpful for some conditionals like checking page template, categories, etc.
add_action( 'admin_init', 'map_register_meta_boxes' );

?>