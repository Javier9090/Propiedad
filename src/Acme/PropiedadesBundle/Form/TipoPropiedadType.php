<?php

namespace Acme\PropiedadesBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TipoPropiedadType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre')
            ->add('observaciones')
            ->add('propiedad')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Acme\PropiedadesBundle\Entity\TipoPropiedad'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'acme_propiedadesbundle_tipopropiedad';
    }
}
