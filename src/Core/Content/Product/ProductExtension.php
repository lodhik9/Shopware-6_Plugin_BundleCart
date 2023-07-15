<?php

namespace Tanmar\BundleExample\Core\Content\Product;

use Shopware\Core\Content\Product\ProductDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\EntityExtension;
use Shopware\Core\Framework\DataAbstractionLayer\Field\ObjectField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\OneToManyAssociationField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\OneToOneAssociationField;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\Runtime;
use Shopware\Core\Framework\DataAbstractionLayer\Field\ManyToManyAssociationField;
use Tanmar\BundleExample\Core\Content\Bundle\BundleDefinition;
use Tanmar\BundleExample\Core\Content\Bundle\Aggregate\BundleProduct\BundleProductDefinition;

class ProductExtension extends EntityExtension
{
    public function extendFields(FieldCollection $collection): void
    {
//        //Add ApiAware flag to make this field searchable
//        $collection->add(
//            (new OneToOneAssociationField('oneToOneExampleExtension', 'id', 'product_id', OneToOneExampleExtensionDefinition::class, true))->addFlags(new ApiAware())
//        );
//        //Add ApiAware flag to make this field searchable
//        $collection->add(
//            (new OneToManyAssociationField('oneToManyExampleExtension', OneToManyExampleExtensionDefinition::class, 'product_id'))->addFlags(new ApiAware())
//        );
//        //Runtime fields are not searchable
//        $collection->add(
//            (new ObjectField('custom_string', 'customString'))->addFlags(new Runtime())
//                
//        );
        $collection->add(new ManyToManyAssociationField(
                'bundle',
                BundleDefinition::class,
                BundleProductDefinition::class,
                'product_id',
                'bundle_id'
        ));
    }

    public function getDefinitionClass(): string
    {
        return ProductDefinition::class;
    }
}
