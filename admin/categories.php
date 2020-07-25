<?php include "includes/header.php" ?>

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
                        Welcome to admin
                        <small>Author</small>
                    </h1>

                    <div class="col-xs-6">
                        <form action="" method="post">
                            <?php
                                if(isset($_POST['title']) && !empty($_POST['title'])){
                                    $category = R::dispense('categories');
                                    $category->title = $_POST['title'];
                                    R::store( $category );
                                }
                            ?>
                            <div class="form-group">
                                <label for="title">Add Category</label>
                                <input class="form-control" type="text" name="title">
                            </div>
                            <button type="submit" class="btn btn-primary">Add category</button>
                        </form>
                    </div>
                    <div class="col-xs-6">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Category Title</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $categories = R::find('categories', '');

                                    foreach ($categories as $category) {
                                        ?>
                                <tr>
                                    <td><?php echo $category['id'] ?></td>
                                    <td><?php echo $category['title'] ?></td>
                                </tr>
                                        <?php
                                    }
                                ?>

                            </tbody>
                        </table>
                    </div>

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
