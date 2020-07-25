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
                        Categories
                    </h1>

                    <div class="col-xs-6">
                        <?php
                        deleteCategories();
                        ?>
                        <div class="row">
                            <form action="" method="post">
                                <?php
                                insertCategories();
                                ?>
                                <div class="form-group">
                                    <label for="title">Add Category</label>
                                    <input class="form-control" type="text" name="title">
                                </div>
                                <button type="submit" class="btn btn-primary">Add category</button>
                            </form>
                        </div>
                        <br>
                        <?php
                        editCetegory();

                        if (isset($_GET['edit'])) {
                            $category = R::load('categories', $_GET['edit']);
                            ?>
                            <div class="row">
                                <form action="" method="post">
                                    <?php

                                    ?>
                                    <div class="form-group">
                                        <label for="title">Edit Category</label>
                                        <input autofocus="autofocus" class="form-control" type="text" name="edit_title"
                                               value="<?php echo $category->title; ?>">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Update category</button>
                                </form>
                            </div>
                            <?php

                        }
                        ?>

                    </div>
                    <div class="col-xs-6">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Category Title</th>
                                <th></th>
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
                                    <td><a href="categories.php?edit=<?php echo $category['id'] ?>">Edit</a></td>
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
