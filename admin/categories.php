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
                        Categories
                    </h1>

                    <div class="col-xs-6">
                        <form action="" method="post">
                            <?php
                            // Add category
                            if (isset($_POST['title']) && !empty($_POST['title'])) {
                                $category = R::dispense('categories');
                                $category->title = $_POST['title'];
                                R::store($category);
                            }
                            // Delete category
                            if (isset($_GET['delete'])) {
                                $category = R::load( 'categories', $_GET['delete'] );
                                R::trash( $category );
                                header("Location: categories.php");
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
                                <th></th>
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
                                    <td><a href="categories.php?delete=<?php echo $category['id'] ?>">Delete</a></td>
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
