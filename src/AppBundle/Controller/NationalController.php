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
    public $sentence = "Национального Банка";
    /**
     * @Route("/national", name="National Bank")
     * @param Request $request
     * @return mixed
     */

    public function showAction(Request $request)
    {
        $national = new NationalApi();
        $national->request();
        //$national->arrayForDB();

        $arr = '[
            [11, 7.5, 0.48, 26.55, 31.87],
            [12,  7.8, 0.55, 26.85, 31.99],
            [13, 7.96, 0.67, 26.98, 32.47],
            [14,  8.08, 0.53, 27.65, 32.67],
            [15,  7.88, 0.45, 27.55, 32.97],
            [16, 7.67, 0.43, 27.87, 33.23],
            [17,  7.54, 0.41, 28.07, 33.67],
            ]';

        return $this->render('default/Api/national.html.twig',
            [
                'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
                'api' => $national->printRate(),
                'sentence' => $this->sentence,
                'arr' => $arr,
            ]
        );
        //return $this->render('default/index.html.twig', array('character' => $characters));
    }
}