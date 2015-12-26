<?php

namespace Facturas\FacturasBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Facturas\FacturasBundle\Entity\Certificado;
use Facturas\FacturasBundle\Form\CertificadoType;

/**
 * Certificado controller.
 *
 */
class CertificadoController extends Controller
{

    /**
     * Lists all Certificado entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('FacturasBundle:Certificado')->findAll();

        return $this->render('FacturasBundle:Certificado:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Certificado entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Certificado();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('certificado_show', array('id' => $entity->getId())));
        }

        return $this->render('FacturasBundle:Certificado:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Certificado entity.
     *
     * @param Certificado $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Certificado $entity)
    {
        $form = $this->createForm(new CertificadoType(), $entity, array(
            'action' => $this->generateUrl('certificado_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Certificado entity.
     *
     */
    public function newAction()
    {
        $entity = new Certificado();
        $form   = $this->createCreateForm($entity);

        return $this->render('FacturasBundle:Certificado:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Certificado entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FacturasBundle:Certificado')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Certificado entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('FacturasBundle:Certificado:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Certificado entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FacturasBundle:Certificado')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Certificado entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('FacturasBundle:Certificado:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Certificado entity.
    *
    * @param Certificado $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Certificado $entity)
    {
        $form = $this->createForm(new CertificadoType(), $entity, array(
            'action' => $this->generateUrl('certificado_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Certificado entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FacturasBundle:Certificado')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Certificado entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('certificado_edit', array('id' => $id)));
        }

        return $this->render('FacturasBundle:Certificado:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Certificado entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('FacturasBundle:Certificado')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Certificado entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('certificado'));
    }

    /**
     * Creates a form to delete a Certificado entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('certificado_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
