<?php

namespace Tanmar\BundleExample\Core\Content\Bundle;


use Shopware\Core\Framework\DataAbstractionLayer\EntityCollection;

/**
 * @method void              add(BundleCollection $entity)
 * @method void              set(string $key, BundleCollection $entity)
 * @method BundleCollection[]    getIterator()
 * @method BundleCollection[]    getElements()
 * @method BundleCollection|null get(string $key)
 * @method BundleCollection|null first()
 * @method BundleCollection|null last()
 */
class BundleCollection extends EntityCollection
{
    protected function getExpectedClass(): string
    {
        return BundleEntity::class;
    }
}
