<?php

	class flux_orm extends basic  {

		/**
		 * user_id of RSS flux
		 *
		 * @var int
		 */
		protected $user_id = NULL;

		/**
		 * search_id of RSS flux
		 *
		 * @var int
		 */
		protected $search_id = NULL;

		/**
		 * Url of RSS flux
		 *
		 * @var string
		 */
		protected $url = NULL;
		
		/**
		* HTML content
		*
		* @var string
		*/
		protected $HTML_content = NULL;

		public function get_user_id() {
			return $this->user_id;
		}

		public function set_user_id($user_id) {
			check_string($user_id, 'user_id');
			$this->user_id = $user_id;
		}

		public function get_search_id() {
			return $this->search_id;
		}

		public function set_search_id($search_id) {
			check_string($search_id, 'search_id');
			$this->search_id = $search_id;
		}

		public function get_url() {
			return $this->url;
		}

		public function set_url($url) {
			check_string($url, 'url');
			$this->url = $url;
		}

		public function get_HTML_content() {
			return $this->HTML_content;
		}

		public function set_HTML_content($HTML_content) {
			check_string($HTML_content, 'HTML_content');
			$this->HTML_content = $HTML_content;
		}
		

	}