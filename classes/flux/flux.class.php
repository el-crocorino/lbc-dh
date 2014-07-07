<?php

	class flux extends flux_orm {

		/**
		 * get HTML content from url
		 * 
		 * @param  string $url url of search
		 * @return [type]      [description]
		 */
		public function get_url_content() {

			$ch = curl_init($this->get_url());

			curl_setopt($ch, CURLOPT_HEADER, false);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

			$ressource = curl_exec($ch);
			curl_close($ch);
			
			return $ressource;

		}

		public function load_search_DOM($html_content) {

			check_string($html_content, 'html_content');

			$dom = new DOMDocument();
			$dom->loadHTML($html_content);

			return $dom;
		}

	}