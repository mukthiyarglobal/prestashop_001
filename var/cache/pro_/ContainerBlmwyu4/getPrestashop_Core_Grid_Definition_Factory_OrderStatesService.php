<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the public 'prestashop.core.grid.definition.factory.order_states' shared service.

$this->services['prestashop.core.grid.definition.factory.order_states'] = $instance = new \PrestaShop\PrestaShop\Core\Grid\Definition\Factory\OrderStatesGridDefinitionFactory(${($_ = isset($this->services['prestashop.core.hook.dispatcher']) ? $this->services['prestashop.core.hook.dispatcher'] : $this->getPrestashop_Core_Hook_DispatcherService()) && false ?: '_'});

$instance->setTranslator(${($_ = isset($this->services['translator.default']) ? $this->services['translator.default'] : $this->getTranslator_DefaultService()) && false ?: '_'});

return $instance;
