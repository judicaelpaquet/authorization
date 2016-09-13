<?php

namespace JudicaelPaquet\AuthorizationBundle\Annotations\Driver;

use Doctrine\Common\Annotations\Reader;
use Symfony\Component\HttpKernel\Event\FilterControllerEvent;
use JudicaelPaquet\AuthorizationBundle\Annotations;
use Symfony\Component\HttpFoundation\Response;

class AnnotationDriver
{
    /**
     * @var object
     */
    private $reader;

    /**
     * AnnotationDriver constructor.
     * @param $reader
     */
    public function __construct($reader)
    {
        $this->reader = $reader;//get annotations reader
    }

    /**
     * This event will fire during any controller call
     * @param FilterControllerEvent $event
     */
    public function onKernelController(FilterControllerEvent $event)
    {
        if (!is_array($controller = $event->getController())) { //return if no controller
            return;
        }

        $object = new \ReflectionObject($controller[0]);
        $method = $object->getMethod($controller[1]);

        foreach ($this->reader->getMethodAnnotations($method) as $configuration) { //Start of annotations reading

            if (isset($configuration->access)) { //Found annotation @Authorization(access="public")

                if ($configuration->access === "private" && $_SERVER["REMOTE_ADDR"] !== '127.0.0.1'
                    && $_SERVER["REMOTE_ADDR"] !== '::1' && $_SERVER["SERVER_NAME"] !== 'localhost') {

                    self::showUnauthorized();
                }
                else if ($configuration->access === "protected" && isset($configuration->ip)) { //Found annotation @Authorization(access="protected", ip="127.0.0.1,192.168.0.1")

                    if (!in_array($_SERVER["REMOTE_ADDR"], explode(",", $configuration->ip))) {

                        self::showUnauthorized();
                    }
                }
                else if ($configuration->access === "protected" && isset($configuration->domain)) { //Found annotation @Authorization(access="protected", domain="localhost,local.com")

                    if (!in_array($_SERVER["SERVER_NAME"], explode(",", $configuration->domain))) {

                        self::showUnauthorized();
                    }
                }
            }
        }
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
    }
}