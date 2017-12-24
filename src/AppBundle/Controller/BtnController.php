<?php
/**
 * Created by PhpStorm.
 * User: Пользователь
 * Date: 10.12.2017
 * Time: 19:46
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Utils\BitcoinApi;


class BtnController extends Controller
{
    public $sentence = "Биткоина";
    /**
     * @Route("/bitcoin", name="bitcoin")
     * @param Request $request
     * @return mixed
     */

    public function showAction(Request $request)
    {

      $bitcoin_multiplication  = '';
        if ($request->get('bitcoin_multiplication') && !empty($request->get('bitcoin_multiplication'))) {
            $bitcoin_multiplication = $request->get('bitcoin_multiplication');
        }

       

        $em = $this->getDoctrine()->getManager();

        $bitcoin = new BitcoinApi($em);
        $bitcoin->request();
        //$bitcoin->recordToDB();
        $arr =  '[
            [11, 19815.59, 19811.71],
            [12,  18811.71, 18611.71],
            [13, 18311.71, 18271.71],
            [14,  17811.71, 17811.71],
            [15,  16811.71, 16711.71],
            [16, 16715.71, 16645.71],
            [17,   15777.71, 15676.71],
            ]';
        return $this->render('default/Api/btn.html.twig',
            [
                'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
                'api' => $bitcoin->getResponse(),
                'arr' => $arr,
                'multiplication' => $bitcoin_multiplication,
                'sentence' => $this->sentence,
            ]
        );
        //return $this->render('default/index.html.twig', array('character' => $characters));
    }
}
