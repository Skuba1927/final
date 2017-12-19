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

class ListController extends Controller
{
    /**
     * @Route("/list", name="list")
     * @param Request $request
     * @return mixed
     */
    public function showAction(Request $request)
    {
        $characters = [
            'Daenerys Targaryen' => 'Emilia Clarke',
            'Jon Snow'           => 'Kit Harington',
            'Arya Stark'         => 'Maisie Williams',
            'Melisandre'         => 'Carice van Houten',
            'Khal Drogo'         => 'Jason Momoa',
            'Tyrion Lannister'   => 'Peter Dinklage',
            'Ramsay Bolton'      => 'Iwan Rheon',
            'Petyr Baelish'      => 'Aidan Gillen',
            'Brienne of Tarth'   => 'Gwendoline Christie',
            'Lord Varys'         => 'Conleth Hill'
        ];

        return $this->render('default/List/list.html.twig',
            [
                'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
                'character' => $characters,
            ]
        );
        //return $this->render('default/index.html.twig', array('character' => $characters));
    }
}