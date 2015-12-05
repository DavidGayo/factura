<?php

namespace Facturas\GeneralBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Facturas\GeneralBundle\Entity\Contribuyente;
use Facturas\GeneralBundle\Form\ContribuyenteType;

/**
 * Contribuyente controller.
 *
 */
class ContribuyenteController extends Controller
{

    /**
     * Lists all Contribuyente entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('GeneralBundle:Contribuyente')->findAll();

        return $this->render('GeneralBundle:Contribuyente:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Contribuyente entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Contribuyente();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('contribuyente_show', array('id' => $entity->getId())));
        }

        return $this->render('GeneralBundle:Contribuyente:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Contribuyente entity.
     *
     * @param Contribuyente $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Contribuyente $entity)
    {
        $form = $this->createForm(new ContribuyenteType(), $entity, array(
            'action' => $this->generateUrl('contribuyente_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Contribuyente entity.
     *
     */
    public function newAction()
    {
        $entity = new Contribuyente();
        $form   = $this->createCreateForm($entity);

        return $this->render('GeneralBundle:Contribuyente:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Contribuyente entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GeneralBundle:Contribuyente')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Contribuyente entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('GeneralBundle:Contribuyente:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Contribuyente entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GeneralBundle:Contribuyente')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Contribuyente entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('GeneralBundle:Contribuyente:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Contribuyente entity.
    *
    * @param Contribuyente $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Contribuyente $entity)
    {
        $form = $this->createForm(new ContribuyenteType(), $entity, array(
            'action' => $this->generateUrl('contribuyente_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Contribuyente entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GeneralBundle:Contribuyente')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Contribuyente entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('contribuyente_edit', array('id' => $id)));
        }

        return $this->render('GeneralBundle:Contribuyente:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Contribuyente entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('GeneralBundle:Contribuyente')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Contribuyente entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('contribuyente'));
    }

    /**
     * Creates a form to delete a Contribuyente entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('contribuyente_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Eliminar', 'attr' => array('class' => 'btn btn-danger')))
            ->getForm()
        ;
    }
}
