<?php
/*
Plugin Name: My Plugin
*/

// add_action ( string $tag, callable $function_to_add, int $priority = 10, int $accepted_args = 1 );

// $tag: hook name (required)
// $function_to_add: function name (required)
// $priority: default 10
// $accepted_args: param of $function_to_add need, default 1, 1 < param < 10
add_action('wp_head','hook_javascript');
 
function hook_javascript() {
 
    $output = "<script> alert('Page is loading...'); </script>";
 
    echo $output;
}

// add_filter ( string $tag, callable $function_to_add, int $priority = 10, int $accepted_args = 1 );
function content_filter( $content ) {
    $content = "<style>
        .entry-content p:hover {
            background-color: yellow;
        }
    </style>
    <?php $content";
    
    return $content;
}

add_filter( 'the_content', 'content_filter' );

function custom_column( $columns ) {
    $columns['cus_col'] = __('Custom Column');
    return $columns;
} 
add_filter( 'manage_media_columns', 'custom_column' );
 
function custom_column_row($columnName, $columnID){
    if($columnName == 'cus_col'){ ?>
      <p><input type="checkbox" checked disabled/>
      <label>Is it protected ?</label></p>
      <a onclick="alert('Hello World')"; href="#">Configure secure URLs</a>
    <?php }
}
add_filter( 'manage_media_custom_column', 'custom_column_row', 10, 2 ); ?>

<style>
    .author-self:hover{
        background-color: violet!important;
    }
</style>


