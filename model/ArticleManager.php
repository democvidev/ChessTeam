<?php

require_once 'DataBase.php';

class ArticleManager extends DataBase
{
    public function getDataBase()
    {
        return $this->dataBase;
    }

    public function setDataBase($dataBase)
    {
        $this->dataBase = $dataBase;
    }

    public function insertArticle(Article $article)
    {
        $request = 'INSERT INTO articles(art_title, art_description, art_content, art_image, art_author, category_id) VALUES(:art_title, :art_description, :art_content, :art_image, :art_author, :category_id)';
        $insert = $this->dbConnect()->prepare($request);
        $insert = $insert->execute([
            'art_title' => $article->getArt_title(),
            'art_description' => $article->getArt_description(),
            'art_content' => $article->getArt_content(),
            'art_image' => $article->getArt_image(),
            'art_author' => $article->getArt_author(),
            'category_id' => $article->getCategory_id()
        ]);


    }

    public function updateArticle($id, Article $article)
    {
        $request = 'UPDATE articles SET art_title = :art_title, art_description = :art_description, art_content = :art_content, art_image = :art_image, art_author = :art_author, category_id = :category_id WHERE id =:id';
        $update = $this->dbConnect()->prepare($request);
        $update = $update->execute([
            'id' => $id,
            'art_title' => $article->getArt_title(),
            'art_description' => $article->getArt_description(),
            'art_content' => $article->getArt_content(),
            'art_image' => $article->getArt_image(),
            'art_author' => $article->getArt_author(),
            'category_id' => $article->getCategory_id()
        ]);
    }

    public function Affichage()
    {
        $query = 'SELECT * FROM articles ORDER BY id DESC';
        $select = $this->dbConnect()->prepare($query);
        $select->execute();

        $art = [];

        while ($donnees = $select->fetch()) {
            $art[] = new Article($donnees);
        }
        return $art;
    }


        public function Affichage_recentes()
    {
        $query = 'SELECT * FROM articles WHERE id > 40 ORDER BY id DESC LIMIT 5 ';
        $select = $this->dbConnect()->prepare($query);
        $select->execute();

        $art = [];

        while ($donnees = $select->fetch()) {
            $art[] = new Article($donnees);
        }
        return $art;
    }

    public function Affichage_last_one()
    {
        $query = 'SELECT * FROM articles WHERE id = 40';
        $select = $this->dbConnect()->prepare($query);
        $select->execute();
        $art[] = new Article($select->fetch());
        return $art;
    }


    public function AffichageParCategorie($category_id)
    {
        $query = 'SELECT * FROM articles WHERE category_id = :category_id';
        $select = $this->dbConnect()->prepare($query);
        $select->execute(["category_id" => $category_id]);

        $art = [];

        while ($data = $select->fetch()) {
            $art[] = new Article($data);
        }

        return $art;
    }

    public function Affichage_one($art_id)
    {
        $query = 'SELECT * FROM articles WHERE id = :art_id';
        $select = $this->dbConnect()->prepare($query);
        $select->execute(["art_id" => $art_id]);

        $art[] = new Article($select->fetch());
        return $art;
    }

    public function AffichageMyArticles($id_user)
    {
        $query = 'SELECT * FROM articles WHERE art_author = :id_user';
        $select = $this->dbConnect()->prepare($query);
        $select->execute(["id_user" => $id_user]);

        $art = [];

        while ($data = $select->fetch()) {
            $art[] = new Article($data);
        }
        return $art;
    }

    public function deleteArticle($id_article)
    {
        $query = 'DELETE FROM articles WHERE id = :id_article';
        $delete = $this->dbConnect()->prepare($query);
        $delete->execute(["id_article" => $id_article]);
        return;
    }

}