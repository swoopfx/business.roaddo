<?php
namespace User\Form\Fieldset;

use Laminas\Form\Fieldset;

use Laminas\InputFilter\InputFilterProviderInterface;


/**
 *
 * @author mac
 *        
 */
class LoginFieldset extends Fieldset implements InputFilterProviderInterface
{

   
    
    
//     /**
//      *
//      * @param null|int|string $name
//      *            Optional name for the element
//      *            
//      * @param array $options
//      *            Optional options for the element
//      *            
//      */
//     public function __construct($name = null, $options = null)
//     {
//         parent::__construct($name = null, $options = null);
//
//     }



    public function __construct($name = null, $options = null){
//         $hydrator = new DoctrineObject($this->entityManager);
        parent::__construct($name = null, $options = null);
        $this->add(array(
            'name' => 'email',
            'type' => 'text',
            'options' => array(
                'label' => ' Email',
                'label_attributes' => array(
                    'class' => 'control-label col-md-3 col-sm-3 col-xs-12'
                )
            ),
            'attributes' => array(
                'class' => 'form-control col-md-9 col-xs-12',
                'id' => 'username',
                'required' => 'required',
                'title' => 'Provide  email'
            )
        ));
       
        $this->add(array(
            'name' => 'password',
            'type' => 'Laminas\Form\Element\Password',
            'options' => array(
                'label' => 'User Password',
                'label_attributes' => array(
                    'class' => 'control-label col-md-3 col-sm-3 col-xs-12'
                )
            ),
            'attributes' => array(
                'id' => 'password',
                'required' => 'required',
                'class' => 'form-control col-md-9 col-xs-12'
            )
        ));
        
    }
    /**
     * {@inheritDoc}
     * @see \Laminas\InputFilter\InputFilterProviderInterface::getInputFilterSpecification()
     */
    public function getInputFilterSpecification()
    {
        return [
            'email' => array(
                'required' => true,
                'allow_empty' => false,
                'break_chain_on_failure' => true,
                'filters' => array(
                    array(
                        'name' => 'StripTags'
                    ),
                    array(
                        'name' => 'StringTrim'
                    )
                ),
                'validators' => array(
//            
                )
            ),
            
            'password' => array(
                'required' => true,
                'allow_empty' => false,
                'break_chain_on_failure' => true,
                'filters' => array(
                    array(
                        'name' => 'StripTags'
                    ),
                    array(
                        'name' => 'StringTrim'
                    )
                ),
                'validators' => array(
                //
                )
            )
        ];
        
    }

    
     
    
}

