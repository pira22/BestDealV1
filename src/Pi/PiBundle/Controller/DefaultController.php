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
use Pi\PiBundle\Entity\Panier;

class DefaultController extends Controller {

    public function indexAction() {
        $news = new Newslettre();
        $form = $this->createForm(new NewslettreType(), $news);
        $request = $this->getRequest();
        $a = $this->getDoctrine()->getManager();
        if ($request->isXmlHttpRequest()) {
            $form->handleRequest($request);
            if ($form->isValid()) {
                $news = $form->getData();

                $a->persist($news);
                $a->flush();
            }
        }
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery('SELECT p FROM PiPiBundle:Dealcourant p JOIN p.dealRef c  ORDER BY p.dealRef DESC')
                ->setMaxResults(6);
        $deal = $query->getResult();
        $query2 = $em->createQuery('SELECT p FROM PiPiBundle:Anciendeal p JOIN p.dealRef c  ORDER BY p.dealRef DESC')
                ->setMaxResults(6);
        $anciendeal = $query2->getResult();
        $query3 = $em->createQuery('SELECT p FROM PiPiBundle:Nouveaudeal p JOIN p.dealRef c  ORDER BY p.dealRef DESC')
                ->setMaxResults(6);
        $nouveaudeal = $query3->getResult();
        $query1 = $em->createQuery('SELECT p FROM PiPiBundle:Actualite p  ORDER BY p.id DESC')
                ->setMaxResults(2);
        $act = $query1->getResult();
        $query4 = $em->createQuery('SELECT p FROM PiPiBundle:Slide p JOIN p.dealRef c  ORDER BY p.dealRef ASC')
                ->setMaxResults(3);
        $slide = $query4->getResult();

        return $this->render('PiPiBundle:Default:index.html.twig', array('deal' => $deal,
                    'form' => $form->createView(),
                    'act' => $act,
                    'adeal' => $anciendeal,
                    'ndeal' => $nouveaudeal,
                    'slide' => $slide
        ));
    }

    public function contactAction() {
        $contact = new Contact;
        $form = $this->createForm(new ContactType(), $contact);
        $request = $this->getRequest();
        if ($request->isXmlHttpRequest()) {
            $form->bind($request);
            if ($form->isValid()) {
                $contact = $form->getData();
                $em = $this->getDoctrine()->getManager();
                $em->persist($contact);
                $em->flush();
            }
        }
        return $this->render('PiPiBundle:Default:Contact.html.twig', array('form' => $form->createView()));
    }

    public function NoteDealAction($id) {
        $em = $this->getDoctrine()->getManager();
        $resultat = $em->createQuery('SELECT AVG(p.note)as Note FROM PiPiBundle:Avis p where p.dealRef= ' . $id . ' group by p.dealRef ');
        $note = $resultat->getResult();
        $resultat1 = $em->createQuery('SELECT Count(p.note)as Note FROM PiPiBundle:Avis p where p.dealRef= ' . $id . '  ');
        $nbr = $resultat1->getResult();
        return $this->render('PiPiBundle:Default:Note.html.twig', array('note' => $note, 'nbr' => $nbr));
    }

    public function NoteDuDealAction($id) {
        $em = $this->getDoctrine()->getManager();
        $resultat = $em->getRepository('PiPiBundle:Avis')
                ->find($id);
        return $this->render('PiPiBundle:Default:NoteDuDeal.html.twig', array('avi' => $resultat));
    }

    public function PanierAction($id) {
        $session = new Session();
        $formpanier = $this->createFormBuilder()
                ->add('id', 'hidden')
                ->getForm();
        $request = $this->getRequest();
        $a = $this->getDoctrine()->getManager();
        $panier = new Panier();
        if ($request->isXmlHttpRequest()) {

            $formpanier->bind($request);
            if ($formpanier->isValid()) {

                $id = $formpanier->get('id')->getData();

                $resultat = $a->getRepository('PiPiBundle:Deal')->find($id);



                if ($session->has('liste') != true) {
                    /*                     * ** Génèrer clé unique **** */
                    $mot = mt_rand(1, 2000);
                    $key = md5('eefkkef' . $mot . 'okokojjj');

                    $session->set('liste', $key);

                    $panier->setDealRef($resultat);
                    $panier->setCle($key);
                    $panier->setQuantite(1);
                    $a->persist($panier);
                    $a->flush();
                    $res = $a->getRepository('PiPiBundle:Panier')->findBy(array('cle' => $key));
                    $snom = array();
                    $squantite = array();
                    $simage = array();
                    $sparix = array();
                    $stauxred = array();
                    $iddeal = array();
                    foreach ($res as $value) {
                        $quantite = $value->getQuantite();
                        $nom = $value->getDealRef()->getNom();
                        $image = $value->getDealRef()->getChemin();
                        $prix = $value->getDealRef()->getPrix1();
                        $tauxred = $value->getDealRef()->getTauxred();
                        $ideal = $value->getDealRef()->getRef();
                        array_push($snom, $nom);
                        array_push($squantite, $quantite);
                        array_push($simage, $image);
                        array_push($sparix, $prix);
                        array_push($stauxred, $tauxred);
                        array_push($iddeal, $ideal);
                    }
                    $session->set('nom', $snom);
                    $session->set('quantite', $squantite);
                    $session->set('image', $simage);
                    $session->set('prix', $sparix);
                    $session->set('red', $stauxred);
                    $session->set('id', $iddeal);
                    return $this->render('PiPiBundle:Default:refresh.html.twig');
                } else {
                    $key = $session->get('liste');
                    $qres = $a->getRepository('PiPiBundle:Panier')->findBy(array('cle' => $key, 'dealRef' => $id));
                    if ($qres) {

                        $panier = $qres;

                        $inc = $panier[0]->getQuantite() + 1;
                        $panier[0]->setQuantite($inc);
                        $a->flush();
                        $res = $a->getRepository('PiPiBundle:Panier')->findBy(array('cle' => $key));
                        $snom = array();
                        $squantite = array();
                        $simage = array();
                        $sparix = array();
                        $stauxred = array();
                        $iddeal = array();
                    foreach ($res as $value) {
                        $quantite = $value->getQuantite();
                        $nom = $value->getDealRef()->getNom();
                        $image = $value->getDealRef()->getChemin();
                        $prix = $value->getDealRef()->getPrix1();
                        $tauxred = $value->getDealRef()->getTauxred();
                        $ideal = $value->getDealRef()->getRef();
                        array_push($snom, $nom);
                        array_push($squantite, $quantite);
                        array_push($simage, $image);
                        array_push($sparix, $prix);
                        array_push($stauxred, $tauxred);
                        array_push($iddeal, $ideal);
                    }
                    $session->set('nom', $snom);
                    $session->set('quantite', $squantite);
                    $session->set('image', $simage);
                    $session->set('prix', $sparix);
                    $session->set('red', $stauxred);
                    $session->set('id', $iddeal);
                        return $this->render('PiPiBundle:Default:refresh.html.twig');
                    } else {
                        $key = $session->get('liste');

                        $panier->setDealRef($resultat);
                        $panier->setcle($key);
                        $panier->setQuantite(1);
                        $a->persist($panier);
                        $a->flush();
                        $res = $a->getRepository('PiPiBundle:Panier')->findBy(array('cle' => $key));
                        $snom = array();
                        $squantite = array();
                        $simage = array();
                        $sparix = array();
                        $stauxred = array();
                         $iddeal = array();
                    foreach ($res as $value) {
                        $quantite = $value->getQuantite();
                        $nom = $value->getDealRef()->getNom();
                        $image = $value->getDealRef()->getChemin();
                        $prix = $value->getDealRef()->getPrix1();
                        $tauxred = $value->getDealRef()->getTauxred();
                        $ideal = $value->getDealRef()->getRef();
                        array_push($snom, $nom);
                        array_push($squantite, $quantite);
                        array_push($simage, $image);
                        array_push($sparix, $prix);
                        array_push($stauxred, $tauxred);
                        array_push($iddeal, $ideal);
                    }
                    $session->set('nom', $snom);
                    $session->set('quantite', $squantite);
                    $session->set('image', $simage);
                    $session->set('prix', $sparix);
                    $session->set('red', $stauxred);
                    $session->set('id', $iddeal);
                        return $this->render('PiPiBundle:Default:refresh.html.twig');
                    }


                    return $this->render('PiPiBundle:Default:panier.html.twig', array('id' => $id, 'panier' => $formpanier->createView(), 'res' => $resultat));
                }
            }
        }

        return $this->render('PiPiBundle:Default:panier.html.twig', array('id' => $id, 'panier' => $formpanier->createView()));
    }

    public function ListeAction() {
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery('SELECT p FROM PiPiBundle:Dealcourant p JOIN p.dealRef c  ORDER BY p.dealRef DESC')
                ->setMaxResults(6);
        $deal = $query->getResult();
        $query1 = $em->createQuery('SELECT p FROM PiPiBundle:Categorie p ORDER BY p.id DESC');

        $categorie = $query1->getResult();

        return $this->render('PiPiBundle:Default:liste.html.twig', array('deal' => $deal, 'categorie' => $categorie));
    }
    public function Liste1Action() {
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery('SELECT p FROM PiPiBundle:Dealcourant p JOIN p.dealRef c  ORDER BY p.dealRef DESC')
                ->setMaxResults(6);
        $deal = $query->getResult();
        $query1 = $em->createQuery('SELECT p FROM PiPiBundle:Categorie p ORDER BY p.id DESC');

        $categorie = $query1->getResult();

        return $this->render('PiPiBundle:Default:liste1.html.twig', array('deal' => $deal, 'categorie' => $categorie));
    }

    public function nbrecategorieAction($id) {
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery('SELECT COUNT(p) as nbre FROM PiPiBundle:Deal p JOIN p.categorie c WHERE p.categorie=' . $id);

        $nbr = $query->getResult();


        return $this->render('PiPiBundle:Default:nbr.html.twig', array('nbr' => $nbr));
    }

    public function listepasseAction() {
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery('SELECT p FROM PiPiBundle:AncienDeal p JOIN p.dealRef c  ORDER BY p.dealRef DESC')
                ->setMaxResults(6);
        $deal = $query->getResult();
        $query1 = $em->createQuery('SELECT p FROM PiPiBundle:Categorie p ORDER BY p.id DESC');

        $categorie = $query1->getResult();

        return $this->render('PiPiBundle:Default:listepasse.html.twig', array('deal' => $deal, 'categorie' => $categorie));
    }

    public function RefreshAction() {


        return $this->render('PiPiBundle:Default:refresh.html.twig');
    }

    public function ProfilAction($id) {
        $avi = new Avis();
        $em = $this->getDoctrine()->getManager();
        $resultat = $em->getRepository('PiPiBundle:Deal')
                ->find($id);
        $avis = $em->getRepository('PiPiBundle:Avis')->findBy(array('dealRef' => $id));
        $resultat1 = $em->createQuery('SELECT Count(p.commentaire)as Note FROM PiPiBundle:Avis p where p.dealRef= ' . $id . '  ');
        $nbr = $resultat1->getResult();
        $form = $this->createFormBuilder()
                ->add('note', 'choice', array('choices' => array('1' => '', '2' => ''
                        , '3' => '', '4' => '', '5' => ''), 'expanded' => true))
                ->add('commentaire', 'textarea')
                ->getForm();
        $request = $this->getRequest();
        if ($request->isXmlHttpRequest()) {
            $form->bind($request);
            ;
            if ($form->isValid()) {

                $commentaire = $form->get('commentaire')->getData();
                $note = $form->get('note')->getData();
                $avi->setCommentaire($commentaire);
                $avi->setNote($note);
                $avi->setDealRef($resultat);
                $em->persist($avi);
                $em->flush();
                $avis = $em->getRepository('PiPiBundle:Avis')->findBy(array('dealRef' => $id));
                $resultat1 = $em->createQuery('SELECT Count(p.commentaire)as Note FROM PiPiBundle:Avis p where p.dealRef= ' . $id . '  ');
                $nbr = $resultat1->getResult();
                return $this->render('PiPiBundle:Default:Comment.html.twig', array('avis' => $avis, 'nbr' => $nbr));
            }
        }

        return $this->render('PiPiBundle:Default:profil.html.twig', array('deal' => $resultat, 'avis' => $avis, 'nbr' => $nbr, 'form' => $form->createView()));
    }

    public function ReserverAction() {
        $session = new Session();
        $reser = new Reservation();
        $client = new Client();
        $deal = new \Pi\PiBundle\Entity\Deal();

        $user = $this->container->get('security.context')->getToken()->getUser();
  if($session->has('id')==true)
  {
        foreach ($session->get('id') as $key => $value) {
            $em = $this->getDoctrine()->getEntityManager();
            $client1 = $em->getRepository('PiPiBundle:Client')
                    ->find($user);
            $deal1 = $em->getRepository('PiPiBundle:Deal')
                    ->find($value);
            
            $client = $client1;
            $deal = $deal1;
            $reser->setDealRef($deal);
            $reser->setQuantite($session->get('quantite')[$key]);
            $reser->setClient($client);
            $reser->setDateres(new \DateTime());
            $reser->getValid(0);
           
            $em->persist($reser);
            $em->flush();
            $em->clear();
            
           
           
        }
  }

$session->clear();


        return $this->render('PiPiBundle:Default:reservation.html.twig');
    }

    public function searchAction() {
        $search = $this->createFormBuilder()
                ->add('recherche')
                ->getForm();
        $request = $this->getRequest();
        if ($request->isMethod('POST')) {
            $search->bind($request);
            if ($search->isValid()) {
                $mot = $search->get('recherche')->getData();
                $em = $this->getDoctrine()->getEntityManager();
                $query = $em->createQuery("
	            SELECT p FROM PiPiBundle:Deal p
	            WHERE p.nom LIKE :key "
                );
                $query->setParameter('key', '%' . $mot . '%');
                $deal = $query->getResult();
                $query1 = $em->createQuery('SELECT p FROM PiPiBundle:Categorie p ORDER BY p.id DESC');

                $categorie = $query1->getResult();
                return $this->render('PiPiBundle:Default:recherche.html.twig', array('deal' => $deal, 'categorie' => $categorie));
            }
        }
        return $this->render('PiPiBundle:Default:search.html.twig', array('search' => $search->createView()));
    }

    public function CheckoutAction() {
        return $this->render('PiPiBundle:Default:Checkout.html.twig');
    }

    public function CommentAction($id) {
        $avis = $em->getRepository('PiPiBundle:Avis')->findBy(array('dealRef' => $id));
        $resultat1 = $em->createQuery('SELECT Count(p.commentaire)as Note FROM PiPiBundle:Avis p where p.dealRef= ' . $id . '  ');
        $nbr = $resultat1->getResult();
        return $this->render('PiPiBundle:Default:Default:Comment.html.twig', array('avis' => $avis, 'nbr' => $nbr));
    }

}
