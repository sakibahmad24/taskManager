<h2><?php echo $post['title']; ?></h2>
    <small class="post-date">Date: <?php echo $post['date'] ?></small>
    <div class="post-body">
        <?php echo $post['description']; ?>
    </div>
    <hr>
    <?php echo form_open('/posts/edit/'.$post['slug']);?>
    <input type="submit" value="Edit" class="btn btn-default">

    <?php echo form_open('/posts/delete/'.$post['slug']);?>
    <input type="submit" value="Delete" class="btn btn-danger">
</form>
