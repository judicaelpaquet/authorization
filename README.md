Authorization
=============

This bundle provides various tools to rapidly secure your API with single one annotation


Documentation
-------------

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