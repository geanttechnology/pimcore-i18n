<?php

namespace I18nBundle\Twig\Extension;

use I18nBundle\ContextResolver\Context\AbstractContext;
use I18nBundle\Configuration\Configuration;

class I18nExtension extends \Twig_Extension
{
    /**
     * @var Configuration
     */
    var $configuration;

    /**
     * @var AbstractContext
     */
    protected $context;

    /**
     * CategoriesExtension constructor.
     *
     * @param Configuration $configuration
     */
    public function __construct(Configuration $configuration, AbstractContext $context)
    {
        $this->configuration = $configuration;
        $this->context = $context;

    }

    /**
     * {@inheritdoc}
     */
    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction('i18n_country', [$this, 'getCountryInfo']),
            new \Twig_SimpleFunction('i18n_language', [$this, 'getLanguageInfo'])
        ];
    }

    /**
     * @param string $method
     * @param null   $options
     *
     * @return mixed
     */
    public function getCountryInfo($method = '', $options = NULL)
    {
        return call_user_func_array([$this->context, $method], [$options]);
    }

    /**
     * @param string $method
     * @param null   $options
     *
     * @return mixed
     */
    public function getLanguageInfo($method = '', $options = NULL)
    {
        return call_user_func_array([$this->context, $method], [$options]);
    }
}