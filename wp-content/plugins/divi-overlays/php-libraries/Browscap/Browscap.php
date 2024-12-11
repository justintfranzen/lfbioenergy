<?php

/**
 * Browscap.ini parsing class with caching and update capabilities
 *
 * PHP version 5
 *
 * Copyright (c) 2006-2012 Jonathan Stoppani
 *
 * Permission is hereby granted, free of charge, to any person obtaining a
 * copy of this software and associated documentation files (the "Software"),
 * to deal in the Software without restriction, including without limitation
 * the rights to use, copy, modify, merge, publish, distribute, sublicense,
 * and/or sell copies of the Software, and to permit persons to whom the
 * Software is furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included
 * in all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS
 * OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @package    Browscap
 * @author     Jonathan Stoppani <jonathan@stoppani.name>
 * @author     Vítor Brandão <noisebleed@noiselabs.org>
 * @author     Mikołaj Misiurewicz <quentin389+phpb@gmail.com>
 * @copyright  Copyright (c) 2006-2012 Jonathan Stoppani
 * @version    1.0
 * @license    http://www.opensource.org/licenses/MIT MIT License
 * @link       https://github.com/GaretJax/phpbrowscap/
 */
if ( ! class_exists( 'Browscap' ) ) {
 
	class Browscap
	{
		/**
		 * Current version of the class.
		 */
		const VERSION = '2.1.1';

		const CACHE_FILE_VERSION = '2.1.0';

		/**
		 * Different ways to access remote and local files.
		 *
		 * UPDATE_FOPEN: Uses the fopen url wrapper (use file_get_contents).
		 * UPDATE_FSOCKOPEN: Uses the socket functions (fsockopen).
		 * UPDATE_CURL: Uses the cURL extension.
		 * UPDATE_LOCAL: Updates from a local file (file_get_contents).
		 */
		const UPDATE_FOPEN     = 'URL-wrapper';
		const UPDATE_FSOCKOPEN = 'socket';
		const UPDATE_CURL      = 'cURL';
		const UPDATE_LOCAL     = 'local';

		/**
		 * Options for regex patterns.
		 *
		 * REGEX_DELIMITER: Delimiter of all the regex patterns in the whole class.
		 * REGEX_MODIFIERS: Regex modifiers.
		 */
		const REGEX_DELIMITER               = '@';
		const REGEX_MODIFIERS               = 'i';
		const COMPRESSION_PATTERN_START     = '@';
		const COMPRESSION_PATTERN_DELIMITER = '|';

		/**
		 * The values to quote in the ini file
		 */
		const VALUES_TO_QUOTE = 'Browser|Parent';

		const BROWSCAP_VERSION_KEY = 'GJK_Browscap_Version';

		/**
		 * The headers to be sent for checking the version and requesting the file.
		 */
		const REQUEST_HEADERS = "GET %s HTTP/1.0\r\nHost: %s\r\nUser-Agent: %s\r\nConnection: Close\r\n\r\n";

		/**
		 * how many pattern should be checked at once in the first step
		 */
		const COUNT_PATTERN = 100;

		/**
		 * Options for auto update capabilities
		 *
		 * $remoteVerUrl: The location to use to check out if a new version of the
		 *                browscap.ini file is available.
		 * $remoteIniUrl: The location from which download the ini file.
		 *                The placeholder for the file should be represented by a %s.
		 * $timeout: The timeout for the requests.
		 * $updateInterval: The update interval in seconds.
		 * $errorInterval: The next update interval in seconds in case of an error.
		 * $doAutoUpdate: Flag to disable the automatic interval based update.
		 * $updateMethod: The method to use to update the file, has to be a value of
		 *                an UPDATE_* constant, null or false.
		 *
		 * The default source file type is changed from normal to full. The performance difference
		 * is MINIMAL, so there is no reason to use the standard file whatsoever. Either go for light,
		 * which is blazing fast, or get the full one. (note: light version doesn't work, a fix is on its way)
		 */
		public $remoteIniUrl = 'http://browscap.org/stream?q=PHP_BrowscapINI';
		public $remoteVerUrl = 'http://browscap.org/version';
		public $timeout = 5;
		public $updateInterval = 432000; // 5 days
		public $errorInterval = 7200; // 2 hours
		public $doAutoUpdate = true;
		public $updateMethod = null;

		/**
		 * The path of the local version of the browscap.ini file from which to
		 * update (to be set only if used).
		 *
		 * @var string
		 */
		public $localFile = null;

		/**
		 * The useragent to include in the requests made by the class during the
		 * update process.
		 *
		 * @var string
		 */
		public $userAgent = 'http://browscap.org/ - PHP Browscap/%v %m';

		/**
		 * Flag to enable only lowercase indexes in the result.
		 * The cache has to be rebuilt in order to apply this option.
		 *
		 * @var bool
		 */
		public $lowercase = false;

		/**
		 * Flag to enable/disable silent error management.
		 * In case of an error during the update process the class returns an empty
		 * array/object if the update process can't take place and the browscap.ini
		 * file does not exist.
		 *
		 * @var bool
		 */
		public $silent = false;

		/**
		 * Where to store the cached PHP arrays.
		 *
		 * @var string
		 */
		public $cacheFilename = 'cache.php';

		/**
		 * Where to store the downloaded ini file.
		 *
		 * @var string
		 */
		public $iniFilename = 'browscap.ini';

		/**
		 * Path to the cache directory
		 *
		 * @var string
		 */
		public $cacheDir = null;

		/**
		 * Flag to be set to true after loading the cache
		 *
		 * @var bool
		 */
		protected $_cacheLoaded = false;

		/**
		 * Where to store the value of the included PHP cache file
		 *
		 * @var array
		 */
		protected $_userAgents = array();
		protected $_browsers = array();
		protected $_patterns = array();
		protected $_properties = array();
		protected $_source_version;

		/**
		 * An associative array of associative arrays in the format
		 * `$arr['wrapper']['option'] = $value` passed to stream_context_create()
		 * when building a stream resource.
		 *
		 * Proxy settings are stored in this variable.
		 *
		 * @see http://www.php.net/manual/en/function.stream-context-create.php
		 * @var array
		 */
		protected $_streamContextOptions = array();

		/**
		 * A valid context resource created with stream_context_create().
		 *
		 * @see http://www.php.net/manual/en/function.stream-context-create.php
		 * @var resource
		 */
		protected $_streamContext = null;

		/**
		 * Constructor class, checks for the existence of (and loads) the cache and
		 * if needed updated the definitions
		 *
		 * @param string $cache_dir
		 *
		 * @throws Exception
		 */
		public function __construct($cache_dir = null)
		{

			if (!isset($cache_dir)) {
				throw new Exception('You have to provide a path to read/store the browscap cache file');
			}

			$old_cache_dir = $cache_dir;
			$cache_dir     = realpath($cache_dir);

			if (false === $cache_dir) {
				throw new Exception(
					sprintf(
						'The cache path %s is invalid. Are you sure that it exists and that you have permission to access it?',
						$old_cache_dir
					)
				);
			}

			// Is the cache dir really the directory or is it directly the file?
			if (substr($cache_dir, -4) === '.php') {
				$this->cacheFilename = basename($cache_dir);
				$this->cacheDir      = dirname($cache_dir);
			} else {
				$this->cacheDir = $cache_dir;
			}

			$this->cacheDir .= DIRECTORY_SEPARATOR;
		}

		/**
		 * @return mixed
		 */
		public function getSourceVersion()
		{
			return $this->_source_version;
		}

		/**
		 * Gets the information about the browser by User Agent
		 *
		 * @param string $user_agent   the user agent string
		 * @param bool   $return_array whether return an array or an object
		 *
		 * @throws Exception
		 * @return \stdClass|array  the object containing the browsers details. Array if
		 *                    $return_array is set to true.
		 */
		public function getBrowser($user_agent = null, $return_array = false)
		{

			$cache_file = $this->cacheDir . $this->cacheFilename;
			if (!$this->_cacheLoaded && !$this->_loadCache($cache_file)) {
				throw new Exception('Cannot load cache file - the cache format is not compatible.');
			}

			// Automatically detect the useragent
			if (!isset($user_agent)) {
				if (isset($_SERVER['HTTP_USER_AGENT'])) {
					$user_agent = sanitize_text_field( wp_unslash( $_SERVER['HTTP_USER_AGENT'] ) );
				} else {
					$user_agent = '';
				}
			}

			$browser = array();

			$patterns = array_keys($this->_patterns);
			$chunks   = array_chunk($patterns, self::COUNT_PATTERN);

			foreach ($chunks as $chunk) {
				$longPattern = self::REGEX_DELIMITER
					. '^(?:' . implode(')|(?:', $chunk) . ')$'
					. self::REGEX_DELIMITER . 'i';

				if (!preg_match($longPattern, $user_agent)) {
					continue;
				}

				foreach ($chunk as $pattern) {
					$patternToMatch = self::REGEX_DELIMITER . '^' . $pattern . '$' . self::REGEX_DELIMITER . 'i';
					$matches        = array();

					if (!preg_match($patternToMatch, $user_agent, $matches)) {
						continue;
					}

					$patternData = $this->_patterns[$pattern];

					if (1 === count($matches)) {
						// standard match
						$key         = $patternData;
						$simpleMatch = true;
					} else {
						// phpcs:ignore WordPress.PHP.DiscouragedPHPFunctions.serialize_unserialize
						$patternData = unserialize($patternData);

						// match with numeric replacements
						array_shift($matches);

						$matchString = self::COMPRESSION_PATTERN_START
							. implode(self::COMPRESSION_PATTERN_DELIMITER, $matches);

						if (!isset($patternData[$matchString])) {
							// partial match - numbers are not present, but everything else is ok
							continue;
						}

						$key = $patternData[$matchString];

						$simpleMatch = false;
					}

					$browser = array(
						$user_agent, // Original useragent
						trim(strtolower($pattern), self::REGEX_DELIMITER),
						$this->_pregUnQuote($pattern, $simpleMatch ? false : $matches)
					);

					// phpcs:ignore WordPress.PHP.DiscouragedPHPFunctions.serialize_unserialize
					$browser = $value = $browser + unserialize($this->_browsers[$key]);

					while (array_key_exists(3, $value)) {
						// phpcs:ignore WordPress.PHP.DiscouragedPHPFunctions.serialize_unserialize
						$value = unserialize($this->_browsers[$value[3]]);
						$browser += $value;
					}

					if (!empty($browser[3]) && array_key_exists($browser[3], $this->_userAgents)) {
						$browser[3] = $this->_userAgents[$browser[3]];
					}

					break 2;
				}
			}

			// Add the keys for each property
			$array = array();
			foreach ($browser as $key => $value) {
				if ($value === 'true') {
					$value = true;
				} elseif ($value === 'false') {
					$value = false;
				}

				$propertyName = $this->_properties[$key];

				if ($this->lowercase) {
					$propertyName = strtolower($propertyName);
				}

				$array[$propertyName] = $value;
			}

			return $return_array ? $array : (object) $array;
		}

		/**
		 * @param array $properties
		 * @param array $propertiesKeys
		 *
		 * @return array
		 */
		protected function resortProperties(array $properties, array $propertiesKeys)
		{
			$browser = array();

			foreach ($properties as $propertyName => $propertyValue) {
				if (!isset($propertiesKeys[$propertyName])) {
					continue;
				}

				$browser[$propertiesKeys[$propertyName]] = $propertyValue;
			}

			return $browser;
		}

		/**
		 * @param array $tmpPatterns
		 *
		 * @return array
		 */
		protected function deduplicatePattern(array $tmpPatterns)
		{
			$patternList = array();

			foreach ($tmpPatterns as $pattern => $patternData) {
				if (is_int($patternData)) {
					$data = $patternData;
				} elseif (2 == count($patternData)) {
					end($patternData);

					$pattern = $patternData['first'];
					$data    = key($patternData);
				} else {
					unset($patternData['first']);

					$data = $this->deduplicateCompressionPattern($patternData, $pattern);
				}

				$patternList[$pattern] = $data;
			}

			return $patternList;
		}

		/**
		 * @param string $a
		 * @param string $b
		 *
		 * @return int
		 */
		protected function compareBcStrings($a, $b)
		{
			$a_len = strlen($a);
			$b_len = strlen($b);

			if ($a_len > $b_len) {
				return -1;
			}

			if ($a_len < $b_len) {
				return 1;
			}

			$a_len = strlen(str_replace(array('*', '?'), '', $a));
			$b_len = strlen(str_replace(array('*', '?'), '', $b));

			if ($a_len > $b_len) {
				return -1;
			}

			if ($a_len < $b_len) {
				return 1;
			}

			return 0;
		}

		/**
		 * That looks complicated...
		 *
		 * All numbers are taken out into $matches, so we check if any of those numbers are identical
		 * in all the $matches and if they are we restore them to the $pattern, removing from the $matches.
		 * This gives us patterns with "(\d)" only in places that differ for some matches.
		 *
		 * @param array  $matches
		 * @param string $pattern
		 *
		 * @return array of $matches
		 */
		protected function deduplicateCompressionPattern($matches, &$pattern)
		{
			$tmp_matches = $matches;
			$first_match = array_shift($tmp_matches);
			$differences = array();

			foreach ($tmp_matches as $some_match) {
				$differences += array_diff_assoc($first_match, $some_match);
			}

			$identical = array_diff_key($first_match, $differences);

			$prepared_matches = array();

			foreach ($matches as $i => $some_match) {
				$key = self::COMPRESSION_PATTERN_START
					. implode(self::COMPRESSION_PATTERN_DELIMITER, array_diff_assoc($some_match, $identical));

				$prepared_matches[$key] = $i;
			}

			$pattern_parts = explode('(\d)', $pattern);

			foreach ($identical as $position => $value) {
				$pattern_parts[$position + 1] = $pattern_parts[$position] . $value . $pattern_parts[$position + 1];
				unset($pattern_parts[$position]);
			}

			$pattern = implode('(\d)', $pattern_parts);

			return $prepared_matches;
		}

		/**
		 * Converts browscap match patterns into preg match patterns.
		 *
		 * @param string $user_agent
		 *
		 * @return string
		 */
		protected function _pregQuote($user_agent)
		{
			$pattern = preg_quote($user_agent, self::REGEX_DELIMITER);

			// the \\x replacement is a fix for "Der gro\xdfe BilderSauger 2.00u" user agent match

			return str_replace(
				array('\*', '\?', '\\x'),
				array('.*', '.', '\\\\x'),
				$pattern
			);
		}

		/**
		 * Converts preg match patterns back to browscap match patterns.
		 *
		 * @param string        $pattern
		 * @param array|boolean $matches
		 *
		 * @return string
		 */
		protected function _pregUnQuote($pattern, $matches)
		{
			// list of escaped characters: http://www.php.net/manual/en/function.preg-quote.php
			// to properly unescape '?' which was changed to '.', I replace '\.' (real dot) with '\?',
			// then change '.' to '?' and then '\?' to '.'.
			$search  = array(
				'\\' . self::REGEX_DELIMITER, '\\.', '\\\\', '\\+', '\\[', '\\^', '\\]', '\\$', '\\(', '\\)', '\\{', '\\}',
				'\\=', '\\!', '\\<', '\\>', '\\|', '\\:', '\\-', '.*', '.', '\\?'
			);
			$replace = array(
				self::REGEX_DELIMITER, '\\?', '\\', '+', '[', '^', ']', '$', '(', ')', '{', '}', '=', '!', '<', '>', '|',
				':', '-', '*', '?', '.'
			);

			$result = substr(str_replace($search, $replace, $pattern), 2, -2);

			if ($matches) {
				foreach ($matches as $oneMatch) {
					$position = strpos($result, '(\d)');
					$result   = substr_replace($result, $oneMatch, $position, 4);
				}
			}

			return $result;
		}

		/**
		 * Loads the cache into object's properties
		 *
		 * @param string $cache_file
		 *
		 * @return boolean
		 */
		protected function _loadCache($cache_file)
		{
			$cache_version  = null;
			$source_version = null;
			$browsers       = array();
			$userAgents     = array();
			$patterns       = array();
			$properties     = array();

			$this->_cacheLoaded = false;

			require $cache_file;

			if (!isset($cache_version) || $cache_version != self::CACHE_FILE_VERSION) {
				return false;
			}

			$this->_source_version = $source_version;
			$this->_browsers       = $browsers;
			$this->_userAgents     = $userAgents;
			$this->_patterns       = $patterns;
			$this->_properties     = $properties;

			$this->_cacheLoaded = true;

			return true;
		}
	}

}
