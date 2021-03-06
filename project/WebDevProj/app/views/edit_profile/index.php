<div class="jumbotron">
    <h1><?php echo $data['name']?>'s Profile</h1>
    <p>Here you can edit your profile.</p>
</div>


<h3>Edit Profile</h3>
<div class="container-fluid">
    <form method="POST">
        <div class="row login-container">
            <!-- Show any error messages relevant to the overall page -->
            <?php if (isset($data['messages']['main'])) { echo '<div class="col-sm-6 alert alert-danger form-control-alert ">' . $data['messages']['main'] . '</div>'; } ?>
           
			<div class="form-group login-control">
			<p> Choose a profile picture</p>
			   <input  type="file" name="fileToUpload" id="fileToUpload">
			</div>


			<div class="form-group login-control">
                <label for="firstname">Name</label>
                <input type="text" name="firstname" class="form-control" placeholder="Name" value="<?php if (isset($_POST['firstname'])) { echo $_POST['firstname']; } ?>">
                <!-- Show any error messages triggered for the email field -->
                <?php if (isset($data['messages']['firstname'])) { echo '<div class="alert alert-danger form-control-alert">' . $data['messages']['firstname'] . '</div>'; } ?>
            </div>
			
		   <div class="form-group login-control">
                <label for="email">Email address</label>
                <input type="email" name="email" class="form-control" placeholder="Your email" value="<?php if (isset($_POST['email'])) { echo $_POST['email']; } ?>">
                <!-- Show any error messages triggered for the email field -->
                <?php if (isset($data['messages']['email'])) { echo '<div class="alert alert-danger form-control-alert">' . $data['messages']['email'] . '</div>'; } ?>
            </div>

            <div class="form-group login-control">
                <label for="email">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Your password">
                <!-- Show any error messages triggered for the password field -->
                <?php if (isset($data['messages']['password'])) { echo '<div class="alert alert-danger form-control-alert">' . $data['messages']['password'] . '</div>'; } ?>
            </div>
		
            <!-- pull-right -->
            <div class="login">
                <input type="submit" name="action" class="btn btn-default" value="Make changes">
				<input type="submit" name="delete" class="btn btn-default" value="Delete profile">

            </div>
        </div>
    </form>
	

</div>

		
			
			
			
			
			
			
