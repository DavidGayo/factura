<?php

namespace Usuario\UserBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Usuario\UserBundle\Entity\transport;
use Usuario\UserBundle\Form\transportType;

/**
 * transport controller.
 *
 */
class transportController extends Controller
{

    /**
     * Lists all transport entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('UserBundle:transport')->findAll();
        $user = $this->container->get('security.context')->getToken()->getUser();
        if($user!='anon.'){
             $usuario= $em->getRepository('UserBundle:User')->find($user->getId());                   
        }
        return $this->render('UserBundle:transport:index.html.twig', array(
            'entities' => $entities,
            'usuario' => $usuario,
        ));
    }
    /**
     * Creates a new transport entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new transport();
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

            return $this->redirect($this->generateUrl('transport_show', array('id' => $entity->getId())));
        }

        return $this->render('UserBundle:transport:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
            'usuario' => $usuario,
        ));
    }

    /**
     * Creates a form to create a transport entity.
     *
     * @param transport $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(transport $entity)
    {
        $form = $this->createForm(new transportType(), $entity, array(
            'action' => $this->generateUrl('transport_create'),
            'method' => 'POST',
        ));

        //$form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new transport entity.
     *
     */
    public function newAction()
    {
        $entity = new transport();
        $form   = $this->createCreateForm($entity);
        $em = $this->getDoctrine()->getManager();
        $user = $this->container->get('security.context')->getToken()->getUser();
        if($user!='anon.'){
             $usuario= $em->getRepository('UserBundle:User')->find($user->getId());                   
        }
        return $this->render('UserBundle:transport:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
            'usuario' => $usuario,
        ));
    }

    /**
     * Finds and displays a transport entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('UserBundle:transport')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find transport entity.');
        }
        $user = $this->container->get('security.context')->getToken()->getUser();
        if($user!='anon.'){
             $usuario= $em->getRepository('UserBundle:User')->find($user->getId());                   
        }
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('UserBundle:transport:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
            'usuario' => $usuario,
        ));
    }

    /**
     * Displays a form to edit an existing transport entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('UserBundle:transport')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find transport entity.');
        }
        $user = $this->container->get('security.context')->getToken()->getUser();
        if($user!='anon.'){
             $usuario= $em->getRepository('UserBundle:User')->find($user->getId());                   
        }
        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('UserBundle:transport:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
            'usuario' => $usuario,
        ));
    }

    /**
    * Creates a form to edit a transport entity.
    *
    * @param transport $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(transport $entity)
    {
        $form = $this->createForm(new transportType(), $entity, array(
            'action' => $this->generateUrl('transport_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

      //  $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing transport entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('UserBundle:transport')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find transport entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('transport_edit', array('id' => $id)));
        }
        $user = $this->container->get('security.context')->getToken()->getUser();
        if($user!='anon.'){
             $usuario= $em->getRepository('UserBundle:User')->find($user->getId());                   
        }
        return $this->render('UserBundle:transport:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
            'usuario' => $usuario,
        ));
    }
    /**
     * Deletes a transport entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('UserBundle:transport')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find transport entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('transport'));
    }

    /**
     * Creates a form to delete a transport entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('transport_delete', array('id' => $id)))
            ->setMethod('DELETE')
            //->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
