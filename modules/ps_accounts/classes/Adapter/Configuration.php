<?php
/**
 * Copyright since 2007 PrestaShop SA and Contributors
 * PrestaShop is an International Registered Trademark & Property of PrestaShop SA
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License version 3.0
 * that is bundled with this package in the file LICENSE.md.
 * It is also available through the world-wide-web at this URL:
 * https://opensource.org/licenses/AFL-3.0
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 * @author    PrestaShop SA and Contributors <contact@prestashop.com>
 * @copyright Since 2007 PrestaShop SA and Contributors
 * @license   https://opensource.org/licenses/AFL-3.0 Academic Free License version 3.0
 */

namespace PrestaShop\Module\PsAccounts\Adapter;

class Configuration
{
    const PSX_UUID_V4 = 'PSX_UUID_V4';

    // PS Shop Account
    const PS_ACCOUNTS_FIREBASE_ID_TOKEN = 'PS_ACCOUNTS_FIREBASE_ID_TOKEN';
    const PS_ACCOUNTS_FIREBASE_REFRESH_TOKEN = 'PS_ACCOUNTS_FIREBASE_REFRESH_TOKEN';
    const PS_ACCOUNTS_FIREBASE_REFRESH_TOKEN_FAILURE = 'PS_ACCOUNTS_FIREBASE_REFRESH_TOKEN_FAILURE';

    // PS User Account
    const PS_ACCOUNTS_FIREBASE_EMAIL = 'PS_ACCOUNTS_FIREBASE_EMAIL';
    const PS_ACCOUNTS_FIREBASE_EMAIL_IS_VERIFIED = 'PS_ACCOUNTS_FIREBASE_EMAIL_IS_VERIFIED';
    const PS_ACCOUNTS_USER_FIREBASE_UUID = 'PS_ACCOUNTS_USER_FIREBASE_UUID';
    const PS_ACCOUNTS_USER_FIREBASE_ID_TOKEN = 'PS_ACCOUNTS_USER_FIREBASE_ID_TOKEN';
    const PS_ACCOUNTS_USER_FIREBASE_REFRESH_TOKEN = 'PS_ACCOUNTS_USER_FIREBASE_REFRESH_TOKEN';
    const PS_ACCOUNTS_USER_FIREBASE_REFRESH_TOKEN_FAILURE = 'PS_ACCOUNTS_USER_FIREBASE_REFRESH_TOKEN_FAILURE';
    const PS_ACCOUNTS_SHOP_UNLINKED_AUTO = 'PS_ACCOUNTS_SHOP_UNLINKED_AUTO';

    // PS Backend User
    const PS_ACCOUNTS_EMPLOYEE_ID = 'PS_ACCOUNTS_EMPLOYEE_ID';

    // API keys
    const PS_ACCOUNTS_RSA_PUBLIC_KEY = 'PS_ACCOUNTS_RSA_PUBLIC_KEY';
    const PS_ACCOUNTS_RSA_PRIVATE_KEY = 'PS_ACCOUNTS_RSA_PRIVATE_KEY';
    const PS_ACCOUNTS_RSA_SIGN_DATA = 'PS_ACCOUNTS_RSA_SIGN_DATA';

    // /!\ Compat with ps_checkout
    const PS_CHECKOUT_SHOP_UUID_V4 = 'PS_CHECKOUT_SHOP_UUID_V4';
    const PS_PSX_FIREBASE_ID_TOKEN = 'PS_PSX_FIREBASE_ID_TOKEN';
    const PS_PSX_FIREBASE_REFRESH_TOKEN = 'PS_PSX_FIREBASE_REFRESH_TOKEN';
    const PS_PSX_FIREBASE_REFRESH_DATE = 'PS_PSX_FIREBASE_REFRESH_DATE';
    const PS_PSX_FIREBASE_EMAIL = 'PS_PSX_FIREBASE_EMAIL';

    /**
     * @var int
     */
    private $idShop = null;

    /**
     * @var int
     */
    private $idShopGroup = null;

    /**
     * @var int
     */
    private $idLang = null;

    /**
     * Configuration constructor.
     *
     * @param \Context $context
     */
    public function __construct(\Context $context)
    {
        $this->setIdShop((int) $context->shop->id);
    }

    /**
     * @return int
     */
    public function getIdShop()
    {
        return $this->idShop;
    }

    /**
     * @param int $idShop
     *
     * @return void
     */
    public function setIdShop($idShop)
    {
        $this->idShop = $idShop;
    }

    /**
     * @return int
     */
    public function getIdShopGroup()
    {
        return $this->idShopGroup;
    }

    /**
     * @param int $idShopGroup
     *
     * @return void
     */
    public function setIdShopGroup($idShopGroup)
    {
        $this->idShopGroup = $idShopGroup;
    }

    /**
     * @return int
     */
    public function getIdLang()
    {
        return $this->idLang;
    }

    /**
     * @param int $idLang
     *
     * @return void
     */
    public function setIdLang($idLang)
    {
        $this->idLang = $idLang;
    }

    /**
     * @param string $key
     * @param string|bool $default
     *
     * @return mixed
     */
    public function get($key, $default = false)
    {
        return $this->getRaw($key, $this->idLang, $this->idShopGroup, $this->idShop, $default);
    }

    /**
     * @param string $key
     * @param int|null $idLang
     * @param int|null $idShopGroup
     * @param int|null $idShop
     * @param string|bool $default
     *
     * @return mixed
     */
    public function getRaw($key, $idLang = null, $idShopGroup = null, $idShop = null, $default = false)
    {
        $value = \Configuration::get($key, $idLang, $idShopGroup, $idShop);

        return $value ?: ($default !== false ? $default : $value);
    }

    /**
     * @param string $key
     * @param string|array $values
     * @param bool $html
     *
     * @return mixed
     */
    public function set($key, $values, $html = false)
    {
        return $this->setRaw($key, $values, $html, $this->idShopGroup, $this->idShop);
    }

    /**
     * @param string $key
     * @param string|array $values
     * @param bool $html
     * @param int|null $idShopGroup
     * @param int|null $idShop
     *
     * @return mixed
     */
    public function setRaw($key, $values, $html = false, $idShopGroup = null, $idShop = null)
    {
        return \Configuration::updateValue($key, $values, $html, $idShopGroup, $idShop);
    }

    /**
     * @param string $key
     * @param int|null $idShopGroup
     * @param int|null $idShop
     * @param string|bool $default
     *
     * @return mixed
     *
     * @throws \PrestaShopDatabaseException
     * @throws \PrestaShopException
     */
    public function getUncached($key, $idShopGroup = null, $idShop = null, $default = false)
    {
        $id = \Configuration::getIdByName($key, $idShopGroup, $idShop);
        if ($id > 0) {
            $found = (new \Configuration($id));
            $found->clearCache();

            return $found->value;
        }

        return $default;
    }
}
