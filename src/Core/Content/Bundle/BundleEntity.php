<?php

namespace Tanmar\BundleExample\Core\Content\Bundle;

use Shopware\Core\Framework\DataAbstractionLayer\Entity;
use Shopware\Core\Framework\DataAbstractionLayer\EntityIdTrait;
use Tanmar\BundleExample\Core\Content\Bundle\Aggregate\BundleTranslation\BundleTranslationCollection;
use Shopware\Core\Content\Product\ProductCollection;

class BundleEntity extends Entity
{
    use EntityIdTrait; // Include the EntityIdTrait for ID handling

    /**
     * @var string|null
     */
    protected ?string $name;

    /**
     * @var string|null
     */
    protected ?string $description;
    
    /**
     * @var string
     */
    protected $discountType;
    
    /**
     * @var float
     */
    protected $dicsount;


    
        /**
     * Get the Name.
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Set the title.
     *
     * @param string|null $title
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * Get the discountType.
     *
     * @return string
     */
    public function getDiscountType(): string
    {
        return $this->discountType;
    }

    /**
     * Set the discountType.
     *
     * @param string $discountType
     */
    public function setDiscountType(string $discountType): void
    {
        $this->discountType = $discountType;
    }
    
     /**
     * Get the discount.
     *
     * @return float
     */
    public function getDiscount(): float
    {
        return $this->discount;
    }

    /**
     * Set the discount.
     *
     * @param string $discount
     */
    public function setDiscount(string $discount): void
    {
        $this->discount = $discount;
    }

    /**
     * Get the description.
     *
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    
    /**
     * Set the description.
     *
     * @param string|null $description
     */
    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }
    
    // Add more getter/setter methods for other properties if needed

    // ToDo: add your associated products and translations
    /**
     * @var BundleTranslationCollection
     */
    protected $translations;
    
    /**
     * @var ProductCollection|null
     */
    protected $products;
    
    /**
     * Get the translations.
     *
     * @return BundleTranslationCollection
     */
    public function getTranslations(): BundleTranslationCollection
    {
        return $this->translations;
    }

    
    /**
     * Set the translations.
     *
     * @param BundleTranslationCollection $translations
     */
    public function setTranslations(BundleTranslationCollection $translations): void
    {
        $this->translations = $translations;
    }
    
    /**
     * Get the products.
     *
     * @return ProductCollection|null
     */
    public function getProducts(): ?ProductCollection
    {
        return $this->products;
    }
    
    /**
     * Set the products.
     *
     * @param ProductCollection|null $products
     */
    public function setProducts(?ProductCollection $products): void
    {
        $this->products = $products;
    }
    }
