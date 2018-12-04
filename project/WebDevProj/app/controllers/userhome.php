<?php

class UserHome extends Controller
{
    protected $user;
    public function __construct()
    {
        // Get the User model 
        $this->user = $this->model('User');
    }

    // Triggered if the userhome/index route has been requested
    public function index($root)
    {
        // Check if the user is logged in
        $user = $this->user;

        if ($this->chkIsLoggedIn($user))
        {
            // Displays a message if required (e.g., on successful logins)
            if (isset($_SESSION['sysMessage']))
            {
                $messages['system'] = $_SESSION['sysMessage'];
            }
            unset($_SESSION['sysMessage']);
        }
		
		if (isset($_POST['action']) && $_POST['action'] === 'search')
        {
            // Load the script with helper functions, i.e., to get the sanitise function
            require_once '../app/helper.php';
			// Call the function to search the database
         $results =  $this->getquery();
		 
        }

        // Set the data parameters required for the view
        $data = array(
            'root' => $root, 
            'title' => 'Home', 
            'name' => $user->name, 
            'isLoggedIn' => $user->isLoggedIn
        );
	
		

        // Checks if the user is logged in
        if ($user->isLoggedIn)
        {
            // Shows the 'user_home/index' view, if the user is logged in, passing any data parameters required
            $this->view('user_home/index', $data, $results);



            exit;
        }
        else
        {
            // Redirects the browser to the home page, if the user is not logged in
            $url = '../../public/home/';
            header('Location: ' . $url);
            exit();            
        }
    }
	
	function getquery()
	{
		$user = $this->user;

			$search = sanitise($_POST["search"]);
			$results = $user->searchDB($search);
			

				return $results;
					
					
					
	}
	
	
	
	
	
}
