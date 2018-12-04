<div class="jumbotron">
  <div class="container text-center">

    <h1><?php echo $data['name']?>'s Home Page</h1>
	</div>
</div>

<div class="container-fluid">
    <!-- Shows any relevant messages, e.g., if the user has successfully logged in -->
    <?php if (isset($data['messages']['system'])) { echo $data['messages']['system']; } ?>  
	<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

</style>
    <h2>Hello <?php echo $data['name']?></h2>
    <p>Welcome to your home page.</p>

	<h2> From this page you can search the database for movies!</h2>
		<div class="container-fluid">
    <form method="POST">
        <div class="row login-container">
            <!-- Show any error messages relevant to the overall page -->
            <?php if (isset($data['messages']['main'])) { echo '<div class="col-sm-6 alert alert-danger form-control-alert ">' . $data['messages']['main'] . '</div>'; } ?>
           
			<div class="form-group login-control">
                <label>Search</label>
                <input type="text" name="search" class="form-control" placeholder="Search by name, year released, genre, director" value="<?php if (isset($_POST['seacrh']))?>">
            </div>
			        <div>
                <input type="submit" name="action" class="btn btn-default" value="search">
            </div>
			
			

        </div>
		
		

    </form>
	
	
	<p>Results:</p>
	
	<?php
			
			echo"
			<table>
  <tr>
    <th>Title</th>
    <th>Direcor</th>
    <th>Release Date</th>
	<th>Genre</th>
  </tr>";

   
  foreach($results as $row)
			{
				echo"
				  <tr>
					<td>" . $row['title'] . "</td>
					<td>" . $row['director'] . "</td>
					<td>" . $row['pubyear'] . "</td>
					<td>" . $row['genre'] . "</td>

				  </tr>
			";
			}
 echo"
</table>
";

?>
	
	
</div>




</div><br><br>


<div class="container-fluid ">

</div>

