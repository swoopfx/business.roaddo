<?php
namespace User\Form;

use Laminas\Form\Form;
use User\Form\Fieldset\LoginFieldset;

/**
 *
 * @author mac
 *        
 */
class LoginForm extends Form
{




    

    

    // }
    public function __construct($name = null, $options = null){
//         $hydrator = new DoctrineObject($this->entityManager);
        parent::__construct($name = null, $options = null);


        $this->setAttributes([
//            'action' => '',
            'method' => 'POST',
            "autocomplete" => "off"
        ]);
        
        $this->add(array(
            'name' => 'userBasicField',
            'type' => LoginFieldset::class,
            'options' => array(
                'use_as_base_fieldset' => true
            )
        ));

        $this->add(array(
            'name' => 'rememberme',
            'type' => 'checkbox',
            'options' => array(

            )
        ));
        
        $this->add(array(
            'name' => 'csrf',
            'type' => 'Laminas\Form\Element\Csrf',
            'options' => array(
                'csrf_options' => array(
                    'timeout' => 600
                )
            )
        ));
        
        $this->add(array(
            'name' => 'submit',
            'type' => 'Laminas\Form\Element\Submit',
            'options'=>array(
                "class"=>"btn btn-primary d-block"
            ),
            'attributes' => array(
                'type' => 'submit',

            )
        ));
    }
}

