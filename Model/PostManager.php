<?php

require_once 'Post.php';

class PostManager extends Manager
{
    public function findAll(): array
    {
        //Je récupère tous mes posts (array)
        $sql = 'SELECT * FROM post';
        $query = $this->bdd->prepare($sql);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_ASSOC);

        //Je les convertis en objet
        $posts = [];
        foreach ($results as $result) {
            $post = new Post();
            $post->setId($result['id']);
            $post->setCreated_by($result['created_by']);
            $post->setContent($result['content']);
            $post->setCreated_at($result['created_at']);
            $posts[] = $post;
        }

        //Je retourne mon tableau d'objets Post
        return $posts;
    }

    /**
     * Récupère un objet Post à partir de son ID
     */
    public function find(int $id): Post
    {
        //SELECT... WHERE ...
        $sql = 'SELECT * FROM post WHERE id = :id';
        $query = $this->bdd->prepare($sql);
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->execute();

        //Je récupère la ligne issue de ma base de données (array)
        $result = $query->fetch(PDO::FETCH_ASSOC);

        //Je la converti en objet User
        $post = new Post();
        $post->setId($result['id']);
        $post->setCreated_by($result['created_by']);
        $post->setContent($result['content']);
        $post->setCreated_at($result['created_at']);

        //Je retourne mon objet post issu de ma base de données
        return $post;
    }

    public function create(Post $post): void
    {
        $sql = 'INSERT INTO post (created_by, content, created_at) VALUES (:created_by, :content, :created_at);';
        $query = $this->bdd->prepare($sql);
        $query->bindValue(':created_by', $post->getCreated_by());
        $query->bindValue(':content', $post->getContent());
        $query->bindValue(':created_at', new DateTime("now"));
        $query->execute();
    }

    public function update(Post $post): void
    {
        
    }

    public function delete(Post $post): void
    {
        
    }
}
