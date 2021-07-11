<?php

namespace Umbrella\CoreBundle\Menu\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;
use Umbrella\CoreBundle\Menu\MenuResolver;

class MenuExtension extends AbstractExtension
{
    private MenuResolver $resolver;

    /**
     * MenuExtension constructor.
     */
    public function __construct(MenuResolver $resolver)
    {
        $this->resolver = $resolver;
    }

    /**
     * {@inheritdoc}
     */
    public function getFunctions()
    {
        return [
            new TwigFunction('menu_render', [$this->resolver, 'render'], ['is_safe' => ['html']]),

            new TwigFunction('breadcrumb', [$this->resolver, 'resolveBreadcrumb']),
            new TwigFunction('breadcrumb_render', [$this->resolver, 'renderBreadcrumb'], ['is_safe' => ['html']]),
        ];
    }
}
