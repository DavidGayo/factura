<?php

namespace Facturas\FacturasBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

use Facturas\FacturasBundle\Entity\DireccionCliente;
use Facturas\FacturasBundle\Form\DireccionClienteType;
use Facturas\FacturasBundle\Entity\Cliente;
use Facturas\FacturasBundle\Form\ClienteType;


/**
 * DireccionCliente controller.
 *
 */
class DireccionClienteController extends Controller
{

    /**
     * Lists all DireccionCliente entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('FacturasBundle:DireccionCliente')->findAll();

        return $this->render('FacturasBundle:DireccionCliente:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new DireccionCliente entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new DireccionCliente();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('cliente'));
        }

        return $this->render('FacturasBundle:DireccionCliente:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a DireccionCliente entity.
     *
     * @param DireccionCliente $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(DireccionCliente $entity)
    {
        $form = $this->createForm(new DireccionClienteType(), $entity, array(
            'action' => $this->generateUrl('direccioncliente_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new DireccionCliente entity.
     *
     */
    public function newAction()
    {
        $entity = new DireccionCliente();
        $form   = $this->createCreateForm($entity);

        return $this->render('FacturasBundle:DireccionCliente:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    public function addAction(Request $request,$id)
    {
        $em = $this->getDoctrine()->getManager();
        $cliente = $em -> getRepository('FacturasBundle:Cliente')->find($id);
        $editForm = $this->createForm(new ClienteType(),$cliente);

        $entity = new DireccionCliente();
        $form = $this->createForm(new DireccionClienteType(), $entity, array(
            'action' => $this->generateUrl('direccioncliente_add',array('id'=>$id)),
            'method' => 'POST',
        ));
        $form->handleRequest($request);

        if ($form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $entity->setCliente($cliente);
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('cliente'));
        }
        return $this->render('FacturasBundle:Cliente:newaddress.html.twig', array(
             'form'   => $form->createView(),
             'edit_form'   => $editForm->createView(),
        ));
    }

    /**
     * Finds and displays a DireccionCliente entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FacturasBundle:DireccionCliente')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find DireccionCliente entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('FacturasBundle:DireccionCliente:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing DireccionCliente entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FacturasBundle:DireccionCliente')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find DireccionCliente entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('FacturasBundle:DireccionCliente:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a DireccionCliente entity.
    *
    * @param DireccionCliente $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(DireccionCliente $entity)
    {
        $form = $this->createForm(new DireccionClienteType(), $entity, array(
            'action' => $this->generateUrl('direccioncliente_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing DireccionCliente entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FacturasBundle:DireccionCliente')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find DireccionCliente entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('direccioncliente_edit', array('id' => $id)));
        }

        return $this->render('FacturasBundle:DireccionCliente:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a DireccionCliente entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('FacturasBundle:DireccionCliente')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find DireccionCliente entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('direccioncliente'));
    }

    /**
     * Creates a form to delete a DireccionCliente entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('direccioncliente_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => ' Eliminar', 'attr' => array('class' => 'btn btn-danger fa fa-times')))
            ->getForm()
        ;
    }
}
