<?php
namespace Acme\GuestbookBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class TaskType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('author', 'text', array('max_length' => 50))
            ->add('site', 'text')
            ->add('comment', 'textarea')
            ->add('point', 'choice', array(
                'choices'=> array(
                    '0'=>'0',
                    '1'=>'1',
                    '2'=>'2',
                    '3'=>'3',
                    '4'=>'4',
                    '5'=>'5',
                    '6'=>'6',
                    '7'=>'7',
                    '8'=>'8',
                    '9'=>'9',
                    '10'=>'10'
                )
            ))
            ->getForm();
    }

    public function getName()
    {
        return 'task';
    }
}