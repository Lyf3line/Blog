<!DOCTYPE html>
<html>
	<head>
	<title>ciBlog</title>
	<link rel="stylesheet" type="text/css" href="https://bootswatch.com/4/flatly/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/css/style.css">
	</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="<?php echo base_url(); ?>">ciblog</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor02">

    <ul class="navbar-nav mr-auto">

      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url(); ?>">Home</a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url(); ?>about">About</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url(); ?>posts">Blog</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url(); ?>categories">Categories</a>
      </li>

    </ul>

    <div class="form-inline my-2 my-lg-0">

      <?php if(!$this->session->userdata('logged_in')) :?>
      <a href="<?php echo base_url(); ?>users/login"><button class="btn btn-secondary my-2 my-sm-0" type="submit">Login</button></a>

      <a href="<?php echo base_url(); ?>users/register"><button class="btn btn-secondary my-2 my-sm-0" type="submit">Register</button></a>
      <?php endif; ?>

      <?php if($this->session->userdata('logged_in')) :?>
      <a href="<?php echo base_url(); ?>posts/create"><button class="btn btn-secondary my-2 my-sm-0" type="submit">Create post</button></a>

      <a href="<?php echo base_url(); ?>categories/create"><button class="btn btn-secondary my-2 my-sm-0" type="submit">Create Category</button></a>

      <a href="<?php echo base_url(); ?>users/logout"><button class="btn btn-secondary my-2 my-sm-0" type="submit">Logout</button></a>
      <strong> <?= $this->session->userdata('username'); ?></strong>
      <?php endif; ?>
    </div>

  </div>
</nav>

<div class="container">
  <!-- Flash messages -->
  <?php if($this->session->flashdata('SuccessMsg')) : ?>
    <?php echo '<br><p class="alert alert-success">'.$this->session->flashdata('SuccessMsg').'</p>'; ?>
  <?php endif ; ?>