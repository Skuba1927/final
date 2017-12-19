<?php
/**
 * Created by PhpStorm.
 * User: Пользователь
 * Date: 10.12.2017
 * Time: 12:48
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class SecurityController extends Controller
{
    /**
     * @Route("/login", name="login")
     */

    public function loginAction(Request $request)
    {
        $helper = $this->get('security.authentication_utils');

        return $this->render(
            'auth/login.html.twig',
            array(
                'last_username' => $helper->getLastUsername(),
                'error' => $helper->getLastAuthenticationError(),
            )
        );
    }

    /**
     * @Route("/login_check", name="security_login_check")
     */

    public function loginCheckAction()
    {

    }

    /**
     * @Route("/logout", name="logout")
     */
    public function logoutAction()
    {

    }
}