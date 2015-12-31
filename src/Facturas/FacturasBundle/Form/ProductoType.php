<?php

namespace Facturas\FacturasBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProductoType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('codigoBarras')
            ->add('clave')
            ->add('marca')
            ->add('unidadMedida')
            ->add('precioUnitarioMxn')
            ->add('precioUnitarioUsd')
            ->add('modelo')
            ->add('descripcion')
            ->add('tipoProducto')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Facturas\FacturasBundle\Entity\Producto'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'facturas_facturasbundle_producto';
    }
}
