<?php

class Register extends Controller
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

    // Triggered if the register/index route has been requested
    public function index($root, $name =  '', $otherName = '')
    {
        $this->root = $root;
        $this->title = 'Register';
        $user = $this->user;
		unset($messages);
        // Check if the register button has been clicked
        if (isset($_POST['action']) && $_POST['action'] === 'Register')
        {
            // Load the script with helper functions, i.e., to get the sanitise function
            require_once '../app/helper.php';
			// Call the trySignIn method
            if ($this->Register())
            {
                // Redirect the browser to the user_home path
                $url = '../../public/userhome/';
                header('Location: ' . $url);
                exit();
            }
			
			
        }

        // Set the data parameters required for the view
        $data = array(
            'root' => $this->root,
            'title' => $this->title, 
            'isLoggedIn' => $user->isLoggedIn,
            'messages' => $this->messages
        );        
		
		$results = array(array());

        // Show the 'register/index' view passing any data parameters required
        $this->view('register/index', $data, $results);
        exit;
    }
	


 public function Register(){
// REGISTER USER
	$this->messages = [];
	
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
		
		



		$user = $this->user;
		 if (empty($this->messages))
		 {
		$email = sanitise($_POST["email"]);
		$firstname = sanitise($_POST["firstname"]);

		$password = sanitise($_POST["password"]);
		$this->messages['system'] = '<div class="alert alert-success form-control-alert">' . $user->errorMessage . '</div>';

		
		if($user->registerUser($firstname, $email, $password))
		{
			
			
					return true;

			
		}
		 }
		  else
            {
                // Clear the necessary session variables
               $this->messages['main'] = $user->errorMessage;
            }
		return false;
 }
 
}