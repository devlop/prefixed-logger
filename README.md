<p align="center">
    <a href="https://packagist.org/packages/devlop/prefixed-logger"><img src="https://img.shields.io/packagist/v/devlop/prefixed-logger" alt="Latest Stable Version"></a>
    <a href="https://github.com/devlop-ab/prefixed-logger/blob/master/LICENSE.md"><img src="https://img.shields.io/packagist/l/devlop/prefixed-logger" alt="License"></a>
</p>

# Prefixed Logger

Wrapper to apply a prefix to all messages going into a logger.

# Installation

```bash
composer require devlop/prefixed-logger
```

# Usage

```
use Devlop\PrefixedLogger\PrefixedLogger;

$logger = new PrefixedLogger('[your prefix] ', $theOriginalLogger);

// then use it as you would use any other logger

$logger->info('something happened'); // '[your prefix] something happened';
```
