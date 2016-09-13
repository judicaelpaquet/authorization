Authorization
=============

[![Build Status](https://travis-ci.org/judicaelpaquet/authorization.svg?branch=master)](https://travis-ci.org/judicaelpaquet/authorization)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/judicaelpaquet/authorization/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/judicaelpaquet/authorization/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/judicaelpaquet/authorization/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/judicaelpaquet/authorization/?branch=master)
[![Total Downloads](https://poser.pugx.org/judicaelpaquet/authorization/downloads.svg)](https://packagist.org/judicaelpaquet/authorization/venus3)
[![Latest Stable Version](https://poser.pugx.org/judicaelpaquet/authorization/v/stable.svg)](https://packagist.org/packages/judicaelpaquet/authorization)
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/240b0572-6d68-4f92-b60d-f18356b50a96/mini.png)](https://insight.sensiolabs.com/projects/240b0572-6d68-4f92-b60d-f18356b50a96)

This bundle provides various tools to rapidly secure your API with single one annotation

Installation
------------

Add this import in your config.yml

imports:
    - { resource: "../../../vendor/judicaelpaquet/Authorization/Resources/config/services.yml" }

Documentation
-------------

you must add this line to can to use the security annotation :

use JudicaelPaquet\AuthorizationBundle\Annotations\Authorization;

1/ If you want juste indicate that your API is public you must write :
     * @Authorization(access="public")

2/ If you want juste indicate that your API is just allow for the internal call, you have to write :
     * @Authorization(access="private")

3/ If you want create a restriction access by IPs :
     * @Authorization(access="protected", ip="127.0.0.1,192.168.0.1")
     * @Authorization(access="protected", domain="localhost,local.com")

Installation
------------

composer require judicaelpaquet/authorization

License
-------

This bundle is under the MIT license. See the complete license in the bundle:

    Resources/meta/LICENSE