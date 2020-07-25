

<div class="well">
    <h4>Blog Categories</h4>
    <div class="row">
        <div class="col-lg-12">
            <ul class="list-unstyled">
                <?php

                foreach ($categories as $category) {

                    echo "<li><a href=\"#\">{$category['title']}</a></li>";

                }

                ?>

            </ul>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
</div>