<?php

namespace Facturas\FacturasBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class LlaveType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('llave','file', array(
                'attr'=> array('id' => 'file-1',
                                'class' => 'file',
                                'data-overwrite-initial' => 'false',
                                'data-min-file-count' => '1' ),
                'data_class' => null,
                'property_path' => 'llave',
                'required' => false,
                ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Facturas\FacturasBundle\Entity\Llave'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'facturas_facturasbundle_llave';
    }
}
