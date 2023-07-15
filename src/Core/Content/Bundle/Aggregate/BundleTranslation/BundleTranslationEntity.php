<?php declare(strict_type=1);

namespace Tanmar\BundleExample\Core\Content\Bundle\Aggregate\BundleTranslation;

use Shopware\Core\Framework\DataAbstractionLayer\TranslationEntity;
use Tanmar\BundleExample\Core\Content\Bundle\BundleEntity;

class BundleTranslationEntity extends TranslationEntity
{
    // TODO: create the entity with the following fields: bundleId, anme and bundle
    /**
     * @var string
     */
    protected $bundleId;
    
    /**
     * @var string|null
     */
    protected $name;
    
    /**
     * @var BundleEntity
     */
    protected $bundle;
    
    public function getBundleId(): string
    {
        return $this->bundleId;
    }
    
    public function setBundleId(string $bundleId): void 
    {
        $this->bundleId= $bundleId;
    }
    
    public function getBundle(): BundleEntity
    {
        return $this->bundle;
    }
    
    public function setBundle(BundleEntity $bundle): void 
    {
        $this->bundle= $bundle;
    }
    
    public function getName(): ?string
    {
        return $this->name;
    }
    
    public function setName(string $name): void 
    {
        $this->name= $name;
    }
}
