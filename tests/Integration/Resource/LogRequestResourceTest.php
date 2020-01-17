<?php
declare(strict_types = 1);
/**
 * /tests/Integration/Resource/LogRequestResourceTest.php
 *
 * @author TLe, Tarmo Leppänen <tarmo.leppanen@protacon.com>
 */

namespace App\Tests\Integration\Resource;

use App\Entity\LogRequest;
use App\Repository\LogRequestRepository;
use App\Resource\LogRequestResource;

/**
 * Class LogRequestResourceTest
 *
 * @package App\Tests\Integration\Resource
 * @author  TLe, Tarmo Leppänen <tarmo.leppanen@protacon.com>
 */
class LogRequestResourceTest extends ResourceTestCase
{
    protected $entityClass = LogRequest::class;
    protected $repositoryClass = LogRequestRepository::class;
    protected $resourceClass = LogRequestResource::class;
}
