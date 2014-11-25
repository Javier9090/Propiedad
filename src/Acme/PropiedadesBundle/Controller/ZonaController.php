<?php

namespace Acme\PropiedadesBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Acme\PropiedadesBundle\Entity\Zona;
use Acme\PropiedadesBundle\Form\ZonaType;

/**
 * Zona controller.
 *
 * @Route("/zona")
 */
class ZonaController extends Controller
{

    /**
     * Lists all Zona entities.
     *
     * @Route("/", name="zona")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AcmePropiedadesBundle:Zona')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Zona entity.
     *
     * @Route("/", name="zona_create")
     * @Method("POST")
     * @Template("AcmePropiedadesBundle:Zona:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Zona();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('propiedades_zona_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Zona entity.
     *
     * @param Zona $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Zona $entity)
    {
        $form = $this->createForm(new ZonaType(), $entity, array(
            'action' => $this->generateUrl('propiedades_zona_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Zona entity.
     *
     * @Route("/new", name="zona_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Zona();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Zona entity.
     *
     * @Route("/{id}", name="zona_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmePropiedadesBundle:Zona')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Zona entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Zona entity.
     *
     * @Route("/{id}/edit", name="zona_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmePropiedadesBundle:Zona')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Zona entity.');
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
    * Creates a form to edit a Zona entity.
    *
    * @param Zona $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Zona $entity)
    {
        $form = $this->createForm(new ZonaType(), $entity, array(
            'action' => $this->generateUrl('propiedades_zona_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Zona entity.
     *
     * @Route("/{id}", name="zona_update")
     * @Method("PUT")
     * @Template("AcmePropiedadesBundle:Zona:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmePropiedadesBundle:Zona')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Zona entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('propiedades_zona_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Zona entity.
     *
     * @Route("/{id}", name="zona_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AcmePropiedadesBundle:Zona')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Zona entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('propiedades_zona'));
    }

    /**
     * Creates a form to delete a Zona entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('propiedades_zona_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
