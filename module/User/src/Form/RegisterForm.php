<?php
namespace User\Form;

use Laminas\Form\Form;
use User\Form\Fieldset\UserBasicFieldset;

/**
 *
 * @author mac
 *        
 */
class RegisterForm extends Form
{

    // TODO - Insert your code here
    
    public function init(){
        $this->setAttributes(array(
//            'action'=>'',
            'method'=>'POST',
            "autocomplete"=>"off"
        ));
        $this->addFields();
        $this->addCommon();
    }
    
    public function addFields(){
        $this->add(array(
            'name'=>'userBasicField',
            'type'=>UserBasicFieldset::class,
            'options'=>array(
                'use_as_base_fieldset'=>true
            )
        ));
        
//        $this->add(array(
//            'name'=>'securityQuestion',
//            'type'=>'',
//        ));
    }
    
    public function addCommon(){
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
            'attributes' => array(
                'type' => 'submit'
            )
        ));
    }


}

