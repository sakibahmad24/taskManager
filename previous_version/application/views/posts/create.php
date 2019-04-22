<h2><?= $title ?></h2>
<?php echo validation_errors(); ?>
<?php echo form_open('posts/create'); ?>
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" class="form-control" placeholder="Enter title">
    </div>
    <div class="form-group">
        <label for="date">Until</label>
        <input type="date" name="date" class="form-control" placeholder="Date">
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea type="textarea" name="description" class="form-control" rows="5">

        </textarea>
    </div>
<label for="">Type: </label>
    <select class="form-control" name="priority">
        <option>Urgent</option>
        <option>Regular</option>
        <option>Not important</option>
    </select>
    <br>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>