<?php

namespace Tanmar\BundleExample\Core\Content\Bundle;

use Shopware\Core\Framework\DataAbstractionLayer\EntityDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\EntityDefinitionConfigurator;
use Shopware\Core\Framework\DataAbstractionLayer\Field\BoolField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\FkField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\IntField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\StringField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\ManyToManyAssociationField;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;
use Shopware\Core\Framework\DataAbstractionLayer\Field\TranslationField;

class BundleDefinition extends EntityDefinition
{
    public function getEntityName(): string
    {
        return 'swag_bundle';
    }

    public function getEntityClass(): string
    {
        return BundleEntity::class;
    }
    
    public function getCollectionClass(): string
    {
        return BundleCollection::class;
    }


    protected function defineFields(): FieldCollection
    {
        return new FieldCollection([
            (new IdField('id','id'))->addFlags(new Required(), new PrimaryKey()),
//            (new StringField('name', 'name'))->setFlags(new Required()),
            new TranslationField('name'),
//            (new StringField('description', 'description'))->setFlags(new Required()),
            new TranslationField('description'),
            new TranslationAssociationField(BundleTranslationDefinition::class, 'swag_bundle_id'),
            new ManyToManyAssociationField('products',ProductDefnition::class, BundleProductDefinition::class, 'swag_product_id' ),
    //            new FkField('image_id', 'imageId', MediaDefinition::class),
//            new ManyToOneAssociationField('image', 'image_id', MediaDefinition::class, 'id', false),
//            new IntField('age', 'age'),
//            new BoolField('active', 'active'),
        ]);
    }

    public static function getDefinitionConfigurator(): EntityDefinitionConfigurator
    {
        return new class implements EntityDefinitionConfigurator {
            public function configure(EntityDefinitionConfigurator $configurator): void
            {
                $configurator->setEntityClass(JobEntity::class);
                $configurator->setEntityName('swag_job_entity');
                $configurator->setInsertMode(EntityDefinitionConfigurator::INSERT_MODE_REPLACE);
            }
        };
    }
}
