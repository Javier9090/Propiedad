<?php

namespace Acme\PropiedadesBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PropiedadType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('calle')
            ->add('numero')
            ->add('piso')
            ->add('departamento')
            ->add('estado')
            ->add('precio')
            ->add('cantidadAmbientes')
            ->add('cantidadBanios')
            ->add('observaciones')
            ->add('zona')
            ->add('tipoPropiedad')
            ->add('Caracteristicas')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Acme\PropiedadesBundle\Entity\Propiedad'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'acme_propiedadesbundle_propiedad';
    }
}
