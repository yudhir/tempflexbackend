<?php
declare(strict_types = 1);
/**
 * /src/Repository/ApiKeyRepository.php
 *
 * @author TLe, Tarmo Leppänen <tarmo.leppanen@protacon.com>
 */

namespace App\Repository;

use App\Entity\ApiKey as Entity;

/**
 * Class ApiKeyRepository
 *
 * @package App\Repository
 * @author  TLe, Tarmo Leppänen <tarmo.leppanen@protacon.com>
 *
 * @codingStandardsIgnoreStart
 *
 * @method Entity|null                     find(string $id, ?int $lockMode = null, ?int $lockVersion = null): ?Entity
 * @method array<int|string, mixed>|Entity findAdvanced(string $id, $hydrationMode = null)
 * @method Entity|null                     findOneBy(array $criteria, ?array $orderBy = null): ?Entity
 * @method array<int, Entity>              findBy(array $criteria, ?array $orderBy = null, ?int $limit = null, ?int $offset = null): array
 * @method array<int, Entity>              findByAdvanced(array $criteria, ?array $orderBy = null, ?int $limit = null, ?int $offset = null, ?array $search = null): array
 * @method array<int, Entity>              findAll(): array
 *
 * @codingStandardsIgnoreEnd
 */
class ApiKeyRepository extends BaseRepository
{
    protected static string $entityName = Entity::class;
}
