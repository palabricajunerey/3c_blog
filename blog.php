<?php
$blog = true;
include 'header.php';
include 'conn.php';

//if create post is click
if (isset($_POST['create_post'])) {
    //store the inputs to variables
    $title = $_POST['post_title'];
    $content = $_POST['post_content'];

    //query to insert to our database
    $insert = $conn->prepare("INSERT INTO blogs (blog_title, blog_content) VALUES (?, ?)");
    $insert->execute([
        $title,
        $content
    ]);
    $msg = "Post created!";
    // echo '
    // <script>
    //     alert("Post Created!");
    // </script>
    // ';

}
//update data
if(isset($_POST['update_post'])){
    $id = $_POST['p_id'];
    $title = $_POST['post_title'];
    $content = $_POST['post_content'];

    //query for update
    $update = $conn->prepare("UPDATE blogs set blog_title = ?, blog_content = ? WHERE blog_id = ?");
    //bind data
    $update->execute([
        $title,
        $content,
        $id
    ]);
    $msg = "Post Updated";
}

//to delete data
if (isset($_GET['delete'])) {
    $id = $_GET['p_id'];

    //query for delete
    $delete = $conn->prepare("DELETE FROM blogs WHERE blog_id = :id");
    //binding
    $delete->execute([':id' => $id]);

    $warning_msg = "Post Deleted!";
}
?>
<!-- content start -->
<div class="container">
    <div class="row">
        <div class="col-4 shadow mt-4">
            <?php
            if (isset($_GET['update'])) { ?>
                <form method="POST" action="blog.php">
                    <?php
                    $id = $_GET['p_id'];
                    //fetch data for update
                    $get_update = $conn->prepare("SELECT * FROM blogs WHERE blog_id = ?");
                    //bind id
                    $get_update->execute([$id]);
                    foreach ($get_update as $value) { ?>
                        <input type="hidden" name="p_id" value="<?= $value['blog_id'] ?>">
                        <div class="mb-3">
                            <label for="title" class="form-label">Edit Post Title</label>
                            <input type="text" name="post_title" value="<?= $value['blog_title'] ?>" class="form-control" id="title" placeholder="Required Post Title">
                        </div>
                        <div class="mb-3">
                            <label for="content_area" class="form-label">Edit Content</label>
                            <textarea name="post_content" class="form-control" id="content_area" placeholder="Required Content"><?= $value['blog_content'] ?></textarea>
                        </div>
                        <div class="mb-3">
                            <a href="blog.php"><button class="btn btn-secondary">Cancel</button></a>
                            <button class="btn btn-primary" name="update_post">Update Post</button>
                        </div>
                    <?php  } ?>
                </form>
            <?php } else { ?>
                <form method="POST" action="blog.php">
                    <div class="mb-3 mt-3">
                        <?php
                        if (isset($msg)) {
                            echo '
                        <div class="alert alert-primary alert-dismissible fade show" role="alert">
                        <strong>' . $msg . '</strong><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        ';
                        } elseif (isset($warning_msg)) {
                            echo '
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>' . $warning_msg . '</strong><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        ';
                        }
                        ?>
                    </div>
                    <div class="mb-3">
                        <label for="title" class="form-label">Post Title</label>
                        <input type="text" name="post_title" class="form-control" id="title" placeholder="Required Post Title" required>
                    </div>
                    <div class="mb-3">
                        <label for="content_area" class="form-label">Your Content</label>
                        <textarea name="post_content" class="form-control" id="content_area" placeholder="Required Content" required></textarea>
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary" name="create_post">Create Post</button>
                    </div>
                </form>
            <?php  } ?>
        </div>
        <div class="col m-4">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Content</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <?php

                $count = 1;
                $get_data = $conn->query("SELECT * FROM blogs");
                foreach ($get_data as $data) { ?>

                    <tbody>
                        <tr>
                            <th><?= $count++ ?></th>
                            <td><?php echo $data['blog_title'] ?></td>
                            <td><?php echo $data['blog_content'] ?></td>
                            <td>
                                <a href="blog.php?update&p_id=<?= $data['blog_id'] ?>" class="text-decoration-none">✏</a> |
                                <a href="blog.php?delete&p_id=<?= $data['blog_id'] ?>" class="text-decoration-none">❌</a>
                            </td>
                        </tr>
                    </tbody>
                <?php } ?>
            </table>
        </div>
    </div>
</div>
<script>
    document.title = "Blog";
</script>
<!-- content end -->
</body>

</html>