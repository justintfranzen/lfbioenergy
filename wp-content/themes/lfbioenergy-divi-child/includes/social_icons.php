<ul class="et-social-icons">

<i class="fa-brands fa-linkedin-in"></i>


<?php if ('on' === et_get_option('divi_show_facebook_icon', 'on')): ?>
	<li class="et-social-icon et-social-facebook">
		<a href="<?php echo esc_url(strval(et_get_option('divi_facebook_url', '#'))); ?>" class="icon">
			<span><?php esc_html_e('Facebook', 'Divi'); ?></span>
		</a>
	</li>
<?php endif; ?>
<?php if ('on' === et_get_option('divi_show_twitter_icon', 'on')): ?>
	<li class="et-social-icon et-social-twitter">
		<a href="<?php echo esc_url(strval(et_get_option('divi_twitter_url', '#'))); ?>" class="icon">
			<span><?php esc_html_e('X', 'Divi'); ?></span>
		</a>
	</li>
<?php endif; ?>

<?php $et_instagram_default = true === et_divi_is_fresh_install() ? 'on' : 'false'; ?>
<?php if ('on' === et_get_option('divi_show_instagram_icon', $et_instagram_default)): ?>
	<li class="et-social-icon et-social-instagram">
		<a href="<?php echo esc_url(strval(et_get_option('divi_instagram_url', '#'))); ?>" class="icon">
			<span><?php esc_html_e('Instagram', 'Divi'); ?></span>
		</a>
	</li>
<?php endif; ?>
<?php if ('on' === et_get_option('divi_show_rss_icon', 'on')): ?>
<?php $et_rss_url = !empty(et_get_option('divi_rss_url')) ? et_get_option('divi_rss_url') : get_bloginfo('rss2_url'); ?>
	<li class="et-social-icon et-social-rss">
		<a href="<?php echo esc_url($et_rss_url); ?>" class="icon">
			<span><?php esc_html_e('RSS', 'Divi'); ?></span>
		</a>
	</li>
<?php endif; ?>

</ul>