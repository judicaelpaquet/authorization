<?php

namespace JudicaelPaquet\AuthorizationBundle\tests\Annotations\Driver;

use Doctrine\Common\Annotations\Reader;
use Symfony\Component\HttpKernel\Event\FilterControllerEvent;
use JudicaelPaquet\AuthorizationBundle\Annotations;
use Symfony\Component\HttpFoundation\Response;

class AnnotationDriverTest
{
    /**
     * This event will fire during any controller call
     * @param FilterControllerEvent $event
     */
    public function testOnKernelController()
    {

        $this->assertTrue(false);
    }

    /**
     * automatise the unauthorized
     */
    public static function showUnauthorized()
    {

        $array = array('success' => false);
        $response = new Response(json_encode($array), 401);
        $response->headers->set('Content-Type', 'application/json');
        $response->send();
        exit;
    }
}