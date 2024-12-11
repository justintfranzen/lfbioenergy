<?php
/*
 * Pagination
 * @since 2.1.0
 */

/*
 *  get_the_tbp_pagination
 *
 *  Makes some pagination
 *
 *  @type	function
 *  @date	8/27/17
 *  @since	2.1.0
 *
 *  @param	$max_num_pages (int) (required) (max number of pages)
 *  @param	$paged (int) (required) (current page)
 *
 *  @return	string (int)
 */

function get_the_tbp_pagination($max_num_pages)
{
  $output = '';
  $paged = max(1, get_query_var('paged'));
  $big = 999999999; // need an unlikely integer

  $pages = paginate_links([
    'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
    'format' => '/page/%#%',
    'current' => $paged,
    'total' => $max_num_pages,
    'prev_text' => __('Previous'),
    'next_text' => __('Next'),
    'end_size' => 0,
    'mid_size' => 2,
    'type' => 'array',
  ]);

  if ($paged != $max_num_pages && $paged != $max_num_pages - 1 && $paged != $max_num_pages - 2) {
    unset($pages[sizeof($pages) - 2]);
  }

  if (is_array($pages)) {
    $output .= '<section class="pagination">';
    $output .= '<div class="wrapper">';

    if ($paged != 1) {
      $output .=
        '<a aria-label="First Page" class="page-numbers first" href="' .
        esc_url(get_pagenum_link(1)) .
        '"> <i class="fa-light fa-arrow-right"></i> </a>';
    }

    $x = 0;
    foreach ($pages as $page) {
      $page_test = $paged >= 4 && $x == 1;
      if ($page != '<span class="page-numbers dots">&hellip;</span>' && !$page_test) {
        $output .= $page;
      }
      $x++;
    }
    if ($paged != $max_num_pages) {
      $output .=
        '<a aria-label="Last Page" class="page-numbers last" href="' .
        esc_url(get_pagenum_link($max_num_pages)) .
        '"> <i class="fa-light fa-arrow-right"></i> </a>';
    }

    $output .= '</div>';
    $output .= '</section>';
  }

  return $output;
}

/*
 *  the_tbp_pagination
 *
 *  echoes out get_the_pagination
 *
 *  @type	function
 *  @date	8/27/17
 *  @since	2.1.0
 *
 *  @param	$max_num_pages (int) (required) (max number of pages)
 *  @param	$paged (int) (required) (current page)
 */

function the_tbp_pagination($max_num_pages)
{
  echo get_the_tbp_pagination($max_num_pages);
}
