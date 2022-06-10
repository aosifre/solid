<?php
/**
 * Liskov’s Substitution Principle (LSP) in PHP
 */

abstract class CMS
{
    abstract public function findArticles(int $limit = 10): array;

    /**
     * @throws PDOException
     */
    public function getConnection(): PDO
    {
        $pdo = new PDO('');
        
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        
        return $pdo;
    }
}

class WordPress extends CMS
{
    public function findArticles(int $limit = 10): array
    {
        $pdo = $this->getConnection();

        $statement = $pdo->prepare
        (
            'SELECT
              post_title AS title
              post_content AS content
              post_date AS createdAt
            FROM `post`
            WHERE `post_type` = "post"
                AND `post_status` = "publish"
            ORDER BY `post_date` DESC
            LIMIT :limit'
        );
        $statement->bindValue(':limit', $limit, PDO::PARAM_INT);

        return $statement->fetchAll();
    }
}

class Joomla extends CMS
{
    public function findArticles(int $limit = 10): array
    {
        $pdo = $this->getConnection();

        $statement = $pdo->prepare
        (
            'SELECT
              `title` AS title,
              `fulltext` AS content,
              `publish_up` AS createdAt
            FROM content
            WHERE `state` = 1
            ORDER BY `publish_up` DESC
            DESC LIMIT :limit'
        );
        $statement->bindValue(':limit', $limit, PDO::PARAM_INT);

        return $statement->fetchAll();
    }
}