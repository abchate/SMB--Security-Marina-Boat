<?php 
	/** ===========================================================================
		Class qui gère les requettes de l'utilisateur et les liens dynamques
	===============================================================================*/
	class Router
	{

		/**
		 * @var String ROOT URL
		 */
		private $_url;


		/**
		 * @var array ALL OPTIONAL PARAMS FROM URL
		 */
		private $params;

		/**
		 * @var String default roote
		 */
		private $_initial;


		/**
		 *  @method Constructor
		 *  @param  String URL
		 */
		public function __construct(String $url, $_404="home")
		{
			$this->_url = $url;
			$this->_initial = $_404;
		}

		/**
		 * @method config root url
		 * @param String URL
		 * @test URL Existance
		 * @return array ALL URL FOUNDED
		 */
		public function setup($url): array
		{
			$_returnArray = [];

			$urls = explode('/', $url);

			$route_path = $urls[0];

			$file = __templates.$route_path.'.php';

			if(file_exists($file))
			{

				if(isset($route_path) && !empty($route_path))
				{
					$_returnArray['page'] = $route_path;
				}

				if(isset($urls[0]) && (isset($urls[1]) &&  !empty($urls[1]) ))
				{
					$_returnArray['page'] = $route_path;
					$_returnArray['id'] = $urls[1];
				}

				if(count($urls) > 2)
				{
					$_returnArray['options'] = [];

					for($i = 2; $i < count($urls) ; $i++)
					{
						array_push($_returnArray['options'], trim($urls[$i], '/'));
					}
				}
			}
			else
			{
				// default root
				$_returnArray['page'] = $this->_initial;
			}

			$this->params = $_returnArray;

			return $_returnArray;
		}


		/**
		 * @method setInitial page root
		 * @return first screen called
		 */
		public function getInitialPage()
		{
			return $this->params['page'];
		}

		/**
		 * @return inital ID for all page
		 */
		public function getInitialID()
		{
			return isset($this->params['id']) && 
					!empty($this->params['id']) ? 
					$this->params['id'] : 'void';
		}

		/**
		 * @method send all optional params founded
		 */
		public function getOptions()
		{
			return isset($this->params['options']) && 
					!empty($this->params['options']) ?
					       $this->params['options'] : [];
		}

		/**
		 * @method run router controller
		 */
		public function run()
		{
			return $this->setup($this->_url);
		}



	}





 ?>