<?php

/**
 * This file is part of the Superdesk Web Publisher Web Renderer Bundle.
 *
 * Copyright 2015 Sourcefabric z.u. and contributors.
 *
 * For the full copyright and license information, please see the
 * AUTHORS and LICENSE files distributed with this source code.
 *
 * @copyright 2015 Sourcefabric z.ú.
 * @license http://www.superdesk.org/license
 */
namespace SWP\Bundle\WebRendererBundle\Routing;

use Symfony\Cmf\Bundle\RoutingBundle\Routing\DynamicRouter;
use SWP\TemplatesSystem\Gimme\Meta\Meta;
use SWP\Bundle\ContentBundle\Document\Article;

class MetaRouter extends DynamicRouter
{
    /**
     * {@inheritdoc}
     */
    public function generate($name, $parameters = array(), $referenceType = false)
    {
        $route = $name;
        if ($name instanceof Meta && $name->getValues() instanceof Article) {
            $parameters['slug'] = $name->getValues()->getSlug();
            $route = $name->getValues()->getRoute();
        }

        return parent::generate($route, $parameters, $referenceType);
    }

    /**
     * {@inheritdoc}
     */
    public function supports($name)
    {
        return $name instanceof Meta;
    }
}
