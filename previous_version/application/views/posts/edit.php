<h2><?= $title ?></h2>
<?php echo validation_errors(); ?>
<?php echo form_open('posts/update'); ?>
<input type="hidden" name="id" value="<?php echo $post['id']; ?>">
<div class="form-group">
    <label for="title">Title</label>
    <input type="text" name="title" class="form-control" value="<?php echo $post['title'] ?>">
</div>
<div class="form-group">
    <label for="date">Until</label>
    <input type="date" name="date" class="form-control" value="<?php echo $post['date'] ?>">
</div>
<div class="form-group">
    <label for="description">Description</label>
    <textarea name="description" class="form-control" rows="5"><?php echo $post['description'] ?></textarea>
</div>
<label for="">Type: </label>
<select class="form-control" name="priority">
    <option>Urgent</option>
    <option>Regular</option>
    <option>Not important</option>
</select>
<br>
<button type="submit" class="btn btn-primary">Edit</button>
</form>