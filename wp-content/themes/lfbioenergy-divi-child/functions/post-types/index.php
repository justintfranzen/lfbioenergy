<?php

/*===================================================
 * Renames Default Posts to "News"
 *===================================================*/

function mdg_rename_post_type_labels($args, $post_type)
{
  if ($post_type === 'post') {
    $args['labels']['name'] = 'News';
    $args['labels']['singular_name'] = 'News';
    $args['labels']['add_new'] = 'Add New News';
    $args['labels']['add_new_item'] = 'Add New News Item';
    $args['labels']['edit_item'] = 'Edit News';
    $args['labels']['new_item'] = 'New News Item';
    $args['labels']['view_item'] = 'View News';
    $args['labels']['search_items'] = 'Search News';
    $args['labels']['not_found'] = 'No News found';
    $args['labels']['not_found_in_trash'] = 'No News found in trash';
    $args['labels']['all_items'] = 'All News';
    $args['labels']['menu_name'] = 'News';
    $args['labels']['name_admin_bar'] = 'News';
  }
  return $args;
}
add_filter('register_post_type_args', 'mdg_rename_post_type_labels', 10, 2);
