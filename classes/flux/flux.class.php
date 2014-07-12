<?php

	class flux extends flux_orm {

		/**
         * Saves existing flux
         *
         * @return boolean   db insert successful
         */
        public function save() {

            $db = new db();

            $sql = array();
            $sql['tables'] = 'flux';
            $sql['fields'] = 'flux_user_id, flux_flux_id, flux_title, flux_updated';
            $sql['values'] = ':flux_user_id, :flux_flux_id, :flux_title, NOW()';
            $sql['data'] = array(
                'flux_user_id' => $this->get_user_id(),
                'flux_flux_id' => $this->get_flux_id(),
                'flux_title' => $this->get_title()
                );

            if($db->insert($sql)) {
                return true;
            };

        }

        /**
         * Add new flux
         *
         * return void
         */
        public function add() {

            $db = new db();

            $sql = array();
            $sql['tables'] = 'flux';
            $sql['fields'] = 'flux_user_id, flux_flux_id, flux_title, flux_updated, flux_created';
            $sql['values'] = ':flux_user_id, :flux_flux_id, :flux_title, NOW(), NOW()';
            $sql['data'] = array(
                'flux_user_id' => $this->get_username(),
                'flux_flux_id' => $this->get_password(),
                'flux_title' => $this->get_firstname()
                );

            if($db->insert($sql)) {
                return true;
            };

            return false;

        }

        /**
         * Converts flux object to array
         *
         * @return array $flux_array flux infos
         */
        public function to_array() {

            $flux_array = array(
                'id' => $this->get_id(),
                'user_id' => $this->get_username(),
                'flux_id' => $this->get_firstname(),
                'title' => $this->get_lastname()
                );

            return $flux_array;

        }

        public static function get_user_flux_list($user_id) {

            $db = new db();

            $sql = array();
            $sql['tables'] = 'flux';
            $sql['where'][] = 'flux_user_id = :flux_user_id';
            $sql['data'] = array(
                'flux_user_id' => $user_id
                );

            dump($sql);
            $flux_array = $db->get_all($sql);

            return $flux_array;

        }

		/**
		 * Get HTML content from url
		 * 
		 * @param  string $url url of flux
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

		public function getElementsByClassName(DOMDocument $DOMDocument, $class_name) {

		    $elements = $DOMDocument->getElementsByTagName("*");
		    $matched = array();
		 
		    foreach($elements as $node) {

		        if (!$node->hasAttributes())
		            continue;
		 
		        $class_attribute = $node->attributes->getNamedItem('class');
		 
		        if (!$class_attribute)
		            continue;
		 
		        $classes = explode(' ', $class_attribute->nodeValue);
		 
		        if(in_array($class_name, $classes))
		            $matched[] = $node;
		    }
		 
		    return $matched;
		}

	
/*	$flux = new flux('appartements', 'http://www.leboncoin.fr/locations/offres/languedoc_roussillon/?f=a&th=1&mre=650&sqs=5&ret=2&location=Montpellier');

	$search = $flux->get_url_content();
	$search = $flux->load_search_DOM($search);
	$list = $flux->getElementsByClassName($search, 'list-lbc');

	foreach ($list[0]->getElementsByTagName('a') as $key => $value) {

	 	$length = $value->attributes->length;
		$title = $value->attributes->item(1)->textContent;
		echo $title . "\r\n" ;
		$url = $value->attributes->item(0)->textContent;
		echo $url . "\r\n" ;

	 }

	//var_dump($list);
	// start session */


	}