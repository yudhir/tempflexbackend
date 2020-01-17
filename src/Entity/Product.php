<?php

namespace App\Entity;

use DateTimeImmutable;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Interfaces\EntityInterface;
use App\Entity\Interfaces\UserGroupAwareInterface;
use App\Entity\Traits\Blameable;
use App\Entity\Traits\Timestampable;
use App\Entity\Traits\Uuid;
use App\Security\RolesService;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Ramsey\Uuid\UuidInterface;
use Swagger\Annotations as SWG;
use Symfony\Bridge\Doctrine\Validator\Constraints as AssertCollection;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;
use Throwable;
use function array_map;
use function array_merge;
use function array_unique;
use function array_values;
use function mb_strlen;
use function random_int;

/**
 * @ORM\Table(
 *      name="app_products"
 *  )
 * @ORM\Entity(repositoryClass="App\Repository\ProductRepository")
 */
class Product implements EntityInterface, UserGroupAwareInterface
{
    // Traits
    use Blameable;
    use Timestampable;
    use Uuid;

    /**
     * @var UuidInterface
     * @Groups({
     *      "Product",
     *      "Product.id",
     *  })
     * @ORM\Id()
     * sdfORM\GeneratedValue()
     * @ORM\Column(
     *      name="id",
     *      type="uuid_binary_ordered_time",
     *      unique=true,
     *      nullable=false,
     *  )
     * @SWG\Property(type="string", format="uuid")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $brand;

    /**
     * @ORM\Column(type="text",nullable=true)
     */
    private $name;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $size;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $sku;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $material;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $manufacturer;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $logo;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $color;

    /**
     * ApiKey constructor.
     *
     * @throws Throwable
     */
    public function __construct()
    {
        $this->id = $this->getUuid();
        //$this->userGroups = new ArrayCollection();
        //$this->logsRequest = new ArrayCollection();

       // $this->generateToken();
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id->toString();
    }

    public function getBrand(): ?string
    {
        return $this->brand;
    }

    public function setBrand(?string $brand): self
    {
        $this->brand = $brand;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getSize(): ?string
    {
        return $this->size;
    }

    public function setSize(?string $size): self
    {
        $this->size = $size;

        return $this;
    }

    public function getSku(): ?string
    {
        return $this->sku;
    }

    public function setSku(?string $sku): self
    {
        $this->sku = $sku;

        return $this;
    }

    public function getMaterial(): ?string
    {
        return $this->material;
    }

    public function setMaterial(?string $material): self
    {
        $this->material = $material;

        return $this;
    }

    public function getManufacturer(): ?string
    {
        return $this->manufacturer;
    }

    public function setManufacturer(?string $manufacturer): self
    {
        $this->manufacturer = $manufacturer;

        return $this;
    }

    public function getLogo(): ?string
    {
        return $this->logo;
    }

    public function setLogo(?string $logo): self
    {
        $this->logo = $logo;

        return $this;
    }

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(?string $color): self
    {
        $this->color = $color;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getCreatedAt(): ?DateTimeImmutable
    {
        // TODO: Implement getCreatedAt() method.
    }

    /**
     * @inheritDoc
     */
    public function getUserGroups(): Collection
    {
        // TODO: Implement getUserGroups() method.
    }

    /**
     * @inheritDoc
     */
    public function addUserGroup(UserGroup $userGroup): UserGroupAwareInterface
    {
        // TODO: Implement addUserGroup() method.
    }

    /**
     * @inheritDoc
     */
    public function removeUserGroup(UserGroup $userGroup): UserGroupAwareInterface
    {
        // TODO: Implement removeUserGroup() method.
    }

    /**
     * @inheritDoc
     */
    public function clearUserGroups(): UserGroupAwareInterface
    {
        // TODO: Implement clearUserGroups() method.
    }
}
