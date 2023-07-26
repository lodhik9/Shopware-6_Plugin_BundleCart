<?php /* Tanmar PG 1.5.0 */

declare(strict_types=1);

namespace Tanmar\BundleExample;

use Shopware\Core\Framework\Plugin;
use Doctrine\DBAL\Connection;
use Shopware\Core\Framework\Plugin\Context\ActivateContext;
use Shopware\Core\Framework\Plugin\Context\UninstallContext;
use Shopware\Core\Framework\DataAbstractionLayer\Indexing\EntityIndexerRegistry;

class BundleExample extends Plugin {
    public function activate(ActivateContext $activateContext): void
    {
        
        //TODO: Run InheritanceIndexer, tell indexer to index out out stuff
        $register = $this->container->get(EntityIndexerRegistry::class);
        $register->sendIndexingMessage(['product.indexer']);
    }
    
    public function uninstall(UninstallContext $uninstallContext): void {
       //TODO: if the UninstallContext->keepUserData() === false, 
       // drop the 3 tables your created, drop the bundle column on the product table
        parent::uninstall($uninstallContext);
        
        if($uninstallContext->keepUserData()){
            return;
        }
        
        $connection = $this->container->get(Connection::class);
        $connection->executeQuery('DROP TABLE IF EXISTS `swag_bundle_product`');
        $connection->executeQuery('DROP TABLE IF EXISTS `swag_bundle_translation`');
        $connection->executeQuery('DROP TABLE IF EXISTS `swag_bundle`');
        $connection->executeQuery('ALTER TABLE `product` DROP COLUMN `bundles` ');

    }

}
