<?php

namespace Facturas\FacturasBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Facturas\FacturasBundle\Entity\Emisor;
use Facturas\FacturasBundle\Form\EmisorType;

/**
 * Emisor controller.
 *
 */
class EmisorController extends Controller
{

    /**
     * Lists all Emisor entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('FacturasBundle:Emisor')->findAll();

        return $this->render('FacturasBundle:Emisor:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Emisor entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Emisor();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('emisor_show', array('id' => $entity->getId())));
        }

        return $this->render('FacturasBundle:Emisor:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Emisor entity.
     *
     * @param Emisor $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Emisor $entity)
    {
        $form = $this->createForm(new EmisorType(), $entity, array(
            'action' => $this->generateUrl('emisor_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Emisor entity.
     *
     */
    public function newAction()
    {
        $entity = new Emisor();
        $form   = $this->createCreateForm($entity);

        return $this->render('FacturasBundle:Emisor:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Emisor entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FacturasBundle:Emisor')->emisor($id);
        

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Emisor entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('FacturasBundle:Emisor:show.html.twig', array(
            'entities'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Emisor entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FacturasBundle:Emisor')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Emisor entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('FacturasBundle:Emisor:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Emisor entity.
    *
    * @param Emisor $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Emisor $entity)
    {
        $form = $this->createForm(new EmisorType(), $entity, array(
            'action' => $this->generateUrl('emisor_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Emisor entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FacturasBundle:Emisor')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Emisor entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('emisor_edit', array('id' => $id)));
        }

        return $this->render('FacturasBundle:Emisor:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Emisor entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('FacturasBundle:Emisor')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Emisor entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('emisor'));
    }

    /**
     * Creates a form to delete a Emisor entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('emisor_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => ' Eliminar', 'attr' => array('class' => 'btn btn-danger fa fa-times')))
            ->getForm()
        ;
    }
}
