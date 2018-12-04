<div class="jumbotron">
    <h1>Home</h1>
</div>

<div class="container-fluid">
    <!-- Shows any system messages if they have been provided -->
    <?php if (isset($data['messages']['system'])) { echo $data['messages']['system']; } ?>  
    <h2>Please sign in or register an account to veiw the database</h2>
    <p></p>
</div>

<div class="container-fluid text-center bg-grey">
  <h2>Sample Movies</h2>
  <div class="row text-center">
    <div class="col-sm-4">
      <div class="thumbnail">
        <img src="https://upload.wikimedia.org/wikipedia/en/thumb/5/52/Good_Will_Hunting.png/220px-Good_Will_Hunting.png" alt="Good Will Hunting">
        <p><strong>Good Will Hunting</strong></p>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="thumbnail">
        <img src="https://m.media-amazon.com/images/M/MV5BYmViZGM0MGItZTdiYi00ZDU4LWIxNDYtNTc1NWQ5Njc2N2YwXkEyXkFqcGdeQXVyNDk3NzU2MTQ@._V1_.jpg" alt="Limitless">
        <p><strong>Limitless</strong></p>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="thumbnail">
        <img src="https://resizing.flixster.com/3XavBJPw-czNSDFhGhq5ORi3cGk=/206x305/v1.bTsxMTI0NDg4ODtqOzE3OTUwOzEyMDA7MTk5ODsyNjY0" alt="The Social Network">
        <p><strong>The Social Network</strong></p>
      </div>
    </div>
</div>
