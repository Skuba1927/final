<?php
/**
 * Created by PhpStorm.
 * User: Пользователь
 * Date: 12.12.2017
 * Time: 20:32
 */

namespace AppBundle\Utils;

use AppBundle\Entity\National;
use Symfony\Bundle\FrameworkBundle\Controller\ControllerTrait;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class NationalApi
{
    use ControllerTrait;
    const API_URL = 'https://bank.gov.ua/NBUStatService/v1/statdirectory/exchange?json';
    public $currency = 'National Bank';
    private $response;

    private function setResponse($response)
    {
        return $this->response = $response;
    }

    public function getResponse()
    {
        return $this->response;
    }

    public function request()
    {
        return $this->setResponse(json_decode(file_get_contents(self::API_URL)));
    }

    private function arrayForDB() :array
    {
        $national = [];
        foreach ($this->response as  $value) {
            switch ($value->cc) {
                case 'USD' :
                    $national['USD'] = $value->rate;
                    break;
                case 'EUR' :
                    $national['EUR'] = $value->rate;
                    break;
                case 'PLN' :
                    $national['PLN'] = $value->rate;
                    break;
                case 'RUB' :
                    $national['RUB'] = $value->rate;
                    break;
            }
        }
        return $national;
    }

    public function recordToDB()
    {
        $array = $this->arrayForDB();
        $em = $this->getDoctrine()->getManager();

        $national = new National();
        $national->setEur($array['EUR']);
        $national->setUsd($array['USD']);
        $national->setPln($array['PLN']);
        $national->setRub($array['RUB']);

        $em->persist($national);
        $em->flush();
    }
}
