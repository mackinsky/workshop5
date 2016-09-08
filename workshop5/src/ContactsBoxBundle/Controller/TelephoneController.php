<?php

namespace ContactsBoxBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use ContactsBoxBundle\Entity\Telephone;
use ContactsBoxBundle\Form\TelephoneType;

/**
 * Telephone controller.
 *
 * @Route("/telephone")
 */
class TelephoneController extends Controller
{

    /**
     * Lists all Telephone entities.
     *
     * @Route("/", name="telephone")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ContactsBoxBundle:Telephone')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Telephone entity.
     *
     * @Route("/", name="telephone_create")
     * @Method("POST")
     * @Template("ContactsBoxBundle:Telephone:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Telephone();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('telephone_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Telephone entity.
     *
     * @param Telephone $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Telephone $entity)
    {
        $form = $this->createForm(new TelephoneType(), $entity, array(
            'action' => $this->generateUrl('telephone_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Telephone entity.
     *
     * @Route("/new", name="telephone_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Telephone();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Telephone entity.
     *
     * @Route("/{id}", name="telephone_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ContactsBoxBundle:Telephone')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Telephone entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Telephone entity.
     *
     * @Route("/{id}/edit", name="telephone_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ContactsBoxBundle:Telephone')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Telephone entity.');
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
    * Creates a form to edit a Telephone entity.
    *
    * @param Telephone $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Telephone $entity)
    {
        $form = $this->createForm(new TelephoneType(), $entity, array(
            'action' => $this->generateUrl('telephone_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Telephone entity.
     *
     * @Route("/{id}", name="telephone_update")
     * @Method("PUT")
     * @Template("ContactsBoxBundle:Telephone:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ContactsBoxBundle:Telephone')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Telephone entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('telephone_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Telephone entity.
     *
     * @Route("/{id}", name="telephone_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ContactsBoxBundle:Telephone')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Telephone entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('telephone'));
    }

    /**
     * Creates a form to delete a Telephone entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('telephone_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
