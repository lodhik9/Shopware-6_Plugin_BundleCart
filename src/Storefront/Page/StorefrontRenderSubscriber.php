<?php /* Tanmar PG 1.5.0 */

declare(strict_types=1);

namespace Tanmar\BundleExample\Storefront\Page;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Shopware\Storefront\Event\StorefrontRenderEvent;
use Tanmar\BundleExample\Components\BundleExampleData;
use Tanmar\BundleExample\Components\Helper\LoggerHelper;use Tanmar\BundleExample\Service\ConfigService;

class StorefrontRenderSubscriber implements EventSubscriberInterface {

    protected const EXTENSION_NAME = "bundleExample";

    protected ConfigService $configService;
    protected LoggerHelper $loggerHelper;    
    public function __construct(ConfigService $configService, LoggerHelper $loggerHelper) {
        $this->configService = $configService;
        $this->loggerHelper = $loggerHelper;        
    }

    public static function getSubscribedEvents(): array {
        return [
            StorefrontRenderEvent::class => 'onStorefrontRender'
        ];
    }

    public function onStorefrontRender(StorefrontRenderEvent $event): void {
        try {
            $pluginData = new BundleExampleData();
            $config = $this->configService->getConfig();
            if ($config && $config->isActive()) {
                $pluginData->assign([
                    'active' => $config->isActive(),
                    /*
                     * add more fields here
                     */
                ]);
            }
            $event->getContext()->addExtension(self::EXTENSION_NAME, $pluginData);
        } catch (\Throwable $e) {
            $this->loggerHelper->logThrowable($e);            
        }
    }

}
