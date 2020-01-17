<?php
declare(strict_types = 1);
/**
 * /tests/Integration/Repository/RepositoryTestCase.php
 *
 * @author TLe, Tarmo Leppänen <tarmo.leppanen@protacon.com>
 */
namespace App\Tests\Integration\Repository;

use App\Repository\BaseRepository;
use App\Rest\RestResource;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use function array_keys;
use function gc_collect_cycles;
use function gc_enable;
use function sort;

/**
 * Class RepositoryTestCase
 *
 * @package App\Tests\Integration\Repository
 * @author  TLe, Tarmo Leppänen <tarmo.leppanen@protacon.com>
 */
class RepositoryTestCase extends KernelTestCase
{
    /**
     * @var RestResource
     */
    protected $resource;

    /**
     * @var BaseRepository
     */
    protected $repository;

    /**
     * @var string
     */
    protected $entityName;

    /**
     * @var string
     */
    protected $repositoryName;

    /**
     * @var string
     */
    protected $resourceName;

    /**
     * @var array
     */
    protected $associations = [];

    /**
     * @var array
     */
    protected $searchColumns = [];

    public function testThatGetEntityNameReturnsExpected(): void
    {
        static::assertSame($this->entityName, $this->repository->getEntityName());
    }

    public function testThatGetAssociationsReturnsExpected(): void
    {
        $expected = $this->associations;
        $actual = array_keys($this->repository->getAssociations());
        $message = 'Repository did not return expected associations for entity.';

        sort($expected);
        sort($actual);

        static::assertSame($expected, $actual, $message);
    }

    public function testThatGetSearchColumnsReturnsExpected(): void
    {
        $expected = $this->searchColumns;
        $actual = $this->repository->getSearchColumns();
        $message = 'Repository did not return expected search columns.';

        sort($expected);
        sort($actual);

        static::assertSame($expected, $actual, $message);
    }

    protected function setUp(): void
    {
        gc_enable();

        parent::setUp();

        self::bootKernel();

        $this->resource = self::$container->get($this->resourceName);
        $this->repository = $this->resource->getRepository();
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->resource, $this->repository);

        gc_collect_cycles();
    }
}
