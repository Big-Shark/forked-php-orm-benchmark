<?php

use Atlas\Orm\AtlasContainer;
use Aura\Sql\ExtendedPdo;

require_once dirname(__FILE__) . '/../AbstractTestSuite.php';

/**
 * This test suite just demonstrates the baseline performance without any kind of ORM
 * or even any other kind of slightest abstraction.
 */
class AtlasOrmTestSuite extends AbstractTestSuite
{
    /**
     * @var AtlasContainer
     */
    private $atlasContainer;

    /**
     * @var \Atlas\Orm\Atlas
     */
    private $atlas;

    function initialize()
    {
        $loader = require_once "vendor/autoload.php";
        $loader->add('', __DIR__ . '/DataSource');

        $this->con            = new PDO('sqlite::memory:');
        $this->atlasContainer = new AtlasContainer(new ExtendedPdo($this->con));
        $this->atlasContainer->setMappers([
            AuthorMapper::CLASS,
            BookMapper::CLASS
        ]);
        $this->atlas = $this->atlasContainer->getAtlas();
        $this->initTables();
    }

    function clearCache()
    {
    }

    function beginTransaction()
    {
        $this->transaction = $this->atlas->newTransaction();
    }

    function commit()
    {
        $this->transaction->exec();
    }

    function runAuthorInsertion($i)
    {
        $author = $this->atlas->newRecord(AuthorMapper::class, [
            'first_name' => 'John' . $i,
            'last_name'  => 'Doe' . $i,
        ]);
        $this->transaction->insert($author);
        $this->authors[] = $this->con->lastInsertId();
    }

    function runBookInsertion($i)
    {
        $book = $this->atlas->newRecord(BookMapper::class, [
            'title'     => 'Hello' . $i,
            'isbn'      => '1234' . $i,
            'price'     => $i,
            'author_id' => $this->authors[array_rand($this->authors)],
        ]);
        $this->transaction->insert($book);
        $this->books[] = $this->con->lastInsertId();

    }

    function runPKSearch($i)
    {
        $author = $this->atlas->fetchRecord(AuthorMapper::class, $i);
    }

    function runHydrate($i)
    {
        $stmt = $this->atlas
            ->select(BookMapper::class)
            ->where('price > ?', $i)
            ->limit(5);

        foreach ($stmt->fetchRecordSet() as $book) {
        }
    }

    function runComplexQuery($i)
    {
        $stmt = $this->atlas
            ->select(AuthorMapper::class)
            ->where('id > ? OR (first_name || last_name) = ? ', $this->authors[array_rand($this->authors)], 'John Doe')
            ->fetchCount();

    }

    function runJoinSearch($i)
    {
        $book = $this->atlas
            ->select(BookMapper::class)
            ->where('title=?', 'Hello' . $i)
            ->with([ 'author' ])
            ->fetchRecord();

        return $book;
        //$author = $book->author()->select('id', 'first_name', 'last_name', 'email')->fetch();
    }
}