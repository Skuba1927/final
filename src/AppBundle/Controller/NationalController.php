<?php
/**
 * Created by PhpStorm.
 * User: Пользователь
 * Date: 12.12.2017
 * Time: 20:25
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Utils\NationalApi;

class NationalController extends Controller
{
    /**
     * @Route("/national", name="National Bank")
     * @param Request $request
     * @return mixed
     */

    public function showAction(Request $request)
    {
        $national = new NationalApi();
        $national->request();
        return $this->render('default/Api/national.html.twig',
            [
                'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
                'api' => $national->getResponse(),
            ]
        );
        //return $this->render('default/index.html.twig', array('character' => $characters));
    }
}