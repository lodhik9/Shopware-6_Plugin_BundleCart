<?php declare(strict_types=1);

namespace Tanmar\BundleExample\Core\Content\Bundle\Aggregate\BundleTranslation;

use Shopware\Core\Framework\DataAbstractionLayer\EntityCollection;
use Tanmar\BundleExample\Core\Content\Bundle\Aggregate\BundleTranslation\BundleTranslationEntity;

class BundleTranslationCollection extends EntityCollection
{
    protected function getExpectedClass(): string
    {
        // TODO: return translation entity class
        return BundleTranslationEntity::class;
    }
}
    
    