<?php

namespace Acme\PropiedadesBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Acme\PropiedadesBundle\Entity\TipoPropiedad;
use Acme\PropiedadesBundle\Form\TipoPropiedadType;

/**
 * TipoPropiedad controller.
 *
 * @Route("/tipopropiedad")
 */
class TipoPropiedadController extends Controller
{

    /**
     * Lists all TipoPropiedad entities.
     *
     * @Route("/", name="tipopropiedad")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AcmePropiedadesBundle:TipoPropiedad')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new TipoPropiedad entity.
     *
     * @Route("/", name="tipopropiedad_create")
     * @Method("POST")
     * @Template("AcmePropiedadesBundle:TipoPropiedad:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new TipoPropiedad();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('tipopropiedad_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a TipoPropiedad entity.
     *
     * @param TipoPropiedad $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(TipoPropiedad $entity)
    {
        $form = $this->createForm(new TipoPropiedadType(), $entity, array(
            'action' => $this->generateUrl('tipopropiedad_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new TipoPropiedad entity.
     *
     * @Route("/new", name="tipopropiedad_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new TipoPropiedad();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a TipoPropiedad entity.
     *
     * @Route("/{id}", name="tipopropiedad_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmePropiedadesBundle:TipoPropiedad')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TipoPropiedad entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing TipoPropiedad entity.
     *
     * @Route("/{id}/edit", name="tipopropiedad_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmePropiedadesBundle:TipoPropiedad')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TipoPropiedad entity.');
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
    * Creates a form to edit a TipoPropiedad entity.
    *
    * @param TipoPropiedad $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(TipoPropiedad $entity)
    {
        $form = $this->createForm(new TipoPropiedadType(), $entity, array(
            'action' => $this->generateUrl('tipopropiedad_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing TipoPropiedad entity.
     *
     * @Route("/{id}", name="tipopropiedad_update")
     * @Method("PUT")
     * @Template("AcmePropiedadesBundle:TipoPropiedad:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmePropiedadesBundle:TipoPropiedad')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TipoPropiedad entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('tipopropiedad_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a TipoPropiedad entity.
     *
     * @Route("/{id}", name="tipopropiedad_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AcmePropiedadesBundle:TipoPropiedad')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find TipoPropiedad entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('tipopropiedad'));
    }

    /**
     * Creates a form to delete a TipoPropiedad entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('tipopropiedad_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
