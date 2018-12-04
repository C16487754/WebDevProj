<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo $data['title'] . ' | Movie database'; ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Load Bootstrap styles -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 
    <!-- <link rel="stylesheet" href="<?php // echo $data['root'] . 'public/bootstrap/css/bootstrap.min.css'?>">  -->

    <!-- Apply custom styling. MUST APPEAR AFTER the Bootstrap css is loaded -->
    <link rel="stylesheet" href="<?php echo $data['root'] . 'public/css/layout.css'?>">
    <!-- <link rel="icon" href="demo_icon.gif" type="image/gif" sizes="16x16">  -->
</head>

<body id="myPage">
    <!-- Navigation Panel -->

	
	
	
	
	<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 		
      </button>
      <a class="navbar-brand" href="<?php if (!$data['isLoggedIn']) { echo $data['root'] . 'public/home/'; } else { echo $data['root'] . 'public/userhome/'; } ?>">Database Website</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a id = "reg" href="<?php if (!$data['isLoggedIn']) { echo $data['root'] . 'public/register/'; } else { echo $data['root'] . 'public/profile/'; } ?>"><?php if (!$data['isLoggedIn']) { echo 'REGISTER'; } else { echo 'My Profile'; } ?></a></li>
		<li><a href="<?php if (!$data['isLoggedIn']) { echo $data['root'] . 'public/signin/'; } else { echo $data['root'] . 'public/signout/'; } ?>"><?php if (!$data['isLoggedIn']) { echo 'SIGN IN'; } else { echo 'SIGN OUT'; } ?><span class="glyphicon glyphicon-log-in"></span></a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
      </ul>
    </div>
  </div>
</nav>

<div class="jumbotron">
  <div class="container text-center">
    <h2>Movie Database</h2>      
    <p>An extensive database of movies.</p>
  </div>
</div>