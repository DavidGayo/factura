<?php

namespace Facturas\FacturasBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EmailType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('usuario')
            ->add('contrasena','repeated',array(
                'type' => 'password',
                'ivanlid_message' => 'Los password no coinciden.',
                'options' => array('attr'=> array('class' => 'input-xlarge', 'minlength' => 8)),
                'required' => true,
                'first_options' => array('label' => 'Contraseña'),
                'second_options' => array('label' => 'Repita contraseña')
                ))
            ->add('protocolo')
            ->add('host')
            ->add('puerto')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Facturas\FacturasBundle\Entity\Email'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'facturas_facturasbundle_email';
    }
}
