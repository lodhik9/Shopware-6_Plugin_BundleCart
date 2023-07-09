<?php /* Tanmar PG 1.5.0 */

declare(strict_types=1); 

namespace Tanmar\BundleExample\Components\Helper;

use Monolog\Logger;
use Tanmar\BundleExample\Components\Config;
use Tanmar\BundleExample\Service\ConfigService;

class LoggerHelper {

    protected Config $config;
    protected string $environment;
    protected Logger $logger;

    public function __construct(ConfigService $configService, string $kernelEnv, Logger $logger) {
        $this->config = $configService->getConfig();
        $this->environment = $kernelEnv;
        $this->logger = $logger;
    }

    /**
     * log Throwable message, code and trace
     */
    public function logThrowable(\Throwable $e, string $additionalText = '', int $logLevel = Logger::ERROR): void {
        $additionalText = ($additionalText != '') ? ' ' . $additionalText : $additionalText;
        $this->addDirectRecord($logLevel, "An error ocurred: " . $e->getMessage() . " Error code: " . $e->getCode() . $additionalText, $e->getTrace());
    }

    public function addDirectRecord(int $logLevel, string $text, array $data = []): void {
        if ($this->config->getLoggingLevel() != 0 && $logLevel >= $this->config->getLoggingLevel()) {
            $this->logger->addRecord(
                $logLevel,
                'BundleExample ' . $text,
                [
                    'source' => 'plugin',
                    'environment' => $this->environment,
                    'additionalData' => $data,
                ]
            );
        }
    }

}
