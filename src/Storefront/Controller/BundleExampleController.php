<?php /* Tanmar PG 1.5.0 */

declare(strict_types=1);

namespace Tanmar\BundleExample\Storefront\Controller;

use Shopware\Storefront\Controller\StorefrontController;
use Shopware\Core\System\SalesChannel\SalesChannelContext;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Tanmar\BundleExample\Service\ConfigService;

/**
 * @Route(defaults={"_routeScope"={"storefront"}})
 */
class BundleExampleController extends StorefrontController {
    
    /**
     * @Route("/BundleExample/index", name="frontend.tanmar.BundleExample.index", options={"seo"="false"}, methods={"GET"})
     */
    public function index(SalesChannelContext $salesChannelContext, ConfigService $configService) {
        return new Response('<html><body>' . rand() . '</body></html>');
    }
}