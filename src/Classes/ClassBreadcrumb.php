<?php 
	namespace Src\Classes;

	class ClassBreadcrumb {
		use \Src\Traits\TraitUrlParser;

		// Create breadbrumbs
		public function addBreadcrumb($separator = ' / ', $home = 'Home') {

			$path = $this -> parseUrl(); 
			$currentHref = DIRPAGE; 

			$breadcrumbs = ["<a href='".$currentHref."'><i class='fas fa-home'></i>".$home."</a>"];

			$pathkeys = array_keys($path); 
			$last = end($pathkeys);

			foreach ($path as $key => $crumb) {
				$title = ucwords(str_replace(['.php', '_', '-'],['', ' ', ' '], $crumb));
				
    		if (!empty($title)) {
    			$currentHref .= $crumb.'/';
    			
	    		if ($key != $last) {
			    	$breadcrumbs[] = "<a href='".$currentHref."'>".$title."</a>";
	    		} else {
						$breadcrumbs[] = $title;
					}
				}
			}

	    return implode($separator, $breadcrumbs);
		}
	}