<?php echo form_open('users/login'); ?>
<div class="row">
    <div class="col-md-4 offset-md-4">
        <h1 class="text-center"><?php echo $title; ?></h1>
        <div class="form-group">
            <input type="text" name="username" class="form-control" placeholder="Username" required autofocus><br>
            <input type="password" name="password" class="form-control" placeholder="Password" required autofocus>
        </div>
        <button type="submit" class="btn btn-primary">Enter</button>
    </div>
</div>
<?php echo form_close(); ?>
