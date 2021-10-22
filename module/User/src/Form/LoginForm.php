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

    // TODO - Insert your code here
    
    // /**
    // */
    // public function __construct()
    // {
    
    // // TODO - Insert your co
    // }
    public function init()
    {
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

        $this->form->add(array(
            'name' => 'rememberme',
            'type' => 'checkbox',
            'options' => array(

            )
        ));
        
        $this->form->add(array(
            'name' => 'csrf',
            'type' => 'Laminas\Form\Element\Csrf',
            'options' => array(
                'csrf_options' => array(
                    'timeout' => 600
                )
            )
        ));
        
        $this->form->add(array(
            'name' => 'submit',
            'type' => 'Laminas\Form\Element\Submit',
            'attributes' => array(
                'type' => 'submit'
            )
        ));
    }
}

