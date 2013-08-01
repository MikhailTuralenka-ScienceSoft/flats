<?php

namespace Micks\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Route("/admin")
 */
class SecurityController extends Controller
{
    /**
     * @Route("/", name="_micks_admin_index")
     */
    public function indexAction()
    {
        $url = $this->get('router')->generate('sonata_admin_dashboard');
        return $this->redirect($url);
    }

    /**
     * @Route("/login", name="_micks_admin_login")
     * @Template("MicksAppBundle:Security:login.html.twig")
     */
    public function loginAction()
    {
        if ($this->get('request')->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
            $error = $this->get('request')->attributes->get(SecurityContext::AUTHENTICATION_ERROR);
        } else {
            $error = $this->get('request')->getSession()->get(SecurityContext::AUTHENTICATION_ERROR);
        }
 
        return  array(
            'last_username' => $this->get('request')->getSession()->get(SecurityContext::LAST_USERNAME),
            'error' => $error
        );
    }
    
    /**
     * @Route("/login_check", name="_micks_admin_check")
     */
    public function securityCheckAction()
    {
        // The security layer will intercept this request
    }

    /**
     * @Route("/logout", name="_micks_admin_logout")
     */
    public function logoutAction()
    {
        // The security layer will intercept this request
        return  new Response();
    }
}
