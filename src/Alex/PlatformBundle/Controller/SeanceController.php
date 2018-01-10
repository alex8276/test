<?php

namespace Alex\PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Alex\PlatformBundle\Entity\Seance;
use Alex\PlatformBundle\Entity\Exercice;
use Alex\PlatformBundle\Entity\Seance_Exercice_Serie;
use Symfony\Component\HttpFoundation\Request;
use Alex\PlatformBundle\Form\SeanceType;
use Alex\PlatformBundle\Form\Seance_Exercice_SerieType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class SeanceController extends Controller
{
    public function indexAction()
    {
        return $this->render('AlexPlatformBundle:Seance:index.html.twig');
    }

    public function addSeanceAction(Request $request)
    {
    	/*$seance = new Seance();
    	$seance->setDate(new \Datetime());
    	$seance->setComment('Première seance');

    	$em = $this->getDoctrine()->getManager();

    	

        $serie = new Seance_Exercice_Serie();
        $serie->setRep(10);
        $serie->setCharge(100);

        $serie2 = new Seance_Exercice_Serie();
        $serie2->setRep(9);
        $serie2->setCharge(102);

        $serie3 = new Seance_Exercice_Serie();
        $serie3->setRep(8);
        $serie3->setCharge(106);

        $ex = $em->getRepository('AlexPlatformBundle:Exercice')->find(1);

        $serie->setSeance($seance);
        $serie->setExercice($ex);

        $serie2->setSeance($seance);
        $serie2->setExercice($ex);

        $serie3->setSeance($seance);
        $serie3->setExercice($ex);

        $em->persist($seance);
        $em->persist($serie);
        $em->persist($serie2);
        $em->persist($serie3);

        /*******************/
        /*$serie4 = new Seance_Exercice_Serie();
        $serie4->setRep(10);
        $serie4->setCharge(100);

        $serie5 = new Seance_Exercice_Serie();
        $serie5->setRep(9);
        $serie5->setCharge(102);

        $serie6 = new Seance_Exercice_Serie();
        $serie6->setRep(8);
        $serie6->setCharge(106);

        $ex2 = $em->getRepository('AlexPlatformBundle:Exercice')->find(2);

        $serie4->setSeance($seance);
        $serie4->setExercice($ex2);

        $serie5->setSeance($seance);
        $serie5->setExercice($ex2);

        $serie6->setSeance($seance);
        $serie6->setExercice($ex2);

        $em->persist($seance);
        $em->persist($serie4);
        $em->persist($serie5);
        $em->persist($serie6);
        /*******************/

    	/*$em->flush();

    	return $this->render('AlexPlatformBundle:Seance:addSeance.html.twig', array('seance'=>$seance));*/
        $seance = new Seance();

        $form = $this->createForm(SeanceType::class, $seance);

        if($request->isMethod('POST') && $form->handleRequest($request)->isvalid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($seance);
            $em->flush();
            return $this->redirectToRoute('alex_platform_seance_edit', array('id'=>$seance->getId()));
            //return $this->render('AlexPlatformBundle:editSeance.html.twig', array('id'=>$seance->getId()));
        }


        return $this->render('AlexPlatformBundle:Seance:addSeance.html.twig', array('form'=>$form->createView()));

    }



    public function editAction(Request $request, $id){

        $em = $this->getDoctrine()->getManager();
        $s = new Seance_Exercice_Serie();
        $seance = $em->getRepository('AlexPlatformBundle:Seance')->find($id);
        $form = $this->createForm(Seance_Exercice_SerieType::class, $s);
        $form->add('enregistrer', SubmitType::class);
        

        if($request->isMethod('POST') && $form->handleRequest($request)->isvalid()){
            $idEx = $request->request->get('alex_platformbundle_seance_exercice_serie')['exercice'];
            dump($idEx);
            $ex = $em->getRepository('AlexPlatformBundle:Exercice')->find($idEx);
            
            $s->setSeance($seance);
            $s->setExercice($ex);

            $em->persist($s);
            $em->flush();
        }
        
        $listExercice = $em->getRepository('AlexPlatformBundle:Exercice')->findAll();
        

        
        return $this->render('AlexPlatformBundle:Seance:editSeance.html.twig', array('form'=>$form->createView(),'listEx'=>$listExercice,'seance'=>$seance));
    }

    public function viewAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        //$s = $em->getRepository('AlexPlatformBundle:Seance')->find(4);

        $series = $em->getRepository('AlexPlatformBundle:Seance_Exercice_Serie')->findBySeance(1);
        
        return $this->render('AlexPlatformBundle:Seance:view.html.twig', array('series'=>$series));
    }

    public function viewListSeanceAction()
    {
        $em = $this->getDoctrine()->getManager();

        $list = $em->getRepository('AlexPlatformBundle:Seance')->findAll();

        return $this->render('AlexPlatformBundle:Seance:listSeance.html.twig', array('list'=>$list));
    }
















































}
