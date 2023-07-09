<?php /* Tanmar PG 1.5.0 */

declare(strict_types=1);

namespace Tanmar\BundleExample\Framework\Twig\Extension;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class ExtensionName extends AbstractExtension {

    public function __construct() {
        // dependency injection
    }

    public function getFilters(): array {
        return [
            new TwigFilter('filterName', [$this, 'method'], ['is_safe' => ['html']]),
        ];
    }

    public function method($text = ''): string {
        // do awesome stuff
        return $text;
    }

}
