<?php
class User
{
    public $name;
    public $id;
    public $isLoggedIn;
    public $isConnected = false;
    public $pdo = null;
    public $errorMessage;
    public function __construct()
    {
        // for future use        
    }

    // Connect to the database
    protected function DBConnect()
    {
        // Load the script that will create a PDO Connection to the database
        require_once '../app/database.php';
        if (isset($pdo) && $pdo != null)
        {
            $this->pdo = $pdo;
            $this->isConnected = true;
            $this->errorMessage = $pdoMessage;
        }
    }

    // Login user, if matching user credentials are found
    public function loginUser($email, $password)
    {
        // Connect to the database
        $this->DBConnect();
        // If not connected get any error messages obtained
        if (!$this->isConnected)
        {
            $this->errorMessage = $pdoMessage;
            return false;
        }
        // prepare sql statement to get the details any user found with the email submitted
        try
        {
            $sql = 'SELECT id, firstname, email, password 
                    FROM tbluser 
                    WHERE email = :email LIMIT 1';
            $s = $this->pdo->prepare($sql);
            $s->bindParam(':email', $email);    
            $s->execute();

					
			
			
        }
        catch(PDOException $e)
        {
            // Return any error messages obtained on trying to get the user details
            $this->errorMessage = 'Unexpected error trigger on fetching your user details: ' . $e->getMessage();
            return false;
        }

        // Provide an error message if the email isn't found
        if ($s->rowCount() != 1)
        {
            $this->errorMessage = 'Invalid email. Please try again.';
            return false;
        }
        
        // Get the user details found
        $row = $s->fetch();
        // Check to see if the submitted password matches the hashed value stored
        if ($password == $row['password'])
        {
            // Update the User model if the user credentials match
            $this->id = $row['id'];
            $this->name = $row['firstname'];
            $this->errorMessage = 'Successful login';
            return true;
        }
        else
        {
            // Provide an error message if the user credentials do not match
            $this->errorMessage = 'Invalid password.Please try again';
            return false;
        }
		
    }

	
	
	
	
	
	
	
	
	
	    public function registerUser($firstname, $email, $password)
		{
		// Connect to the database
        $this->DBConnect();
        // If not connected get any error messages obtained
        if (!$this->isConnected)
        {
            $this->errorMessage = $pdoMessage;
            return false;
        }
		
		
        // prepare sql statement to get the details any user found with the email submitted
        try
        {
					//prepared sql statement

			$sql = 'SELECT id, firstname, email, password 
                    FROM tbluser 
                    WHERE email = :email LIMIT 1';
            $s = $this->pdo->prepare($sql);
            $s->bindParam(':email', $email);    
            $s->execute();
		}
		catch(PDOException $e)
        {
            // Return any error messages obtained on trying to get the user details
            $this->errorMessage = 'Unexpected error trigger on fetching your user details: ' . $e->getMessage();
            return false;
        }
			
			
			
		if ($s->rowCount() > 0)
        {
            $this->errorMessage = 'Invalid email. Please try again.';

		 echo("same email used");
		 return false;
		 }
		 else{
			 		//prepared sql statement

			 
            $s = "INSERT INTO tbluser (firstname, email, password) VALUES ('$firstname', '$email', '$password')";
			$s = $this->pdo->prepare($s);
            //$s->bindParam(':email', $email);    
            $s->execute();
			
			 return true;
		 }
		 
			
			
        }
		
		
		public $data;
		public function searchDB($search)
		{			
				// Connect to the database
        $this->DBConnect();
        // If not connected get any error messages obtained
        if (!$this->isConnected)
        {
            $this->errorMessage = $pdoMessage;
            return false;
        }
				//prepared sql statement

				$searchdb = "SELECT * FROM movies WHERE lower(title) like lower('%$search%') 
				or lower(director) like lower('%$search%') 
				or lower(pubyear) like lower('%$search%')
				or lower(genre) like lower('%$search%')
				";
				
				    $s = $this->pdo->prepare($searchdb);
					$s->execute();
					
					$data = $s->fetchAll(PDO::FETCH_ASSOC);

/*					
					foreach($data as $row){
					echo $row['title'];
					echo $row['director'];
					echo $row['pubyear'];
					}
					*/

				return $data;
		}
		
		
		public function edituser($firstname, $email,$password, $userid)
		{			
				// Connect to the database
        $this->DBConnect();
        // If not connected get any error messages obtained
			if (!$this->isConnected)
			{
				$this->errorMessage = $pdoMessage;
				return false;
			}


		//prepared sql statement
		
			$sql = "UPDATE `tbluser` SET `firstname` = '$firstname', `email` = '$email', `password` = '$password' WHERE `tbluser`.`id` = '$userid'";
			echo $sql;
			$s = $this->pdo->prepare($sql);
			$s->execute();
				
			return true;

				

		}
		
		public function deleteprofile($userid)
		{
			
		// Connect to the database
        $this->DBConnect();
        // If not connected get any error messages obtained
			if (!$this->isConnected)
			{
				$this->errorMessage = $pdoMessage;
				return false;
			}
			$sql = "DELETE FROM tbluser WHERE id = '$userid'";
			echo $userid;
			$s = $this->pdo->prepare($sql);
			$s->execute();

		}
			


		

}



