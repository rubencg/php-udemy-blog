<?php include 'includes/db.php';

?>

    <!-- Header -->
<?php include 'includes/header.php'; ?>

    <!-- Navigation -->
<?php include 'includes/nav.php'; ?>

    <!-- jQuery -->
    <div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

            <h1 class="page-header">
                Page Heading
                <small>Secondary Text</small>
            </h1>

            <?php

            $query = '';
            if (!empty($_POST)) {
                if (isset($_POST['search'])) {
                    $searchBy = strtolower($_POST['search']);
                    $query = "title like lower('%{$searchBy}%') OR tags like lower('%{$searchBy}%')";
                }
            }

            $posts = R::find('posts', $query);

            if (empty($posts)) {
                echo "<h3>No results</h3>";
            } else {
                foreach ($posts as $post) {
                    $date = date("F d Y", strtotime($post['date']));
                    ?>
                    <h2>
                        <a href="#"><?php echo $post['title'] ?></a>
                    </h2>

                    <p class="lead">
                        by <a href="index.php"><?php echo $post['author'] ?></a>
                    </p>

                    <p>
                        <span class="glyphicon glyphicon-time"></span> Posted on <?php echo $date ?>
                    </p>
                    <hr>
                    <img src="<?php echo $post['image']; ?>" class="img-responsive" alt=""/>
                    <hr>

                    <p>
                        <?php echo $post['content']; ?>
                    </p>

                    <a href="#" class="btn btn-primary"> Read More <span
                                class="glyphicon glyphicon-chevron-right"></span></a>
                    <?php
                }
            }
            ?>
        </div>

        <!-- Blog Sidebar Widgets Column -->
        <?php include "includes/sidebar.php"; ?>

    </div>
    <!-- /.row -->

    <hr>

    <!-- Footer -->
<?php include 'includes/footer.php'; ?>