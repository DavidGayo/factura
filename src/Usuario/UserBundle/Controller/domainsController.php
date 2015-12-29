<?php

namespace Usuario\UserBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Usuario\UserBundle\Entity\domains;
use Usuario\UserBundle\Form\domainsType;

/**
 * domains controller.
 *
 */
class domainsController extends Controller
{

    /**
     * Lists all domains entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $user = $this->container->get('security.context')->getToken()->getUser();
        if($user!='anon.'){
             $usuario= $em->getRepository('UserBundle:User')->find($user->getId());                   
        }
        $entities = $em->getRepository('UserBundle:domains')->findAll();

        return $this->render('UserBundle:domains:index.html.twig', array(
            'entities' => $entities,
            'usuario' => $usuario,
        ));
    }
    /**
     * Creates a new domains entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new domains();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);
        $em = $this->getDoctrine()->getManager();
        if ($form->isValid()) {
            
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('domains_show', array('id' => $entity->getId())));
        }
        $user = $this->container->get('security.context')->getToken()->getUser();
        if($user!='anon.'){
             $usuario= $em->getRepository('UserBundle:User')->find($user->getId());                   
        }
        return $this->render('UserBundle:domains:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a domains entity.
     *
     * @param domains $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(domains $entity)
    {
        $form = $this->createForm(new domainsType(), $entity, array(
            'action' => $this->generateUrl('domains_create'),
            'method' => 'POST',
        ));

        //$form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new domains entity.
     *
     */
    public function newAction()
    {
        $entity = new domains();
        $form   = $this->createCreateForm($entity);
        $user = $this->container->get('security.context')->getToken()->getUser();
        if($user!='anon.'){
             $em = $this->getDoctrine()->getManager();
             $usuario= $em->getRepository('UserBundle:User')->find($user->getId());                   
        }
        return $this->render('UserBundle:domains:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
            'usuario' => $usuario,
        ));
    }

    /**
     * Finds and displays a domains entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $id=urldecode($id);
        $entity = $em->getRepository('UserBundle:domains')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find domains entity.');
        }
        $user = $this->container->get('security.context')->getToken()->getUser();
        if($user!='anon.'){
             $usuario= $em->getRepository('UserBundle:User')->find($user->getId());                   
        }
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('UserBundle:domains:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
            'usuario' => $usuario,
        ));
    }

    /**
     * Displays a form to edit an existing domains entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $id=urldecode($id);
        $entity = $em->getRepository('UserBundle:domains')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find domains entity.');
        }
        $user = $this->container->get('security.context')->getToken()->getUser();
        if($user!='anon.'){
             $usuario= $em->getRepository('UserBundle:User')->find($user->getId());                   
        }
        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('UserBundle:domains:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
            'usuario' => $usuario,
        ));
    }

    /**
    * Creates a form to edit a domains entity.
    *
    * @param domains $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(domains $entity)
    {
        $form = $this->createForm(new domainsType(), $entity, array(
            'action' => $this->generateUrl('domains_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

       // $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing domains entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $id=urldecode($id);
        $entity = $em->getRepository('UserBundle:domains')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find domains entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('domains'));
        }
        $user = $this->container->get('security.context')->getToken()->getUser();
        if($user!='anon.'){
             $usuario= $em->getRepository('UserBundle:User')->find($user->getId());                   
        }
        return $this->render('UserBundle:domains:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a domains entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $id=urldecode($id);
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);
        
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('UserBundle:domains')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find domains entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('domains'));
    }

    /**
     * Creates a form to delete a domains entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        $id=urlencode($id);
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('domains_delete', array('id' => $id)))
            ->setMethod('DELETE')
            //->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
