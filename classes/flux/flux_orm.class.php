<?php

	class flux_orm {

		/**
		 * Url of RSS flux
		 *
		 * @var string
		 */
		protected $url = NULL;

		/**
		 * Show title
		 * 
		 * @var string
		 */
		protected $title = NULL;

		
		/**
		* HTML content
		*
		* @var string
		*/
		protected $HTML_content = NULL;

		public function get_url() {
			return $this->url;
		}

		public function set_url($url) {
			check_string($url, 'url');
			$this->url = $url;
		}

		public function get_title() {
			return $this->title;
		}

		public function set_title($title) {
			check_string($title, 'title');
			$this->title = $title;
		}

		public function get_HTML_content() {
			return $this->HTML_content;
		}

		public function set_HTML_content($HTML_content) {
			check_string($HTML_content, 'HTML_content');
			$this->HTML_content = $HTML_content;
		}

		public function __construct($title, $url) {
			$this->set_title($title);
			$this->set_url($url);
			$this->set_HTML_content($this->get_title() . '.xml');

		}

		

	}