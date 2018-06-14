<?php
/**
 * Tags repository.
 */
namespace Repository;

use Doctrine\DBAL\Connection;

/**
 * Class TagsRepository.
 */
class TagsRepository
{
    /**
     * Doctrine DBAL connection.
     *
     * @var \Doctrine\DBAL\Connection $db
     */
    protected $db;

    /**
     * TagsRepository constructor.
     *
     * @param \Doctrine\DBAL\Connection $db
     */
    public function __construct(Connection $db)
    {
        $this->db = $db;
    }

    /**
     * Fetch all records.
     *
     * @return array Result
     */
    public function findAll()
    {
        $query = 'SELECT `id`, `name` FROM `si_tags`';
        return $this->db->fetchAll($query);
    }

    /**
     * Find one record.
     *
     * @param string $id Element id
     *
     * @return array|mixed Result
     */
    public function findOneById($id)
    {
        $query = 'SELECT `id`, `name` FROM `tags` WHERE id= :id';
        $statement = $this->db->prepare($query);
        $statement->bindValue('id', $id, \PDO::PARAM_INT);
        $statement->execute();
        $result = $statement->fetchAll(\PDO::FETCH_ASSOC);

        return !$result ? [] : current($result);
    }
}