<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private 'ps_checkout.cache.filesystem.paypal.capture' shared service.

return $this->services['ps_checkout.cache.filesystem.paypal.capture'] = new \Symfony\Component\Cache\Simple\FilesystemCache('paypal-capture', 3600, ${($_ = isset($this->services['ps_checkout.cache.directory']) ? $this->services['ps_checkout.cache.directory'] : ($this->services['ps_checkout.cache.directory'] = new \PrestaShop\ModuleLibCacheDirectoryProvider\Cache\CacheDirectoryProvider('1.7.8.0', $this->targetDirs[3], false))) && false ?: '_'}->getPath());