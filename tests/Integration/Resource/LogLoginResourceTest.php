<?php
declare(strict_types = 1);
/**
 * /tests/Integration/Resource/LogLoginResourceTest.php
 *
 * @author TLe, Tarmo Leppänen <tarmo.leppanen@protacon.com>
 */

namespace App\Tests\Integration\Resource;

use App\Entity\LogLogin;
use App\Repository\LogLoginRepository;
use App\Resource\LogLoginResource;

/**
 * Class LogLoginResourceTest
 *
 * @package App\Tests\Integration\Resource
 * @author  TLe, Tarmo Leppänen <tarmo.leppanen@protacon.com>
 */
class LogLoginResourceTest extends ResourceTestCase
{
    protected $entityClass = LogLogin::class;
    protected $repositoryClass = LogLoginRepository::class;
    protected $resourceClass = LogLoginResource::class;
}
