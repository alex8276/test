<?php

namespace Alex\PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Alex\PlatformBundle\Entity\Seance;
use Alex\PlatformBundle\Entity\Exercice;
use Alex\PlatformBundle\Entity\Seance_Exercice_Serie;
use Symfony\Component\HttpFoundation\Request;
use Alex\PlatformBundle\Form\ExerciceType;

class ExerciceController extends Controller
{
    public function indexAction()
    {
        return $this->render('AlexPlatformBundle:Seance:index.html.twig');
    }

    public function addAction(Request $request)
    {
        $exercice = new Exercice();
        $form = $this->createForm(ExerciceType::class, $exercice);

        if($request->isMethod('POST') && $form->handleRequest($request)->isvalid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($exercice);

            $em->flush();

            return $this->redirectToroute('alex_platform_view', array('id' => $exercice->getId()));
        }
        return $this->render('AlexPlatformBundle:Exercice:add.html.twig', array('form'=>$form->createView()));
    }

    public function viewAction($id)
    {

    }

    public function viewListAction()
    {
        $em = $this->getDoctrine()->getManager();
        $list = $em->getRepository('AlexPlatformBundle:Exercice')->findAll();

        return $this->render('AlexPlatformBundle:Exercice:viewList.html.twig', array('list'=>$list));
    }

    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $ex = $em->getRepository('AlexPlatformBundle:Exercice')->find($id);

        if(null === $ex){
            throw new NotFoundHttpException("L'exercice ".$id." n'existe pas");
        }
        $em->remove($ex);
        $em->flush();

        return $this->redirectToRoute('alex_platform_exercice_list');
    }
















































}
