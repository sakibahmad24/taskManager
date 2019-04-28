<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>myTodo Task Manager</title>
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/css/custom.css" rel="stylesheet" type="text/css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery/min.js"></script>
</head>
<body>
    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container-fluid">
                <a class="brand" href="<?php echo base_url(); ?>">myTodo</a>
                <div class="nav-collapse collapse">
                <p class="navbar-text pull-right">
                <!-- RIGHT TOP CONTENT -->
                <?php if ($this->session->userdata('logged_in')): ?>
                Welcome, <?php echo $this->session->userdata('username'); ?>
                <?php else: ?>
                <a href="<?php echo base_url(); ?>users/register">Register</a>
                <?php endif; ?>
                
               
                </p>
                <ul class="nav">
                
                    <li><a href="<?php echo base_url(); ?>">Home</a></li>
                    <?php if ($this->session->userdata('logged_in')): ?>
                    <li><a href="<?php echo base_url(); ?>lists">Lists</a></li>
                    <?php endif; ?>
                </ul>
                </div> <!-- /.nav-collapse -->
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span3">
                <div class="well sidebar-nav">
                    <div style="margin:0 0 10px 10px;">
                    <!-- SIDEBAR CONTENT -->
                    <?php $this->load->view('users/login'); ?>
                    </div>
                </div> <!-- / .well -->
            </div> <!-- / span -->

            <div class="span9">
            <!-- MAIN CONTENT -->
                <?php $this->load->view($main_content); ?>
            </div> <!-- /span -->
        </div> <!-- /row -->

        <hr>

        <footer>
            <p>&copy; Copyright Sakib</p>
        </footer>
    </div> <!-- /.fluid-container -->
</body>
</html>