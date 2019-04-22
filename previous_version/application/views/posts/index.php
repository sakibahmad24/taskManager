<div class="row">
    <?php foreach($posts as $post) : ?>
    <div class="col-md-4 offset-md-4">
        <h3 class="post-date text-center"><?php echo $post['title'] ?></h3>
        <p class="text-center">Due to: <?php echo $post['date'] ?></p>
        <p class="text-center font-weight-bold priority">
            <?php echo $post['priority'] ?>
        </p>
        <p><a class="btn btn-secondary btn-block" href="<?php echo site_url('/posts/'.$post['slug']); ?>">More</a></p>
    </div>
    <?php endforeach; ?>
</div>