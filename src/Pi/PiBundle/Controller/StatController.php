<?php

namespace Pi\PiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Pi\PiBundle\Entity\Contact;
use Pi\PiBundle\Entity\Newslettre;
use Symfony\Component\HttpFoundation\Request;
use Pi\PiBundle\Form\ContactType;
use Pi\PiBundle\Form\NewslettreType;
use Symfony\Component\HttpFoundation\Session\Session;
use \Pi\PiBundle\Entity\Reservation;
use Pi\PiBundle\Entity\Client;
use Pi\PiBundle\Entity\Avis;
use Ob\HighchartsBundle\Highcharts\Highchart;

class StatController extends Controller {

    public function StatAction() {
        $ob = new Highchart();
        $ob->chart->renderTo('linechart');
        $ob->title->text('Deal le mieux noté');
        $ob->plotOptions->pie(array(
            'allowPointSelect' => true,
            'cursor' => 'pointer',
            'dataLabels' => array('enabled' => false),
            'showInLegend' => true
        ));
        $em = $this->getDoctrine()->getEntityManager();
        $query = $em->createQuery('SELECT AVG(p.note) as Note,c.nom as Nom FROM PiPiBundle:Avis p JOIN p.dealRef c group by p.dealRef ')
                    ->setMaxResults(4);
        
        $resultat = $query->getResult();
        $data = array();
        foreach ($resultat as $values)
        {
            $a = array($values['Nom'],floatval($values['Note']));
            array_push($data, $a);
        }
        
        $ob->series(array(array('type' => 'pie', 'name' => 'Deal', 'data' => $data)));
        return $this->render('PiPiBundle:Stat:Stat.html.twig', array(
            'chart' => $ob
        ));
    }

}
