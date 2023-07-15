<?php

namespace Tanmar\BundleExample\Core\Content\Bundle\Aggregate\BundleProduct;


use Shopware\Core\Framework\DataAbstractionLayer\MappingEntityDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\Field\BoolField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\FkField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\IntField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\StringField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\ManyToManyAssociationField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\ManyToOneAssociationField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\ReferenceVersionField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\CreatedAtField;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;
use Shopware\Core\Framework\DataAbstractionLayer\Field\TranslationField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\PrimaryKey;
use Tanmar\BundleExample\Core\Content\Bundle\BundleDefinition;
use Shopware\Core\Content\Product\ProductDefinition;


class BundleProductDefinition extends MappingEntityDefinition
{
    public function getEntityName(): string
    {
        return 'swag_bundle_product';
    }

//    public function getEntityClass(): string
//    {
//        return BundleEntity::class;
//    }
//    
//    public function getCollectionClass(): string
//    {
//        return BundleCollection::class;
//    }


//    It is a mapping table: it maps products to the bundles
    protected function defineFields(): FieldCollection
    {
        return new FieldCollection([
            (new FkField('bundle_id', 'bundleId',
                    BundleDefinition::class))->addFlags(new PrimaryKey(), new Required()),
            (new FkField('product_id', 'productId',
                    ProductDefinition::class))->addFlags(new PrimaryKey(), new Required()),
            (new ReferenceVersionField(ProductDefinition::class))->addFlags(new PrimaryKey(), new Required()),
            new ManyToOneAssociationField('bundle', 'bundle_id', BundleDefinition::class),
            new ManyToOneAssociationField('product', 'product_id', ProductDefinition::class),
            new CreatedAtField(),
        ]);
    }
}


