<?php

namespace Acme\PropiedadesBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Acme\PropiedadesBundle\Entity\Propiedad;
use Acme\PropiedadesBundle\Form\PropiedadType;

/**
 * Propiedad controller.
 *
 * @Route("/propiedad")
 */
class PropiedadController extends Controller
{

    /**
     * Lists all Propiedad entities.
     *
     * @Route("/", name="propiedad")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AcmePropiedadesBundle:Propiedad')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Propiedad entity.
     *
     * @Route("/", name="propiedad_create")
     * @Method("POST")
     * @Template("AcmePropiedadesBundle:Propiedad:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Propiedad();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('propiedades_propiedad_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Propiedad entity.
     *
     * @param Propiedad $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Propiedad $entity)
    {
        $form = $this->createForm(new PropiedadType(), $entity, array(
            'action' => $this->generateUrl('propiedades_propiedad_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Propiedad entity.
     *
     * @Route("/new", name="propiedad_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Propiedad();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Propiedad entity.
     *
     * @Route("/{id}", name="propiedad_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmePropiedadesBundle:Propiedad')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Propiedad entity.');
        }


        $deleteForm = $this->createDeleteForm($id);
	
		
$caract = $entity->getCaracteristicas();
		
        return array(
			'ca'          => $caract,    
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Propiedad entity.
     *
     * @Route("/{id}/edit", name="propiedad_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmePropiedadesBundle:Propiedad')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Propiedad entity.');
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
    * Creates a form to edit a Propiedad entity.
    *
    * @param Propiedad $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Propiedad $entity)
    {
        $form = $this->createForm(new PropiedadType(), $entity, array(
            'action' => $this->generateUrl('propiedades_propiedad_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Propiedad entity.
     *
     * @Route("/{id}", name="propiedad_update")
     * @Method("PUT")
     * @Template("AcmePropiedadesBundle:Propiedad:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmePropiedadesBundle:Propiedad')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Propiedad entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('propiedades_propiedad_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Propiedad entity.
     *
     * @Route("/{id}", name="propiedad_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AcmePropiedadesBundle:Propiedad')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Propiedad entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('propiedades_propiedad'));
    }

    /**
     * Creates a form to delete a Propiedad entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('propiedades_propiedad_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
