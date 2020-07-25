<?php include "includes/header.php" ?>
<?php include "functions.php" ?>

<div id="wrapper">

    <!-- Navigation -->
    <?php include "includes/navbar.php"; ?>

    <!-- Page -->
    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Posts
                    </h1>
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Author</th>
                            <th scope="col">Title</th>
                            <th scope="col">Category</th>
                            <th scope="col">Status</th>
                            <th scope="col">Image</th>
                            <th scope="col">Tags</th>
                            <th scope="col">Comments</th>
                            <th scope="col">Date</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $posts = R::find('posts', '');

                        foreach ($posts as $post) {
                            $category = R::load('categories', $post->category_id)
                            ?>

                            <tr>
                                <td><?php echo $post['id']; ?></td>
                                <td><?php echo $post['author']; ?></td>
                                <td><?php echo $post['title']; ?></td>
                                <td><?php echo $category['title']; ?></td>
                                <td><?php echo $post['status']; ?></td>
                                <td>
                                    <img src="<?php echo $post['image']; ?>" style="width: 60px; height: 30px;" alt="">
                                </td>
                                <td><?php echo $post['tags']; ?></td>
                                <td><?php echo empty($post['comments_count']) ? 0 : $post['comments_count']; ?></td>
                                <td><?php echo $post['date']; ?></td>
                            </tr>
                            <?php
                        }
                        ?>

                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->


<?php include "includes/footer.php"; ?>
