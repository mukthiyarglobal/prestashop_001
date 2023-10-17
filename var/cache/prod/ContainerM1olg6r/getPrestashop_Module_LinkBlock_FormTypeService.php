<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the public 'prestashop.module.link_block.form_type' shared service.

return $this->services['prestashop.module.link_block.form_type'] = new \PrestaShop\Module\LinkList\Form\Type\LinkBlockType(${($_ = isset($this->services['translator.default']) ? $this->services['translator.default'] : $this->getTranslator_DefaultService()) && false ?: '_'}, ${($_ = isset($this->services['prestashop.adapter.legacy.context']) ? $this->services['prestashop.adapter.legacy.context'] : $this->getPrestashop_Adapter_Legacy_ContextService()) && false ?: '_'}->getLanguages(), ${($_ = isset($this->services['prestashop.module.link_block.choice_provider.hook']) ? $this->services['prestashop.module.link_block.choice_provider.hook'] : $this->load('getPrestashop_Module_LinkBlock_ChoiceProvider_HookService.php')) && false ?: '_'}->getChoices(), ${($_ = isset($this->services['prestashop.module.link_block.choice_provider.cms_page']) ? $this->services['prestashop.module.link_block.choice_provider.cms_page'] : $this->load('getPrestashop_Module_LinkBlock_ChoiceProvider_CmsPageService.php')) && false ?: '_'}->getChoices(), ${($_ = isset($this->services['prestashop.module.link_block.choice_provider.product_page']) ? $this->services['prestashop.module.link_block.choice_provider.product_page'] : $this->load('getPrestashop_Module_LinkBlock_ChoiceProvider_ProductPageService.php')) && false ?: '_'}->getChoices(), ${($_ = isset($this->services['prestashop.module.link_block.choice_provider.static_page']) ? $this->services['prestashop.module.link_block.choice_provider.static_page'] : $this->load('getPrestashop_Module_LinkBlock_ChoiceProvider_StaticPageService.php')) && false ?: '_'}->getChoices(), ${($_ = isset($this->services['prestashop.module.link_block.choice_provider.category']) ? $this->services['prestashop.module.link_block.choice_provider.category'] : $this->load('getPrestashop_Module_LinkBlock_ChoiceProvider_CategoryService.php')) && false ?: '_'}->getChoices(), ${($_ = isset($this->services['prestashop.adapter.feature.multistore']) ? $this->services['prestashop.adapter.feature.multistore'] : $this->load('getPrestashop_Adapter_Feature_MultistoreService.php')) && false ?: '_'}->isUsed());
