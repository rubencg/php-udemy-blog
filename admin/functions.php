<?php

function deleteCategories(){
    // Delete category
    if (isset($_GET['delete'])) {
        $category = R::load('categories', $_GET['delete']);
        R::trash($category);
        header("Location: categories.php");
    }
}

function insertCategories(){
    // Add category
    if (isset($_POST['title']) && !empty($_POST['title'])) {
        $category = R::dispense('categories');
        $category->title = $_POST['title'];
        R::store($category);
    }
}

function editCetegory(){
    // Edit
    if (isset($_POST['edit_title']) && isset($_GET['edit'])) {
        $category = R::load('categories', $_GET['edit']);
        $category->title = $_POST['edit_title'];
        R::store($category);
        header("Location: categories.php");
    }
}

?>