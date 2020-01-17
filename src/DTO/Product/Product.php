<?php


namespace App\DTO\Product;


use App\DTO\RestDto;
use App\DTO\RestDtoInterface;
use App\Entity\Product as Entity;
use App\Entity\Interfaces\EntityInterface;
use App\Entity\UserGroup as UserGroupEntity;
use App\Entity\Interfaces\UserGroupAwareInterface;
use App\Validator\Constraints as AppAssert;
use Symfony\Component\Validator\Constraints as Assert;
use function array_map;

/**
 * Class Product
 *
 * @package App\DTO
 *
 * @method self|RestDtoInterface  get(string $id): RestDtoInterface
 * @method self|RestDtoInterface  patch(RestDtoInterface $dto): RestDtoInterface
 * @method \App\Entity\Product|EntityInterface update(EntityInterface $entity): EntityInterface
 */
class Product extends RestDto
{



    /**
     * @var string
     */
    protected $brand = '';

    /**
     * @var string
     */
    protected $name= '';

    /**
     * @var string
     */
    protected $description= '';

    /**
     * @var string
     */
    protected $size= '';

    /**
     * @var string
     */
    protected $sku= '';

    /**
     * @var string
     */
    protected $material= '';

    /**
     * @var string
     */
    protected $manufacturer= '';

    /**
     *@var string
     */
    protected $logo= '';

    /**
    @var string
     */
    protected $color= '';

    /**
     * @return string
     */
    public function getBrand(): string
    {
        return $this->brand;
    }

    /**
     * @param string $brand
     */
    public function setBrand(string $brand): void
    {
        $this->brand = $brand;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getSize(): string
    {
        return $this->size;
    }

    /**
     * @param string $size
     */
    public function setSize(string $size): void
    {
        $this->size = $size;
    }

    /**
     * @return string
     */
    public function getSku(): string
    {
        return $this->sku;
    }

    /**
     * @param string $sku
     */
    public function setSku(string $sku): void
    {
        $this->sku = $sku;
    }

    /**
     * @return string
     */
    public function getMaterial(): string
    {
        return $this->material;
    }

    /**
     * @param string $material
     */
    public function setMaterial(string $material): void
    {
        $this->material = $material;
    }

    /**
     * @return string
     */
    public function getManufacturer(): string
    {
        return $this->manufacturer;
    }

    /**
     * @param string $manufacturer
     */
    public function setManufacturer(string $manufacturer): void
    {
        $this->manufacturer = $manufacturer;
    }

    /**
     * @return string
     */
    public function getLogo(): string
    {
        return $this->logo;
    }

    /**
     * @param string $logo
     */
    public function setLogo(string $logo): void
    {
        $this->logo = $logo;
    }

    /**
     * @return mixed
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * @param mixed $color
     */
    public function setColor($color): void
    {
        $this->color = $color;
    }







    /**
     * Method to load DTO data from specified entity.
     *
     * @param EntityInterface|Entity $entity
     *
     * @return RestDtoInterface|Product
     */
    public function load(EntityInterface $entity): RestDtoInterface
    {
        if ($entity instanceof Entity) {
            $this->id = $entity->getId();
            $this->token = $entity->getToken();
            $this->description = $entity->getDescription();

            /** @var array<int, UserGroupEntity> $userGroups */
            $userGroups = $entity->getUserGroups()->toArray();

            $this->userGroups = $userGroups;
        }

        return $this;
    }
}
