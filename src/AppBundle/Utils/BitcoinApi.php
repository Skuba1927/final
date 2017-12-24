<?php
/**
 * Created by PhpStorm.
 * User: Пользователь
 * Date: 12.12.2017
 * Time: 20:14
 */

namespace AppBundle\Utils;

use AppBundle\Controller\BtnController;
use AppBundle\Entity\Bitcoin;
use Symfony\Bundle\FrameworkBundle\Controller\ControllerTrait;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BitcoinApi extends Controller
{
    use ControllerTrait;
    const API_URL = 'https://blockchain.info/ru/ticker';
    public $currency = 'Bitcoin';
    private $response;

    private function setResponse($response)
    {
        return $this->response = $response->USD;
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
         return $array = [
             'buy' => $this->response->buy,
             'sell' => $this->response->sell,
         ];
    }

    public function recordToDB()
    {
        $array = $this->arrayForDB();
        $em = $this->getDoctrine()->getManager();

        $bitcoin = new Bitcoin();
        $bitcoin->setBuy($array['buy']);
        $bitcoin->setSell($array['sell']);

        $em->persist($bitcoin);
        $em->flush();
    }

    public function getMultiplication ($number)
    {
        return $number * $this->response->buy;
    }

    private function compareSell() {
        //получить вчерашнюю стоимость
        if ($this->response->sell > $yesterday) {
            $string = " продажа ввыросла на ";
            $diff = $this->response->sell - $yesterday;
        } else {
            $string = " продажа упала на ";
            $diff = $yesterday - $this->response->sell;
        }
        return $string.$diff;
    }

    private function compareBuy() {
        //получить вчерашнюю стоимость
        if ($this->response->buy > $yesterday) {
            $string = " покупка ввыросла на ";
            $diff = $this->response->buy - $yesterday;
        } else {
            $string = " покупка упала на ";
            $diff = $yesterday - $this->response->buy;
        }
        return $string.$diff;
    }

    public function joinCompares()
    {
        return $this->compareBuy().", ".$this->compareSell().".";
    }
}

