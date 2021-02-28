<?php

declare(strict_types=1);

namespace Devlop\PrefixedLogger\Tests;

use Devlop\PrefixedLogger\PrefixedLogger;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use PHPUnit\Framework\TestCase;
use Psr\Log\LogLevel;
use Psr\Log\LoggerInterface;

final class PrefixedLoggerTest extends TestCase
{
    public function test_can_be_instantiated() : void
    {
        $logger = new Logger('test-logger', [
            new StreamHandler(fopen('php://memory', 'rw')),
        ]);

        $this->assertInstanceOf(LoggerInterface::class, new PrefixedLogger('[phpunit] ', $logger));
    }

    public function test_accepts_empty_prefix() : void
    {
        $logger = new Logger('test-logger', [
            new StreamHandler(fopen('php://memory', 'rw')),
        ]);

        $this->assertInstanceOf(LoggerInterface::class, new PrefixedLogger('', $logger));
    }

    public function test_prefix_is_added_to_emergency() : void
    {
        (new PrefixedLogger(
            $prefix = '[tests] ',
            new Logger('emergency-test', [
                new StreamHandler($stream = fopen('php://memory', 'rw')),
            ]),
        ))->emergency('This is an emergency test!');

        rewind($stream);

        $this->assertStringContainsString($prefix, stream_get_contents($stream));
    }

    public function test_prefix_is_added_to_alert() : void
    {
        (new PrefixedLogger(
            $prefix = '[tests] ',
            new Logger('alert-test', [
                new StreamHandler($stream = fopen('php://memory', 'rw')),
            ]),
        ))->alert('This is an alert test!');

        rewind($stream);

        $this->assertStringContainsString($prefix, stream_get_contents($stream));
    }

    public function test_prefix_is_added_to_critical() : void
    {
        (new PrefixedLogger(
            $prefix = '[tests] ',
            new Logger('critical-test', [
                new StreamHandler($stream = fopen('php://memory', 'rw')),
            ]),
        ))->critical('This is an alert test!');

        rewind($stream);

        $this->assertStringContainsString($prefix, stream_get_contents($stream));
    }

    public function test_prefix_is_added_to_error() : void
    {
        (new PrefixedLogger(
            $prefix = '[tests] ',
            new Logger('error-test', [
                new StreamHandler($stream = fopen('php://memory', 'rw')),
            ]),
        ))->error('This is an alert test!');

        rewind($stream);

        $this->assertStringContainsString($prefix, stream_get_contents($stream));
    }

    public function test_prefix_is_added_to_warning() : void
    {
        (new PrefixedLogger(
            $prefix = '[tests] ',
            new Logger('warning-test', [
                new StreamHandler($stream = fopen('php://memory', 'rw')),
            ]),
        ))->warning('This is an alert test!');

        rewind($stream);

        $this->assertStringContainsString($prefix, stream_get_contents($stream));
    }

    public function test_prefix_is_added_to_notice() : void
    {
        (new PrefixedLogger(
            $prefix = '[tests] ',
            new Logger('notice-test', [
                new StreamHandler($stream = fopen('php://memory', 'rw')),
            ]),
        ))->notice('This is an alert test!');

        rewind($stream);

        $this->assertStringContainsString($prefix, stream_get_contents($stream));
    }

    public function test_prefix_is_added_to_info() : void
    {
        (new PrefixedLogger(
            $prefix = '[tests] ',
            new Logger('info-test', [
                new StreamHandler($stream = fopen('php://memory', 'rw')),
            ]),
        ))->info('This is an alert test!');

        rewind($stream);

        $this->assertStringContainsString($prefix, stream_get_contents($stream));
    }

    public function test_prefix_is_added_to_debug() : void
    {
        (new PrefixedLogger(
            $prefix = '[tests] ',
            new Logger('debug-test', [
                new StreamHandler($stream = fopen('php://memory', 'rw')),
            ]),
        ))->debug('This is an alert test!');

        rewind($stream);

        $this->assertStringContainsString($prefix, stream_get_contents($stream));
    }

    public function test_prefix_is_added_to_log() : void
    {
        (new PrefixedLogger(
            $prefix = '[tests] ',
            new Logger('log-test', [
                new StreamHandler($stream = fopen('php://memory', 'rw')),
            ]),
        ))->log(LogLevel::DEBUG, 'This is an alert test!');

        rewind($stream);

        $this->assertStringContainsString($prefix, stream_get_contents($stream));
    }
}
