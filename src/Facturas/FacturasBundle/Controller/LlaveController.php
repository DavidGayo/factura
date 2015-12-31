<?php

namespace Facturas\FacturasBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Facturas\FacturasBundle\Entity\Llave;
use Facturas\FacturasBundle\Form\LlaveType;

/**
 * Llave controller.
 *
 */
class LlaveController extends Controller
{

    /**
     * Lists all Llave entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('FacturasBundle:Llave')->findAll();

        return $this->render('FacturasBundle:Llave:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Llave entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Llave();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('llave_show', array('id' => $entity->getId())));
        }

        return $this->render('FacturasBundle:Llave:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Llave entity.
     *
     * @param Llave $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Llave $entity)
    {
        $form = $this->createForm(new LlaveType(), $entity, array(
            'action' => $this->generateUrl('llave_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Llave entity.
     *
     */
    public function newAction()
    {
        $entity = new Llave();
        $form   = $this->createCreateForm($entity);

        return $this->render('FacturasBundle:Llave:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Llave entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FacturasBundle:Llave')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Llave entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('FacturasBundle:Llave:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Llave entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FacturasBundle:Llave')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Llave entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('FacturasBundle:Llave:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Llave entity.
    *
    * @param Llave $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Llave $entity)
    {
        $form = $this->createForm(new LlaveType(), $entity, array(
            'action' => $this->generateUrl('llave_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Llave entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FacturasBundle:Llave')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Llave entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('llave_edit', array('id' => $id)));
        }

        return $this->render('FacturasBundle:Llave:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Llave entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('FacturasBundle:Llave')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Llave entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('llave'));
    }

    /**
     * Creates a form to delete a Llave entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('llave_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
