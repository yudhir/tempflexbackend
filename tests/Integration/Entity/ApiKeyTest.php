<?php
declare(strict_types = 1);
/**
 * /tests/Integration/Entity/ApiKeyTest.php
 *
 * @author TLe, Tarmo Leppänen <tarmo.leppanen@protacon.com>
 */

namespace App\Tests\Integration\Entity;

use App\Entity\ApiKey;
use App\Security\RolesService;
use Generator;
use function array_unique;
use function strlen;

/**
 * Class ApiKeyTest
 *
 * @package App\Tests\Integration\Entity
 * @author  TLe, Tarmo Leppänen <tarmo.leppanen@protacon.com>
 *
 * @property ApiKey $entity
 */
class ApiKeyTest extends EntityTestCase
{
    /**
     * @var string
     */
    protected $entityName = ApiKey::class;

    public function testThatTokenIsGenerated(): void
    {
        static::assertSame(40, strlen($this->entity->getToken()));
    }

    public function testThatGetRolesContainsExpectedRole(): void
    {
        static::assertContains(RolesService::ROLE_API, $this->entity->getRoles());
    }

    /**
     * @dataProvider dataProviderTestThatApiKeyHasExpectedRoles
     *
     * @param array $expectedRoles
     * @param array $criteria
     */
    public function testThatApiKeyHasExpectedRoles(array $expectedRoles, array $criteria): void
    {
        $apiKey = $this->repository->findOneBy($criteria);

        static::assertInstanceOf(ApiKey::class, $apiKey);

        /** @noinspection NullPointerExceptionInspection */
        static::assertSame($expectedRoles, $apiKey->getRoles());

        unset($apiKey);
    }

    /**
     * @return Generator
     */
    public function dataProviderTestThatApiKeyHasExpectedRoles(): Generator
    {
        static::bootKernel();

        $rolesService = static::$container->get(RolesService::class);

        foreach ($rolesService->getRoles() as $role) {
            yield [
                array_unique([RolesService::ROLE_API, $role]),
                [
                    'description' => 'ApiKey Description: ' . $rolesService->getShort($role),
                ]
            ];
        }
    }
}
