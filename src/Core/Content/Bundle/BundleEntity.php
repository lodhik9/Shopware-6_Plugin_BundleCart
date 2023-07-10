<?php

namespace Tanmar\BundleExample\Core\Content\Bundle;

use Shopware\Core\Framework\DataAbstractionLayer\Entity;
use Shopware\Core\Framework\DataAbstractionLayer\EntityIdTrait;

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
}
