<?php
declare(strict_types = 1);
/**
 * /src/Rest/DTO/UserGroup/UserGroup.php
 *
 * @author TLe, Tarmo Leppänen <tarmo.leppanen@protacon.com>
 */

namespace App\DTO\UserGroup;

use App\DTO\RestDto;
use App\DTO\RestDtoInterface;
use App\Entity\Interfaces\EntityInterface;
use App\Entity\Role as RoleEntity;
use App\Entity\UserGroup as Entity;
use App\Validator\Constraints as AppAssert;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class UserGroup
 *
 * @package App\DTO\UserGroup
 * @author  TLe, Tarmo Leppänen <tarmo.leppanen@protacon.com>
 *
 * @method self|RestDtoInterface  patch(RestDtoInterface $dto): RestDtoInterface
 * @method Entity|EntityInterface update(EntityInterface $entity): EntityInterface
 */
class UserGroup extends RestDto
{
    /**
     * @var string
     *
     * @Assert\NotBlank()
     * @Assert\NotNull()
     * @Assert\Length(
     *      min = 4,
     *      max = 255,
     *      allowEmptyString="false",
     *  )
     */
    protected string $name = '';

    /**
     * @var \App\Entity\Role
     *
     * @AppAssert\EntityReferenceExists(entityClass=RoleEntity::class)
     */
    protected ?RoleEntity $role = null;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return UserGroup
     */
    public function setName(string $name): self
    {
        $this->setVisited('name');

        $this->name = $name;

        return $this;
    }

    /**
     * @return RoleEntity|string|null
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param RoleEntity $role
     *
     * @return UserGroup
     */
    public function setRole(RoleEntity $role): self
    {
        $this->setVisited('role');

        $this->role = $role;

        return $this;
    }

    /**
     * Method to load DTO data from specified entity.
     *
     * @param EntityInterface|Entity $entity
     *
     * @return RestDtoInterface|UserGroup
     */
    public function load(EntityInterface $entity): RestDtoInterface
    {
        if ($entity instanceof Entity) {
            $this->name = $entity->getName();
            $this->role = $entity->getRole();
        }

        return $this;
    }
}
