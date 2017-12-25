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
    public $sentence = " Приват Банка";
    /**
     * @Route("/private", name="api")
     * @param Request $request
     * @return mixed
     */

    public function showAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $obj = new PrivatApi($em);
        $obj->request();
        $array = $obj->arrayForDB();
        //$obj->printRate();

        $convertUSD  = '';
        if ($request->get('convertView') == 'buy') {
            if ($request->get('convert-usd') && !empty($request->get('convert-usd'))) {
                $convertUSD = $obj->convert($request->get('convert-usd'), $array['usd_buy']);
            }
        } elseif ($request->get('convertView') == 'sale') {
            if ($request->get('convert-usd') && !empty($request->get('convert-usd'))) {
                $convertUSD = $obj->convert($request->get('convert-usd'), $array['usd_sale']);
            }
        }

        $convertRUB  = '';
        if ($request->get('convertView') == 'buy') {
            if ($request->get('convert-rub') && !empty($request->get('convert-rub'))) {
                $convertRUB = $obj->convert($request->get('convert-rub'), $array['rur_buy']);
            }
        } elseif ($request->get('convertView') == 'sale') {
            if ($request->get('convert-rub') && !empty($request->get('convert-rub'))) {
                $convertRUB = $obj->convert($request->get('convert-rub'), $array['rur_sale']);
            }
        }

        $convertEUR  = '';
        if ($request->get('convertView') == 'buy') {
            if ($request->get('convert-eur') && !empty($request->get('convert-eur'))) {
                $convertEUR = $obj->convert($request->get('convert-eur'), $array['euro_buy']);
            }
        } elseif ($request->get('convertView') == 'sale') {
            if ($request->get('convert-eur') && !empty($request->get('convert-eur'))) {
                $convertEUR = $obj->convert($request->get('convert-eur'), $array['euro_sale']);
            }
        }

        $convertBtn  = '';
        if ($request->get('convertView') == 'buy') {
            if ($request->get('convert-btn') && !empty($request->get('convert-btn'))) {
                $convertBtn = $obj->convert($request->get('convert-btn'), $array['btn_buy']);
            }
        } elseif ($request->get('convertView') == 'sale') {
            if ($request->get('convert-btn') && !empty($request->get('convert-btn'))) {
                $convertBtn = $obj->convert($request->get('convert-btn'), $array['btn_sale']);
            }
        }

        $successfull = null;
        if ($request->get('email') && $request->get('name')) {
            $bitcoin->registration($request->get('email'),$request->get('name'));
            $successfull = 'Yes';
        }

        $arr = '[
            [11, 26.55, 31.87],
            [12, 26.85, 31.99],
            [13, 26.98, 32.47],
            [14,  27.65, 32.67],
            [15,  27.55, 32.97],
            [16, 27.87, 33.23],
            [17, 28.07, 33.67],
            ]';
        $arrRub = '[
            [11,  0.48],
            [12,   0.55],
            [13,  0.67],
            [14,   0.53],
            [15,   0.45],
            [16,  0.43],
            [17,   0.41]
        ]';

        return $this->render('default/Api/api.html.twig',
            [
                'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
                'api' => $obj->getResponse(),
                'sentence' => $this->sentence,
                'arr' => $arr,
                'arrRub' => $arrRub,
                'convertUSD' => $convertUSD,
                'convertBtn' => $convertBtn,
                'convertEUR' => $convertEUR,
                'convertRUB' => $convertRUB,
                'get' => $_GET,
                'successfull' => $successfull,
            ]
        );
        //return $this->render('default/index.html.twig', array('character' => $characters));
    }
}