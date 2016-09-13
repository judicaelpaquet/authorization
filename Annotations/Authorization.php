<?php

/*
 * This file is part of the Batiwiz Authentification package.
 *
 * (c) Judicael Paquet <judicael.paquet@batiwiz.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace JudicaelPaquet\AuthorizationBundle\Annotations;

/**
 * @Annotation
 */
class Authorization
{
    public $access;

    public $ip;

    public $domain;
}