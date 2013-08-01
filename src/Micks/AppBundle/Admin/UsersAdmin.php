<?php
namespace Micks\AppBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Symfony\Component\HttpFoundation\Request;

use Knp\Menu\ItemInterface as MenuItemInterface;
use Symfony\Component\Security\Core\Encoder\MessageDigestPasswordEncoder;

class UsersAdmin extends Admin
{
    /**
    * Method is called before record create
    * @param $entity
    * @return void
    */
    public function prePersist($entity)
    {
        $form = $this->getForm();
        $entity->setSalt(md5(time()));
        $encoder = new MessageDigestPasswordEncoder('sha512', true, 10);
        $password = $encoder->encodePassword($entity->getPassword(), $entity->getSalt());
        $entity->setPassword($password);
    }
    
    /**
    * Method is called before record update
    * @param $entity
    * @return void
    */
    public function preUpdate($entity)
    {
         $form = $this->getForm();
         $user = $this->getObject($entity->getId());
         if($entity->getPassword() != '')
         {
            $encoder = new MessageDigestPasswordEncoder('sha512', true, 10);
            $password = $encoder->encodePassword($entity->getPassword(), $entity->getSalt());
            $entity->setPassword($password);
         }
         else {
             $entity->setPassword($user->getPassword());
         } 
         
    }
    /**
    * Configuration of the record view
    *
    * @param \Sonata\AdminBundle\Show\ShowMapper $showMapper
    * @return void
    */
    protected function configureShowField(ShowMapper $showMapper)
    {
        $showMapper
                ->add('id', null, array('label' => 'Id'))
                ->add('name', null, array('label' => 'Name'))
                ->add('email', null, array('label' => 'Email'))
                ->add('role', null, array('label' => 'Role'));
    }

    /**
    * Configuration of the record edit form
    * @param \Sonata\AdminBundle\Form\FormMapper $formMapper
    * @return void
    */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
                ->add('name', null, array('label' => 'Name'))
                ->add('email', null, array('label' => 'Email'))
                ->add('role', null, array('label' => 'Role', 'required' => true))
                ->add('password', null, array('label' => 'Password', 'data' => '', 'required' =>  ($this->getSubject()->getId()? false: true)));

    }

    /**
    * Configuration of the records list
    *
    * @param \Sonata\AdminBundle\Datagrid\ListMapper $listMapper
    * @return void
    */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
                ->addIdentifier('id')
                ->addIdentifier('name', null, array('label' => 'Name'))
                ->add('email', null, array('label' => 'Email'))
                ->add('role', null, array('label' => 'Role'));
    }

    /**
    * Fields, which are used in search in the list of the records
    *
    * @param \Sonata\AdminBundle\Datagrid\DatagridMapper $datagridMapper
    * @return void
    */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
                ->add('name', null, array('label' => 'Name'))
                ->add('email', null, array('label' => 'Email'));
//                ->add('role', null, array('label' => 'Role'));
    }

    /**
    * Configuration of the left menu while displaing and editing record 
    * 
    * @param \Knp\Menu\ItemInterface $menu
    * @param $action
    * @param null|\Sonata\AdminBundle\Admin\Admin $childAdmin
    *
    * @return void
    */
    protected function configureSideMenu(MenuItemInterface $menu, $action, Admin $childAdmin = null)
    {
        if ($action == 'edit' || $action == 'show')
        $menu->addChild(
            $action == 'edit' ? 'View User' : 'Edit User',
            array('uri' => $this->generateUrl(
                $action == 'edit' ? 'show' : 'edit', array('id' => $this->getRequest()->get('id'))))
        );
    }
}