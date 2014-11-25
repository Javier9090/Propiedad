<?php

namespace Acme\PropiedadesBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Acme\PropiedadesBundle\Entity\Caracteristicas;
use Acme\PropiedadesBundle\Form\CaracteristicasType;

/**
 * Caracteristicas controller.
 *
 * @Route("/caracteristicas")
 */
class CaracteristicasController extends Controller
{

    /**
     * Lists all Caracteristicas entities.
     *
     * @Route("/", name="caracteristicas")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AcmePropiedadesBundle:Caracteristicas')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Caracteristicas entity.
     *
     * @Route("/", name="caracteristicas_create")
     * @Method("POST")
     * @Template("AcmePropiedadesBundle:Caracteristicas:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Caracteristicas();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('propiedades_caracteristicas_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Caracteristicas entity.
     *
     * @param Caracteristicas $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Caracteristicas $entity)
    {
        $form = $this->createForm(new CaracteristicasType(), $entity, array(
            'action' => $this->generateUrl('propiedades_caracteristicas_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Caracteristicas entity.
     *
     * @Route("/new", name="caracteristicas_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Caracteristicas();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Caracteristicas entity.
     *
     * @Route("/{id}", name="caracteristicas_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmePropiedadesBundle:Caracteristicas')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Caracteristicas entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Caracteristicas entity.
     *
     * @Route("/{id}/edit", name="caracteristicas_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmePropiedadesBundle:Caracteristicas')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Caracteristicas entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a Caracteristicas entity.
    *
    * @param Caracteristicas $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Caracteristicas $entity)
    {
        $form = $this->createForm(new CaracteristicasType(), $entity, array(
            'action' => $this->generateUrl('propiedades_caracteristicas_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Caracteristicas entity.
     *
     * @Route("/{id}", name="caracteristicas_update")
     * @Method("PUT")
     * @Template("AcmePropiedadesBundle:Caracteristicas:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmePropiedadesBundle:Caracteristicas')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Caracteristicas entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('propiedades_caracteristicas_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Caracteristicas entity.
     *
     * @Route("/{id}", name="caracteristicas_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AcmePropiedadesBundle:Caracteristicas')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Caracteristicas entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('propiedades_caracteristicas'));
    }

    /**
     * Creates a form to delete a Caracteristicas entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('propiedades_caracteristicas_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
