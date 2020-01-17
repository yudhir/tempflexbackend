<?php
declare(strict_types = 1);
/**
 * /src/Controller/ProductController.php
 *
 * @author TLe, Tarmo Leppänen <tarmo.leppanen@protacon.com>
 */

namespace App\Controller;

use App\DTO\Product\ProductCreate;
use App\DTO\Product\ProductPatch;
use App\DTO\Product\ProductUpdate;
use App\Resource\ProductResource;
use App\Rest\Controller;
use App\Rest\Traits\Actions;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Swagger\Annotations as SWG;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class ProductController
 *
 * @Route(
 *     path="/product",
 *  )
 *
 * @Security("is_granted('IS_AUTHENTICATED_FULLY')")
 * @SWG\Tag(name="Product Management")
 *
 * @package App\Controller
 * @author  Yudhir Khanal <yudhir.khanal@gmail.com>
 *
 * @method ProductResource getResource()
 */
class ProductController extends Controller
{
    // Traits for REST actions
    use Actions\Admin\CountAction;
    use Actions\Admin\FindAction;
    use Actions\Admin\FindOneAction;
    use Actions\Admin\IdsAction;
    use Actions\Admin\CreateAction;
    use Actions\Admin\DeleteAction;
    use Actions\Admin\PatchAction;
    use Actions\Admin\UpdateAction;

    /**
     * @var array<string, string>
     */
    protected static array $dtoClasses = [
        Controller::METHOD_CREATE => ProductCreate::class,
        Controller::METHOD_UPDATE => ProductUpdate::class,
        Controller::METHOD_PATCH => ProductPatch::class,
    ];

    /**
     * ProductController constructor.
     *
     * @param ProductResource $resource
     */
    public function __construct(ProductResource $resource)
    {
        $this->resource = $resource;
    }
}
