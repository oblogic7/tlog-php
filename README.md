[![Build Status](https://secure.travis-ci.org/peterkokot/php-skeleton.png?branch=master)](http://travis-ci.org/peterkokot/php-skeleton)

PSR-4 compatible PHP package for parsing MavLink telemetry logs.  Inspired by [code-lever/mavlink-log](https://github.com/code-lever/mavlink-log).

tlog-php uses [Semantic Versioning](http://semver.org)

## Dependencies
PHP >= 5.6.3

## Installation

```bash
$ composer install oblogic7/tlog-php
```

## Usage

```php
<?php

use oblogic7\Tlog\File;

$tlog = new File('/path/to/file.tlog');

$entries = $tlog->getEntries();
```

## License

This project is licensed under the [MIT license](LICENSE).