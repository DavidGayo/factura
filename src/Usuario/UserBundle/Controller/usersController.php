<?php

namespace Usuario\UserBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Usuario\UserBundle\Entity\users;
use Usuario\UserBundle\Form\usersType;

/**
 * users controller.
 *
 */
class usersController extends Controller
{

    /**
     * Lists all users entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('UserBundle:users')->findAll();
        $user = $this->container->get('security.context')->getToken()->getUser();
        if($user!='anon.'){
             $usuario= $em->getRepository('UserBundle:User')->find($user->getId());                   
        }
        return $this->render('UserBundle:users:index.html.twig', array(
            'entities' => $entities,
            'usuario' => $usuario,
        ));
    }
    /**
     * Creates a new users entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new users();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);
        $em = $this->getDoctrine()->getManager();
        if ($form->isValid()) {
            
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('users_show', array('id' => $entity->getId())));
        }
        $user = $this->container->get('security.context')->getToken()->getUser();
        if($user!='anon.'){
             $usuario= $em->getRepository('UserBundle:User')->find($user->getId());                   
        }
        return $this->render('UserBundle:users:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
            'usuario' => $usuario,
        ));
    }

    /**
     * Creates a form to create a users entity.
     *
     * @param users $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(users $entity)
    {
        $form = $this->createForm(new usersType(), $entity, array(
            'action' => $this->generateUrl('users_create'),
            'method' => 'POST',
        ));

        //$form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new users entity.
     *
     */
    public function newAction()
    {
        $entity = new users();
        $em = $this->getDoctrine()->getManager();
        $form   = $this->createCreateForm($entity);
        $user = $this->container->get('security.context')->getToken()->getUser();
        if($user!='anon.'){
             $usuario= $em->getRepository('UserBundle:User')->find($user->getId());                   
        }
        return $this->render('UserBundle:users:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
            'usuario' => $usuario,
        ));
    }

    /**
     * Finds and displays a users entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $id=urldecode($id);
        $entity = $em->getRepository('UserBundle:users')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find users entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $user = $this->container->get('security.context')->getToken()->getUser();
        if($user!='anon.'){
             $usuario= $em->getRepository('UserBundle:User')->find($user->getId());                   
        }
        return $this->render('UserBundle:users:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
            'usuario' => $usuario,
        ));
    }

    /**
     * Displays a form to edit an existing users entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $id=urldecode($id);
        $entity = $em->getRepository('UserBundle:users')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find users entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);
        $user = $this->container->get('security.context')->getToken()->getUser();
        if($user!='anon.'){
             $usuario= $em->getRepository('UserBundle:User')->find($user->getId());                   
        }
        return $this->render('UserBundle:users:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
            'usuario' => $usuario,
        ));
    }

    /**
    * Creates a form to edit a users entity.
    *
    * @param users $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(users $entity)
    {
        $form = $this->createForm(new usersType(), $entity, array(
            'action' => $this->generateUrl('users_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

       // $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing users entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
         $id=urldecode($id);
        $entity = $em->getRepository('UserBundle:users')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find users entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();
            return $this->redirect($this->generateUrl('users'));
        }
        $user = $this->container->get('security.context')->getToken()->getUser();
        if($user!='anon.'){
             $usuario= $em->getRepository('UserBundle:User')->find($user->getId());                   
        }
        return $this->render('UserBundle:users:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
            'usuario' => $usuario,
        ));
    }
    /**
     * Deletes a users entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('UserBundle:users')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find users entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('users'));
    }

    /**
     * Creates a form to delete a users entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('users_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
