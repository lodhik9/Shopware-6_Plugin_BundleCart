<?php

namespace Tanmar\BundleExample\Core\Content\Bundle\Aggregate\BundleTranslation;

use Shopware\Core\Framework\DataAbstractionLayer\EntityTranslationDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\Field\StringField;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;
use Tanmar\BundleExample\Core\Content\Bundle\BundleDefnition;

class BundleTranslationDefinition extends EntityTranslationDefinition
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

   public function getParentDefinitionClass(): string {
       return BundleDefnition::class;
   }

    protected function defineFields(): FieldCollection
    {
        return new FieldCollection([
            (new StringField('name', 'name'))->setFlags(new Required()),
            (new StringField('description', 'description'))->setFlags(new Required()),
        ]);
    }
}
