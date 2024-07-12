<?php

class PostsModel
{
    function __construct($db)
    {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }

    public function getAllPosts()
    {
        $sql = "SELECT posts.*, users.username AS author_name FROM posts INNER JOIN users ON posts.author_id = users.id ORDER BY posts.created_at DESC;";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public function getPost($id)
    {
        $sql = "SELECT * FROM posts WHERE id = :id";
        $query = $this->db->prepare($sql);
        $query->execute(['id' => $id]);
        return $query->fetch();
    }

    public function editPost($id, $title, $content)
    {
        $sql = "UPDATE `simple_blog`.`posts` SET `title`= :title, `content`= :content WHERE  `id`= :id;";
        $query = $this->db->prepare($sql);
        $query->execute(['title' => $title, 'content' => $content, 'id' => $id]);
    }

    public function createPost($title, $content, $author_id)
    {
        $title = strip_tags($title);
        $content = strip_tags($content);
        $author_id = strip_tags($author_id);

        $sql = "INSERT INTO posts (title, content, author_id, created_at) values (:title, :content, :author_id, :created_at)";
        $query = $this->db->prepare($sql);
        $query->execute(array('title' => $title, 'content' => $content, 'author_id' => $author_id, "created_at" => date("Y-m-d H:i:s")));
    }

    public function deletePost($id)
    {
        $sql = "DELETE FROM posts WHERE id = :id";
        $query = $this->db->prepare($sql);
        $query->execute(["id" => $id]);
    }
}