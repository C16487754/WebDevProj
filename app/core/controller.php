<?php

class Controller
{
	
	public function model($model)
	{
		
		require_once '../app/models/' . $model . '.php';
		return new $model();	
	}
	
	protected function view($view, $data = [])
    {
        // Generate the view using the specific script requested, along with the generic header and footer to used for all pages
        require_once '../app/views/includes/header.inc.php';
        require_once '../app/views/' . $view . '.php';
        require_once '../app/views/includes/footer.inc.php';
    }
}
