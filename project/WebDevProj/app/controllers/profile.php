<?php

class profile extends Controller
{
    protected $user;
    protected $root;
    protected $title = '';
    protected $messages = [];

	protected $errors = array(); 
    
    public function __construct()
    {
        // Get the User model 
        $this->user = $this->model('User');
    }

    // Triggered if the profile/index route has been requested
    public function index($root, $name =  '', $otherName = '')
    {
        $this->root = $root;
        $this->title = 'Register';
        $user = $this->user;
		
		        $user = $this->user;
        $messages = [];
        if ($this->chkIsLoggedIn($user))
        {
            // Displays a message if required 
            if (isset($_SESSION['sysMessage']))
            {
                $messages['system'] = $_SESSION['sysMessage'];
            }
            unset($_SESSION['sysMessage']);
        }
		
    
        // Check if the make changes button has been clicked
        if (isset($_POST['action']) && $_POST['action'] === 'Make changes')
        {

            // Load the script with helper functions, i.e., to get the sanitise function
            require_once '../app/helper.php';
			// Call the trySignIn method
            if ($this->editprofile())
            {
                // Redirect the browser to the user_home path
                $url = '../../public/userhome/';
                header('Location: ' . $url);
				$userhome->messages['system'] = 'A valid password must be entered, with at least 8 characters consisting of at least 1 upper, 1 lower, and 1 number';


                exit();
            }
			
			
        }
	//checks if the delete profile button has been pressed
		if (isset($_POST['delete']) && $_POST['delete'] === 'Delete profile')
        {
				$this->deleteuser();
					
		}
			
			
			
        // Set the data parameters required for the view
        $data = array(
            'root' => $this->root,
            'title' => $this->title, 
            'isLoggedIn' => $user->isLoggedIn,
			 'name' => $user->name, 
            'messages' => $this->messages
        );        
		
		$results = array(array());

        // Show the 'login/index' view passing any data parameters required
        $this->view('edit_profile/index', $data, $results);
        exit;
    }
	


 public function editprofile(){
// REGISTER USER
	$this->messages = [];
	
	//form checking
		if (empty($_POST["firstname"])) {
		$this->messages['firstname'] = 'A name must be entered.';
        }
		else
        {
            $firstname = sanitise($_POST["firstname"]);
            if (!preg_match("/^[a-zA-Z ]*$/",$firstname))
            $this->messages['firstname'] = 'The name format is invalid.';
        }
		
        if (empty($_POST["email"])) {
            $this->messages['email'] = 'An email must be entered.';
        }
        else
        {
            $email = sanitise($_POST["email"]);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL))
            $this->messages['email'] = 'The email format is invalid.';
        }

        if (empty($_POST["password"])) {
            $this->messages['password'] = 'A valid password must be entered, with at least 8 characters consisting of at least 1 upper, 1 lower, and 1 number';
        }
        else
        {
            $passwordPattern = "/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9]).{8,16}$/";

    
            $password = sanitise($_POST["password"]);
            if (!preg_match($passwordPattern, $password))
            {
                $this->messages['password'] = 'A valid password must be entered, with at least 8 characters consisting of at least 1 upper, 1 lower, and 1 number';
            }
        }
		
		


//setting variables
		$user = $this->user;
		 if (empty($this->messages))
		 {
		$email = sanitise($_POST["email"]);
		$firstname = sanitise($_POST["firstname"]);
		$password = sanitise($_POST["password"]);
		$userid = $user->id;

		$this->messages['system'] = '<div class="alert alert-success form-control-alert">' . $user->errorMessage . '</div>';

		
		if($user->edituser($firstname, $email, $password, $userid))
		{
			
					return true;

			
		}
		}
		
 }
	
	//delete user function
	public function deleteuser()
	{
		$user = $this->user;
		$userid = $user->id;
		$user->deleteprofile($userid);	
            $wasLoggedIn = true;
			$user->isLoggedIn = false;
            unset($_SESSION['userId']);
            unset($_SESSION['userName']);
			
		            $url = '../../public/home/';
            header('Location: ' . $url);
            exit();            
		
	}
	
 
}