<?php
/**
 * ZnZendSession
 *
 * @author Zion Ng <zion@intzone.com>
 * @link   http://github.com/zionsg/ZnZendSession for canonical source repository
 */

namespace ZnZendSession;

use Zend\EventManager\EventInterface;
use Zend\ModuleManager\Feature\BootstrapListenerInterface;
use Zend\Session\SessionManager;

class Module implements BootstrapListenerInterface
{
    /**
     * Defined by BootstrapListenerInterface; Listen to the bootstrap event
     *
     * @param  EventInterface $e
     * @return array
     */
    public function onBootstrap(EventInterface $e)
    {
        $sm = $e->getApplication()->getServiceManager();

        if ($sm->has('Router') && $sm->has('Request')) {
            $matchedRoute = $sm->get('Router')->match($sm->get('Request'));
            if ($matchedRoute) {
                $namespace = explode('\\', $matchedRoute->getParam('controller'));
                $module = strtolower($namespace[0]);

                $sessionManager = new SessionManager();
                $sessionManager->setName($module);
                $sessionManager->start();
            }
        }
    }
}
