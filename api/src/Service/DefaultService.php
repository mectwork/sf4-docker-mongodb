<?php

namespace App\Service;

use Symfony\Component\Routing\RouterInterface;

class DefaultService {

	/**
	 * @var RouterInterface
	 */
	private $router;

	function __construct( RouterInterface $router ) {
		$this->router = $router;
	}

	public function theDate() {
		return date( 'm/d/Y' );
	}

    /**
     * Get all the Routes.
     *
     * @return array
     */
	public function getRoutes() {

		$collection = $this->router->getRouteCollection();
		$allRoutes  = $collection->all();

		$paths = [];

		foreach ( $allRoutes as $route ) {
            $paths[] = $route->getPath();
		}

		return $paths;
	}

}