<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Yazilar;
use AppBundle\Entity\Kategori;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class LinksController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(){
        // replace this example code with whatever you need
        return $this->render('bizzatikendisi/index.html.twig');
    }

    /**
     * @Route("/bizzatikendisi/hakkimda", name="bizzatikendisi_hakkimda")
     */
    public function hakkimdaAction(Request $request){
        // replace this example code with whatever you need
        return $this->render('bizzatikendisi/hakkimda.html.twig');
    }

    /**
     * @Route("/bizzatikendisi/yazilarim", name="bizzatikendisi_yazilarim")
     */
    public function yazilarimAction(Request $request){
        $yazilar = $this -> getDoctrine()
            ->getRepository('AppBundle:Yazilar')
            ->findAll();
        // replace this example code with whatever you need
        return $this->render('bizzatikendisi/yazilarim.html.twig', array(
            'yazilar' => $yazilar
        ));
    }

    /**
     * @Route("/bizzatikendisi/iletisim", name="bizzatikendisi_iletisim")
     */
    public function iletisimAction(Request $request){
        // replace this example code with whatever you need
        return $this->render('bizzatikendisi/iletisim.html.twig');
    }
    /**
 * @Route("/bizzatikendisi/yazilarim/{id}", name="bizzatikendisi_yazi")
 */
    public function yaziAction($id){
        $yazi = $this->getDoctrine()
            ->getRepository('AppBundle:Yazilar')
            ->find($id);
        return $this->render('bizzatikendisi/yazi.html.twig', array(
            'yazi' => $yazi
        ));
    }


    /**
     * @Route("/bizzatikendisi/yazilarim/list", name="bizzatikendisi_list")
     */
    public function listAction(Request $request){
        $yazilar = $this -> getDoctrine()
            ->getRepository('AppBundle:Yazilar')
            ->findAll();
        // replace this example code with whatever you need
        return $this->render('bizzatikendisi/yazilarim.html.twig', array(
            'yazilar' => $yazilar
        ));
    }


    /**
     * @Route("/bizzatikendisi/panel/create", name="bizzatikendisi_create")
     */
    public function createAction(Request $request){

        $yazi = new Yazilar();
        $kategoriler = new Kategori();





        $form = $this->createFormBuilder($yazi)
            ->add('baslik', TextType::class, array(
                'attr'  => array('class' => 'form-control')
            ))
            ->add('slogan', TextType::class, array(
                'attr'  => array('class' => 'form-control')
            ))
            ->add('icerik', TextareaType::class, array(
                'attr'  => array('class' => 'form-control')
            ))
            ->add('kategoriler', TextType::class, array(
                'attr'  => array('class' => 'form-control')
            ))
            ->add('save', SubmitType::class, array(
                'label' => 'EKLE',
                'attr'  => array('class' => 'btn btn-default pull-right')
            ))
            ->getForm();

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $baslik = $form['baslik']->getData();
            $slogan = $form['slogan']->getData();
            $icerik = $form['icerik']->getData();
            $kategoriler = $form['id']->getData();


            die($kategori);
            $yazi->setBaslik($baslik);
            $yazi->setSlogan($slogan);
            $yazi->setIcerik($icerik);
            $yazi->setKategoriler($kategoriler);



            $em = $this->getDoctrine()->getManager();
            $em->persist($kategoriler);
            $em->persist($yazi);
            $em->flush();

            $this->addFlash(
                'notice',
                'yazi eklendi'
            );
            return $this->redirectToRoute('bizzatikendisi_yazilarim');
        }

        return $this->render('bizzatikendisi/create.html.twig', array(
            'form'=> $form->createView()
        ));



        /* $em = $this -> getDoctrine() -> getManager();
           $yazi = new Yazilar();
           $yazi ->setIcerik('jdeojrorqor');
           $yazi ->setAnaResim('quwehoqwiheiqwe');
           $yazi ->setBaslik('qweqwhieqw');
           $yazi ->setSlogan('qweqwhieqw');
           $em -> persist($yazi);
           $em ->flush(); */

    }

    /**
     * @Route("/bizzatikendisi/panel/edit/{id}", name="bizzatikendisi_edit")
     */
    public function editAction($id, Request $request){
        $em = $this->getDoctrine()->getManager();
        $yazi = $this->getDoctrine()
            ->getRepository('AppBundle:Yazilar')
            ->find($id);

        $yazi->setBaslik($yazi->getBaslik());
        $yazi->setBaslik($yazi->getSlogan());
        $yazi->setBaslik($yazi->getIcerik());

        $form = $this->createFormBuilder($yazi)
            ->add('baslik', TextType::class, array(
                'attr'  => array('class' => 'form-control')
            ))
            ->add('slogan', TextType::class, array(
                'attr'  => array('class' => 'form-control')
            ))
            ->add('icerik', TextAreaType::class, array(
                'attr'  => array('class' => 'form-control')
            ))
            ->add('save', SubmitType::class, array(
                'label' => 'DÜZENLE',
                'attr'  => array('class' => 'btn btn-default pull-right')
            ))
            ->getForm();

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $baslik = $form['baslik']->getData();
            $slogan = $form['slogan']->getData();
            $icerik = $form['icerik']->getData();
            /*die('SUBMITTED');*/
            $yazi = $em->getRepository('AppBundle:Yazilar')->find($id);

            $yazi->setBaslik($baslik);
            $yazi->setBaslik($slogan);
            $yazi->setBaslik($icerik);
            $em->persist($yazi);
            $em->flush();
            $this->addFlash(
                'notice',
                'yazi güncellendi'
            );
            return $this->redirectToRoute('bizzatikendisi_yazilarim');
        }



        return $this->render('bizzatikendisi/edit.html.twig', array(
            'yazi' => $yazi,
            'form' => $form->createView()
        ));
    }


    /**
     * @Route("/bizzatikendisi/delete/{id}", name="bizzatikendisi_delete") */
    public function deleteAction($id){
        $em = $this->getDoctrine()->getManager();
        $yazi = $em->getRepository('AppBundle:Yazilar')->find($id);

        $em->remove($yazi);
        $em->flush();

        $this->addFlash(
            'notice',
            'Yazi deleted'
        );
        return $this->redirectToRoute('bizzatikendisi_list');
    }
}
