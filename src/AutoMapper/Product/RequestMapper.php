<?php
declare(strict_types = 1);
/**
 * /src/AutoMapper/ApiKey/RequestMapper.php
 *
 * @author TLe, Tarmo Leppänen <tarmo.leppanen@protacon.com>
 */

namespace App\AutoMapper\Product;

use App\AutoMapper\RestRequestMapper;
use App\Entity\Product;
use App\Resource\ProductResource;
use function array_map;

/**
 * Class RequestMapper
 *
 * @package App\AutoMapper
 * @author  TLe, Tarmo Leppänen <tarmo.leppanen@protacon.com>
 */
class RequestMapper extends RestRequestMapper
{
    /**
     * Properties to map to destination object.
     *
     * @var array<int, string>
     */
    protected static array $properties = [

        'brand'  ,'name' , 'description' , 'size' , 'sku' , 'material' , 'manufacturer', 'logo', ' color'
    ];

    private ProductResource $ProductResource;

    /**
     * RequestMapper constructor.
     *
     * @param ProductResource $productResource
     */
    public function __construct(ProductResource $productResource)
    {
        $this->ProductResource = $productResource;
    }

    /**
     * @param array|array<int, string> $userGroups
     *
     * @return array|UserGroup[]
     */
    protected function transformUserGroups(array $userGroups): array
    {
        return array_map(
            fn (string $userGroupUuid): UserGroup => $this->userGroupResource->getReference($userGroupUuid),
            $userGroups
        );
    }
}
