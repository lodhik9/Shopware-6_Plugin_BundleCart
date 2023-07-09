<?php /* Tanmar PG 1.5.0 */

declare(strict_types=1); 

namespace Tanmar\BundleExample\Components;

use Shopware\Core\Framework\Struct\Struct;

class BundleExampleData extends Struct {

    protected bool $active;

    public function __construct() {
        $this->active = false;
    }

    public function getActive(): bool {
        return $this->active;
    }

}