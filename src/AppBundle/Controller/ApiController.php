<?php
/**
 * Created by PhpStorm.
 * User: Пользователь
 * Date: 30.11.2017
 * Time: 20:40
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Utils\PrivatApi;

class ApiController extends Controller
{

    /**
     * @Route("/api", name="api")
     * @param Request $request
     * @return mixed
     */

    public function showAction(Request $request)
    {
        $obj = new PrivatApi();
        $obj->request();
        $obj->printRate();
        return $this->render('default/Api/api.html.twig',
            [
                'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
                'api' => $obj->getResponse(),
            ]
        );
        //return $this->render('default/index.html.twig', array('character' => $characters));
    }
}