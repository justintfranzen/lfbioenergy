<?php get_header(); ?>
<div id="main-content" class="search-page">
  <div class="et_pb_section main-header-section et_pb_with_background">
    <div class="et_pb_row">
      <div class="et_pb_column">
      <div class="et_pb_module et_pb_text main-header-section_sub-header  et_pb_text_align_left">
          <div class="et_pb_text_inner">
            <p>Page Not Found</p>
          </div>
        </div>
        <div class="et_pb_module et_pb_text main-header-section_header  et_pb_text_align_left">
          <div class="et_pb_text_inner">
            <h1>404</h1>
          </div>
        </div>
        <div class="et_pb_module et_pb_text main-header-section_header et_pb_text_align_left">
          <div class="et_pb_text_inner">
            <h1><?= get_search_query() ?></h1>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div id="content-area" class="clearfix">
      <div id="left-area">
        <div class="entry">
          <h1 class="not-found-title">No Results Found</h1>
          <p>The page you requested could not be found. Try refining your search, or use the navigation above to locate the content.</p>
        </div>
      </div>
      <?php get_sidebar(); ?>
    </div>
  </div>
</div>

<?php get_footer();
