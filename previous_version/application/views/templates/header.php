<html>
    <head>
        <title>To Do List</title>
        <link rel="stylesheet" href="https://bootswatch.com/4/flatly/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url();?>/assets/css/style.css">
    </head>
    <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <?php if($this->session->userdata('logged_in')){?>
        <a class="navbar-brand" href="<?php echo base_url('Posts');?>">To DO! List</a>
        <?php } else { ?>
        <a class="navbar-brand" href="<?php echo base_url('users/login');?>">To DO! List</a>
        <?php } ?>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <?php if($this->session->userdata('logged_in')){?>
        <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url();?>posts">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url();?>posts/create">Create Task</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url();?>about">About</a>
                </li>
            </ul>
            <ul class="navbar-nav navbar-rigth">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url();?>users/logout">Logout</a>
                </li>
            </ul>
                <?php } else { ?>
            <ul class="navbar-nav mv-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url();?>users/login">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('Users/register');?>">Register</a>
                </li>
                <?php } ?>
            </ul>
        </div>
    </nav>
    <div class="container-fluid">
    <!-- Flash messages -->
        <?php if($this->session->flashdata('user_registered')){?>
            <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_registered').'</p>'; ?>
        <?php } ?>

        <?php if($this->session->flashdata('post_created')){?>
            <?php echo '<p class="alert alert-success">'.$this->session->flashdata('post_created').'</p>'; ?>
        <?php } ?>

        <?php if($this->session->flashdata('post_deleted')){?>
            <?php echo '<p class="alert alert-success">'.$this->session->flashdata('post_deleted').'</p>'; ?>
        <?php } ?>

        <?php if($this->session->flashdata('login_failed')){?>
            <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('login_failed').'</p>'; ?>
        <?php } ?>

        <?php if($this->session->flashdata('user_logged_in')){?>
            <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_logged_in').'</p>'; ?>
        <?php } ?>

        <?php if($this->session->flashdata('user_logged_out')){?>
            <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_logged_out').'</p>'; ?>
        <?php } ?>