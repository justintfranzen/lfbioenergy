<?php get_header(); ?>
<!-- This is just a "cleaned up" version of Divi's index.php, with a header added in for the search term -->
<div id="main-content" class="search-page">
  <div class="et_pb_section main-header-section et_pb_with_background">
    <div class="et_pb_row">
      <div class="et_pb_column">
        <div class="et_pb_module et_pb_text main-header-section_sub-header  et_pb_text_align_left">
          <div class="et_pb_text_inner">
            <p>Search:</p>
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
        <?php if (have_posts()): ?>
          <?php while (have_posts()): ?>
            <?php
            the_post();
            $post_format = et_pb_post_format();
            $thumb = '';
            $width = (int) apply_filters('et_pb_index_blog_image_width', 1080);
            $height = (int) apply_filters('et_pb_index_blog_image_height', 675);
            $classtext = 'et_pb_post_main_image';
            $titletext = get_the_title();
            $link = get_the_permalink();
            $post_id = get_the_ID();
            $alttext = get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true);
            $thumbnail = get_thumbnail($width, $height, $classtext, $alttext, $titletext, false, 'Blogimage');
            $thumb = $thumbnail['thumb'];
            ?>
            <article id="post-<?= $post_id ?>" <?php post_class('et_pb_post'); ?>>
              <?php et_divi_post_format_content(); ?>
              <?php if (!in_array($post_format, ['link', 'audio', 'quote'])):
                if ('video' === $post_format && false !== ($first_video = et_get_first_video())):
                  printf(
                    '<div class="et_main_video_container">
                      %1$s
                    </div>',
                    et_core_esc_previously($first_video),
                  );
                elseif (
                  !in_array($post_format, ['gallery']) &&
                  'on' === et_get_option('divi_thumbnails_index', 'on') &&
                  '' !== $thumb
                ): ?>
                  <a class="entry-featured-image-url" href="<?= $link ?>">
                    <?php print_thumbnail($thumb, $thumbnail['use_timthumb'], $titletext, $width, $height); ?>
                  </a>
                  <?php elseif ('gallery' === $post_format):
                  et_pb_gallery_images();
                endif;
              endif; ?>
              <?php if (!in_array($post_format, ['link', 'audio', 'quote'])): ?>
                <?php if (!in_array($post_format, ['link', 'audio'])): ?>
                  <h2 class="entry-title"><a href="<?= $link ?>"><?= $titletext ?></a></h2>
                <?php endif; ?>

                <?= truncate_post(270, false) ? truncate_post(270, false) : get_the_excerpt() ?>
              <?php endif; ?>
            </article>
         <?php endwhile; ?>
          <?php if (function_exists('wp_pagenavi')) {
            wp_pagenavi();
          } else {
            get_template_part('includes/navigation', 'index');
          } ?>
        <?php else: ?>
          <?php get_template_part('includes/no-results', 'index'); ?>
        <?php endif; ?>
      </div>
      <?php get_sidebar(); ?>
    </div>
  </div>
</div>

<?php get_footer();
