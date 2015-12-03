<?php

namespace Facturas\GeneralBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Facturas\GeneralBundle\Entity\RegimenFiscal;
use Facturas\GeneralBundle\Form\RegimenFiscalType;

/**
 * RegimenFiscal controller.
 *
 */
class RegimenFiscalController extends Controller
{

    /**
     * Lists all RegimenFiscal entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('GeneralBundle:RegimenFiscal')->findAll();


        return $this->render('GeneralBundle:RegimenFiscal:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new RegimenFiscal entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new RegimenFiscal();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('regimenfiscal_show', array('id' => $entity->getId())));
        }

        return $this->render('GeneralBundle:RegimenFiscal:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a RegimenFiscal entity.
     *
     * @param RegimenFiscal $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(RegimenFiscal $entity)
    {
        $form = $this->createForm(new RegimenFiscalType(), $entity, array(
            'action' => $this->generateUrl('regimenfiscal_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new RegimenFiscal entity.
     *
     */
    public function newAction()
    {
        $entity = new RegimenFiscal();
        $form   = $this->createCreateForm($entity);

        return $this->render('GeneralBundle:RegimenFiscal:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a RegimenFiscal entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GeneralBundle:RegimenFiscal')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find RegimenFiscal entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('GeneralBundle:RegimenFiscal:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing RegimenFiscal entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GeneralBundle:RegimenFiscal')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find RegimenFiscal entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('GeneralBundle:RegimenFiscal:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a RegimenFiscal entity.
    *
    * @param RegimenFiscal $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(RegimenFiscal $entity)
    {
        $form = $this->createForm(new RegimenFiscalType(), $entity, array(
            'action' => $this->generateUrl('regimenfiscal_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing RegimenFiscal entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GeneralBundle:RegimenFiscal')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find RegimenFiscal entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('regimenfiscal'));
        }

        return $this->render('GeneralBundle:RegimenFiscal:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a RegimenFiscal entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('GeneralBundle:RegimenFiscal')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find RegimenFiscal entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('regimenfiscal'));
    }

    /**
     * Creates a form to delete a RegimenFiscal entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('regimenfiscal_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Eliminar', 'attr' => array('class' => 'btn btn-danger')))
            ->getForm()
        ;
    }
}
