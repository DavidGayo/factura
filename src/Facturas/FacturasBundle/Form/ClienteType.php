<?php

namespace Facturas\FacturasBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ClienteType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('razonSocial')
            ->add('calle')
            ->add('numeroExt')
            ->add('numeroInt')
            ->add('colonia')
            ->add('rfc')
            ->add('codigoPostal')
            ->add('telefono')
            ->add('localidad')
            ->add('alias')
            ->add('email')
            ->add('regimenTributario')
            ->add('tipoMoneda')
            ->add('pais')
            ->add('estado')
            ->add('municipio')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Facturas\FacturasBundle\Entity\Cliente'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'facturas_facturasbundle_cliente';
    }
}
