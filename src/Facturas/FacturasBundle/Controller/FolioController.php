<?php

namespace Facturas\FacturasBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\File\UploadedFile;

use Facturas\FacturasBundle\Entity\Folio;
use Facturas\FacturasBundle\Form\FolioType;

/**
 * Folio controller.
 *
 */
class FolioController extends Controller
{

    /**
     * Lists all Folio entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('FacturasBundle:Folio')->findAll();

        return $this->render('FacturasBundle:Folio:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Folio entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Folio();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity->getLlave()->upload();
            $entity->getCertificado()->upload();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('folio_show', array('id' => $entity->getId())));
        }

        return $this->render('FacturasBundle:Folio:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Folio entity.
     *
     * @param Folio $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Folio $entity)
    {
        $form = $this->createForm(new FolioType(), $entity, array(
            'action' => $this->generateUrl('folio_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Folio entity.
     *
     */
    public function newAction()
    {
        $entity = new Folio();
        $form   = $this->createCreateForm($entity);

        return $this->render('FacturasBundle:Folio:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Folio entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FacturasBundle:Folio')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Folio entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('FacturasBundle:Folio:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Folio entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FacturasBundle:Folio')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Folio entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('FacturasBundle:Folio:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Folio entity.
    *
    * @param Folio $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Folio $entity)
    {
        $form = $this->createForm(new FolioType(), $entity, array(
            'action' => $this->generateUrl('folio_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Folio entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FacturasBundle:Folio')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Folio entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('folio_edit', array('id' => $id)));
        }

        return $this->render('FacturasBundle:Folio:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Folio entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('FacturasBundle:Folio')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Folio entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('folio'));
    }

    /**
     * Creates a form to delete a Folio entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('folio_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => ' Eliminar', 'attr' => array('class' => 'btn btn-danger fa fa-times')))
            ->getForm()
        ;
    }
}
