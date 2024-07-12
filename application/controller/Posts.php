<?php

/**
 * Class Home
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class Posts extends Controller
{
    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/home/index (which is the default page btw)
     */
    public function index()
    {
        $posts_model = $this->loadModel('PostsModel');
        $posts = $posts_model->getAllPosts();

        // debug message to show where you are, just for the demo
        // echo 'Message from Controller: You are in the controller Posts, using the method index()';
        // load views. within the views we can echo out $songs and $amount_of_songs easily
        require 'application/views/_templates/header.php';
        require 'application/views/_templates/nav.php';
        require 'application/views/posts/index.php';
        require 'application/views/_templates/footer.php';
    }

    public function show($id)
    {
        $posts_model = $this->loadModel('PostsModel');
        $post = $posts_model->getPost($id);

        require 'application/views/_templates/header.php';
        require 'application/views/_templates/nav.php';
        require 'application/views/posts/show.php';
        require 'application/views/_templates/footer.php';
    }

    public function create()
    {

        if (!isset($_POST['create_post'])) {
            require 'application/views/_templates/header.php';
            require 'application/views/_templates/nav.php';
            require 'application/views/posts/create.php';
            require 'application/views/_templates/footer.php';
        } else {
            $posts_model = $this->loadModel('PostsModel');
            $posts_model->createPost($_POST['title'], $_POST['content'], $_POST['author_id']);
            var_dump($_POST);

            header('location: ' . URL . 'posts');
        }


    }

    public function edit($id)
    {
        $posts_model = $this->loadModel('PostsModel');
        $post = $posts_model->getPost($id);

        if (isset($_POST['edit_post']) && $_SERVER['REQUEST_METHOD'] == "POST") {
           $title = trim($_POST['title']);
           $content = trim($_POST['content']);

           $posts_model->editPost($id,$title,$content);

            header('location: ' . URL . "posts/");
        }else {
            require 'application/views/_templates/header.php';
            require 'application/views/_templates/nav.php';
            require 'application/views/posts/edit.php';
            require 'application/views/_templates/footer.php';
        }

    }

    public function destroy($id)
    {
        $posts_model = $this->loadModel('PostsModel');
        $posts_model->deletePost($id);

        header('location: ' . URL . 'posts');
    }

}