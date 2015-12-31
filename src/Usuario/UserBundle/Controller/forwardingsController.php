<?php

namespace Usuario\UserBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Usuario\UserBundle\Entity\forwardings;
use Usuario\UserBundle\Form\forwardingsType;

/**
 * forwardings controller.
 *
 */
class forwardingsController extends Controller
{

    /**
     * Lists all forwardings entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('UserBundle:forwardings')->findAll();
        $user = $this->container->get('security.context')->getToken()->getUser();
        if($user!='anon.'){
             $usuario= $em->getRepository('UserBundle:User')->find($user->getId());                   
        }
        return $this->render('UserBundle:forwardings:index.html.twig', array(
            'entities' => $entities,
            'usuario' => $usuario,
        ));
    }
    /**
     * Creates a new forwardings entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new forwardings();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);
        $em = $this->getDoctrine()->getManager();
        $user = $this->container->get('security.context')->getToken()->getUser();
        if($user!='anon.'){
             $usuario= $em->getRepository('UserBundle:User')->find($user->getId());                   
        }
        if ($form->isValid()) {
           
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('forwardings_show', array('id' => $entity->getId())));
        }

        return $this->render('UserBundle:forwardings:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
            'usuario' => $usuario,
        ));
    }

    /**
     * Creates a form to create a forwardings entity.
     *
     * @param forwardings $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(forwardings $entity)
    {
        $form = $this->createForm(new forwardingsType(), $entity, array(
            'action' => $this->generateUrl('forwardings_create'),
            'method' => 'POST',
        ));

       // $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new forwardings entity.
     *
     */
    public function newAction()
    {
        $entity = new forwardings();
        $form   = $this->createCreateForm($entity);
        $em = $this->getDoctrine()->getManager();
        $user = $this->container->get('security.context')->getToken()->getUser();
        if($user!='anon.'){
             $usuario= $em->getRepository('UserBundle:User')->find($user->getId());                   
        }
        return $this->render('UserBundle:forwardings:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
            'usuario' => $usuario,
        ));
    }

    /**
     * Finds and displays a forwardings entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $id=urldecode($id);
        $entity = $em->getRepository('UserBundle:forwardings')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find forwardings entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $user = $this->container->get('security.context')->getToken()->getUser();
        if($user!='anon.'){
             $usuario= $em->getRepository('UserBundle:User')->find($user->getId());                   
        }
        return $this->render('UserBundle:forwardings:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
            'usuario' => $usuario,
        ));
    }

    /**
     * Displays a form to edit an existing forwardings entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $id=urldecode($id);
        $entity = $em->getRepository('UserBundle:forwardings')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find forwardings entity.');
        }
        $user = $this->container->get('security.context')->getToken()->getUser();
        if($user!='anon.'){
             $usuario= $em->getRepository('UserBundle:User')->find($user->getId());                   
        }
        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('UserBundle:forwardings:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
            'usuario' => $usuario,
        ));
    }

    /**
    * Creates a form to edit a forwardings entity.
    *
    * @param forwardings $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(forwardings $entity)
    {
        $form = $this->createForm(new forwardingsType(), $entity, array(
            'action' => $this->generateUrl('forwardings_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        //$form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing forwardings entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $id=urldecode($id);
        $entity = $em->getRepository('UserBundle:forwardings')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find forwardings entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('forwardings'));
        }
        $user = $this->container->get('security.context')->getToken()->getUser();
        if($user!='anon.'){
             $usuario= $em->getRepository('UserBundle:User')->find($user->getId());                   
        }
        return $this->render('UserBundle:forwardings:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
            'usuario' => $usuario,
        ));
    }
    /**
     * Deletes a forwardings entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $id=urldecode($id);
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('UserBundle:forwardings')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find forwardings entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('forwardings'));
    }

    /**
     * Creates a form to delete a forwardings entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        $id=urlencode($id);
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('forwardings_delete', array('id' => $id)))
            ->setMethod('DELETE')
            //->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
