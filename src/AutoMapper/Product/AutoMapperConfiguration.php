<?php
declare(strict_types = 1);
/**
 * /src/AutoMapper/ApiKey/AutoMapperConfiguration.php
 *
 * @author TLe, Tarmo Leppänen <tarmo.leppanen@protacon.com>
 */

namespace App\AutoMapper\Product;

use App\AutoMapper\RestAutoMapperConfiguration;
use App\AutoMapper\RestRequestMapper;
use App\DTO\Product\ProductCreate;
use App\DTO\Product\ProductPatch;
use App\DTO\Product\ProductUpdate;

/**
 * Class AutoMapperConfiguration
 *
 * @package App\AutoMapper
 * @author  TLe, Tarmo Leppänen <tarmo.leppanen@protacon.com>
 */
class AutoMapperConfiguration extends RestAutoMapperConfiguration
{
    /**
     * Classes to use specified request mapper.
     *
     * @var array<int, string>
     */
    protected static array $requestMapperClasses = [
        ProductCreate::class,
        ProductUpdate::class,
        ProductPatch::class,
    ];

    protected RestRequestMapper $requestMapper;

    /**
     * AutoMapperConfiguration constructor.
     *
     * @param RequestMapper $requestMapper
     */
    public function __construct(RequestMapper $requestMapper)
    {
        $this->requestMapper = $requestMapper;
    }
}
