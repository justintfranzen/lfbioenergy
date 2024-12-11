<?php
// Exit if accessed directly.
defined('ABSPATH') || exit();

// Utils
require_once 'utils/index.php';

// Scripts
require_once 'functions/enqueue-scripts/index.php';

// Taxonomies
require_once 'functions/taxonomies/index.php';

// Post Types
require_once 'functions/post-types/index.php';

// Disable Comments
require_once 'functions/comments/index.php';

// Plugin Fix
require_once 'functions/plugin-fix/index.php';

// Admin Bar
require_once 'functions/admin-bar/index.php';

// Shortcodes
require_once 'shortcodes/index.php';

// Mobile Menu
require_once 'functions/mobile-menu/index.php';

// Add in Global Settings
require_once 'functions/global-settings/index.php';

// Custom Divi Fonts
require_once 'functions/divi-fonts/index.php';
