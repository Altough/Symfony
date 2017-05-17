<?php

namespace OCPlatformBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class AdvertController extends Controller
{
  public function indexAction($page)
  {
    $listAdverts = array(
      array(
        'title'   => 'Recherche développeur Symfony2',
        'id'      => 1,
        'author'  => 'Alexandre',
        'content' => 'Nous recherchons un développeur Symfony débutant
                      sur Lyon...',
        'date'    => new \Datetime()),
      array(
        'title'   => 'Mission de webmaster',
        'id'      => 2,
        'author'  => 'Hugo',
        'content' => 'Nous recherchons un webmaster capable de maintenir
                        notre site internet...',
        'date'    => new \Datetime()),
      array(
          'title'   => 'Offre de stage webdesigner',
          'id'      => 3,
          'author'  => 'Mathieu',
          'content' => 'Nous proposons un poste pour webdesigner...',
          'date'    => new \Datetime())
    );
    return $this->render('OCPlatformBundle:Advert:index.html.twig', array(
      'listAdverts' => $listAdverts
    ));
  }

  public function viewAction($id)
  {
    $advert = array(
      'title'   =>  'Recherche développeur Symfony2',
      'id'      =>  $id,
      'author'  =>  'Alexandre',
      'content' =>  'Nous recherchons un developpeur Symfony2 débutant
                     sur Lyon...',
      'date'    =>   new \Datetime()
    );
    return $this->render('OCPlatformBundle:Advert:view.html.twig', array(
      'advert'  => $advert
    ));
  }

  public function addAction(Request $request)
  {
    if ($request->isMethod('POST')){
      $request->getSession()->getFlashBag->add('notice',
                              'Annonce bien enregistrée.');
      return $this->redirectToRoute('oc_platform_view', array('id' =>5));
    }
    return $this->render('OCPlatformBundle:Advert:view.html.twig');
  }

  public function editAction($id, Request $request)
  {
    /*if ($request->isMethod('POST')) {
      $request->getSession->getFlashBag()->add('notice',
                                'Annonce bien modifiée.');
      return $this->redirectToRoute('oc_platform_view', array('id' => 5));
    }
    return $this->render('OCPlatformBundle:Advert:edit.html.twig');*/

    $advert = array(
      'title'   => 'Recherche développeur Symfony',
      'id'      => $id,
      'author'  => 'Alexandre',
      'content' => 'Nous recherchons un développeur Symfony débutant sur Lyon..',
      'date'    => new \Datetime()
    );
    return $this->render('OCPlatformBundle:Advert:edit.html.twig', array(
      'advert'  => $advert
    ));
  }

  public function deleteAction($id)
  {
    return $this->render('OCPlatformBundle:Advert:delete.html.twig');
  }

  public function menuAction($limit)
  {
    $listAdverts = array(
      array('id' => 2, 'title' => 'Recherche développeur Symfony'),
      array('id' => 5, 'title' => 'Mission de webmaster'),
      array('id' => 9, 'title' => 'Offre de stage webdesigner')
    );

    return $this->render('OCPlatformBundle:Advert:menu.html.twig', array(
      'listAdverts' => $listAdverts
    ));
  }
}
