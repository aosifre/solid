<?php
/**
 * Liskov’s Substitution Principle (LSP) in PHP (not working) 
 */

abstract class CMS 
{
    abstract public function findArticles(int $limit);
}   
    
class WordPress extends CMS
{
    /**
     * @param int $limit
     * @return array
     * @throws \Exception|\Doctrine\DBAL\Driver\Exception
     */
    public function findArticles(int $limit)
    {
        // ❌ Throws a different exception, Joomla's class cannot do it.
        $connection = $this->getEntityManager()->getConnection();

        $statement = $connection->prepare
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
    public function findArticles(int $limit)
    {
      try {
          $pdo = new PDO('...');

          $statement = $pdo->prepare
          (
              'SELECT
                `title` AS title,
                `fulltext` AS content,
                `publish_up` AS createdAt
              FROM content
              WHERE `state` = 1
              ORDER BY `publish_up` DESC
              DESC LIMIT 10'
          );

          return $statement->fetchAll();
        } catch (\Exception $e) {
          // ❌ Return type is string, we are supposed to return array.
          return $e->getMessage();
        }
    }
}