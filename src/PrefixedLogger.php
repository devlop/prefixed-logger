<?php

declare(strict_types=1);

namespace Devlop\PrefixedLogger;

use Psr\Log\LoggerInterface;

final class PrefixedLogger implements LoggerInterface
{
    private string $prefix;

    private LoggerInterface $logger;

    /**
     * Create a new prefixed logger
     *
     * @param  string  $prefix
     * @param  LoggerInterface  $logger
     * @return void
     */
    public function __construct(string $prefix, LoggerInterface $logger)
    {
        $this->prefix = $prefix;

        $this->logger = $logger;
    }

    /**
     * Add the prefix to the message
     */
    private function prefix(string $message) : string
    {
        return $this->prefix . $message;
    }

    /**
     * @inheritdoc
     */
    public function emergency($message, array $context = []) : void
    {
        $this->logger->emergency($this->prefix($message), $context);
    }

    /**
     * @inheritdoc
     */
    public function alert($message, array $context = []) : void
    {
        $this->logger->alert($this->prefix($message), $context);
    }

    /**
     * @inheritdoc
     */
    public function critical($message, array $context = []) : void
    {
        $this->logger->critical($this->prefix($message), $context);
    }

    /**
     * @inheritdoc
     */
    public function error($message, array $context = []) : void
    {
        $this->logger->error($this->prefix($message), $context);
    }

    /**
     * @inheritdoc
     */
    public function warning($message, array $context = []) : void
    {
        $this->logger->warning($this->prefix($message), $context);
    }

    /**
     * @inheritdoc
     */
    public function notice($message, array $context = []) : void
    {
        $this->logger->notice($this->prefix($message), $context);
    }

    /**
     * @inheritdoc
     */
    public function info($message, array $context = []) : void
    {
        $this->logger->info($this->prefix($message), $context);
    }

    /**
     * @inheritdoc
     */
    public function debug($message, array $context = []) : void
    {
        $this->logger->debug($this->prefix($message), $context);
    }

    /**
     * @inheritdoc
     */
    public function log($level, $message, array $context = []) : void
    {
        $this->logger->log($level, $this->prefix($message), $context);
    }
}
