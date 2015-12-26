<?php

namespace Facturas\FacturasBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Facturas\FacturasBundle\Entity\DireccionEmisor;
use Facturas\FacturasBundle\Form\DireccionEmisorType;

/**
 * DireccionEmisor controller.
 *
 */
class DireccionEmisorController extends Controller
{

    /**
     * Lists all DireccionEmisor entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('FacturasBundle:DireccionEmisor')->findAll();

        return $this->render('FacturasBundle:DireccionEmisor:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new DireccionEmisor entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new DireccionEmisor();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('direccionemisor_show', array('id' => $entity->getId())));
        }

        return $this->render('FacturasBundle:DireccionEmisor:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a DireccionEmisor entity.
     *
     * @param DireccionEmisor $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(DireccionEmisor $entity)
    {
        $form = $this->createForm(new DireccionEmisorType(), $entity, array(
            'action' => $this->generateUrl('direccionemisor_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new DireccionEmisor entity.
     *
     */
    public function newAction()
    {
        $em = $this->getDoctrine()->getManager();
        $emisor = $em ->getRepository('FacturasBundle:Emisor')->findAll();
        $id  =  $emisor[0] -> getId();

        if (empty($emisor))
        {
            $entity = new DireccionEmisor();
            $form   = $this->createCreateForm($entity);

            return $this->render('FacturasBundle:DireccionEmisor:new.html.twig', array(
                'entity' => $entity,
                'form'   => $form->createView(),
                'id'   => $id,
            ));
        }

         $response = $this->forward('FacturasBundle:DireccionEmisor:edit', array(
             'id'  => $id,
            ));

         return $response;
    }

    /**
     * Finds and displays a DireccionEmisor entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FacturasBundle:DireccionEmisor')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find DireccionEmisor entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('FacturasBundle:DireccionEmisor:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing DireccionEmisor entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FacturasBundle:DireccionEmisor')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find DireccionEmisor entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('FacturasBundle:DireccionEmisor:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a DireccionEmisor entity.
    *
    * @param DireccionEmisor $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(DireccionEmisor $entity)
    {
        $form = $this->createForm(new DireccionEmisorType(), $entity, array(
            'action' => $this->generateUrl('direccionemisor_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing DireccionEmisor entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FacturasBundle:DireccionEmisor')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find DireccionEmisor entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('direccionemisor_edit', array('id' => $id)));
        }

        return $this->render('FacturasBundle:DireccionEmisor:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a DireccionEmisor entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('FacturasBundle:DireccionEmisor')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find DireccionEmisor entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('direccionemisor'));
    }

    /**
     * Creates a form to delete a DireccionEmisor entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('direccionemisor_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => ' Eliminar', 'attr' => array('class' => 'btn btn-danger fa fa-times')))
            ->getForm()
        ;
    }
}
