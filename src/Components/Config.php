<?php /* Tanmar PG 1.5.0 */

declare(strict_types=1); 

namespace Tanmar\BundleExample\Components;

use Shopware\Core\System\SystemConfig\SystemConfigService;

class Config {

    public const PLUGIN_NAME = 'BundleExample';
    public const LOGGING_LEVEL_NONE = 'none';
    public const LOGGING_LEVEL_DEBUG = 'debug';
    public const LOGGING_LEVEL_INFO = 'info';
    public const LOGGING_LEVEL_ERROR = 'error';
    
    protected SystemConfigService $systemConfigService;
    protected ?string $salesChannelId;
    protected string $path;
    protected bool $active;
    protected string $loggingLevel;

    public function __construct(SystemConfigService $systemConfigService, ?string $salesChannelId = null) {
        $this->path = self::PLUGIN_NAME . '.config.';
        $this->systemConfigService = $systemConfigService;
        $this->salesChannelId = $salesChannelId;

        $this->active = $this->get('active', false);
        $this->loggingLevel = $this->get('loggingLevel', self::LOGGING_LEVEL_ERROR);
    }

    public function isActive(): bool {
        return $this->active;
    }
    
    public function getLoggingLevel(): int {
        $loggingLevel = 400;
        switch ($this->loggingLevel) {
            case self::LOGGING_LEVEL_NONE:
                $loggingLevel = 0;
                break;
            case self::LOGGING_LEVEL_DEBUG:
                $loggingLevel = 100;
                break;
            case self::LOGGING_LEVEL_INFO:
                $loggingLevel = 200;
                break;
            case self::LOGGING_LEVEL_ERROR:
            default:
                $loggingLevel = 400;
                break;
        }
        return $loggingLevel;
    }

    private function get(string $configValueName, $defaultValue = false) {
        $configValueSalesChannel = $this->systemConfigService->get($this->path . $configValueName, $this->salesChannelId);
        if (!is_null($configValueSalesChannel)) {
            return $configValueSalesChannel;
        } else {
            return $defaultValue;
        }
    }
}
