<?php

namespace User\Form\Fieldset;

use Laminas\InputFilter\InputFilterProviderInterface;
use Laminas\Form\Fieldset;
use Laminas\Validator\StringLength;
use Laminas\Validator\EmailAddress;
use DoctrineModule\Validator\NoObjectExists;
use Laminas\Validator\Identical;
use Doctrine\Laminas\Hydrator\DoctrineObject;
use User\Entity\User;

//use Service\ServiceInterface\GeneralInterface;
use General\Service\GeneralService;
use Doctrine\ORM\EntityManager;
use Laminas\Form\Element\Checkbox;

/**
 *
 * @author swoopfx
 *
 */
class UserBasicFieldset extends Fieldset implements InputFilterProviderInterface
{

    /**
     *
     * @var EntityManager
     */
    private $entityManager;

    /**
     *
     * @var GeneralService
     */
    private $generalService;

    public function init()
    {
//
        $hydrator = new DoctrineObject($this->entityManager);
        $this->setHydrator($hydrator)->setObject(new User());
        $this->addFields();
    }

    private function addFields()
    {
        $this->add(array(
            'name' => 'firstname',
            'type' => 'text',
            'options' => array(
                'label' => 'Fistname',
                'label_attributes' => array(
                    'class' => 'control-label col-md-3 col-sm-3 col-xs-12'
                )
            ),
            'attributes' => array(
                'class' => 'form-control col-md-9 col-xs-12',
                'id' => 'username',
                'required' => 'required',
                'title' => 'Provide First name'
            )
        ));

        $this->add(array(
            'name' => 'lastname',
            'type' => 'text',
            'options' => array(
                'label' => 'Last Name',
                'label_attributes' => array(
                    'class' => 'control-label col-md-3 col-sm-3 col-xs-12'
                )
            ),
            'attributes' => array(
                'class' => 'form-control col-md-9 col-xs-12',
                'id' => 'lastname',
                'required' => 'required',
                'title' => 'Last Name'
            )
        ));
        $this->add(array(
            'name' => 'email',
            'type' => 'Laminas\Form\Element\Email',
            'options' => array(
                'label' => 'Staff Email',
                'label_attributes' => array(
                    'class' => 'control-label col-md-3 col-sm-3 col-xs-12'
                )
            ),
            'attributes' => array(
                'id' => 'email',
                'required' => 'required',
                'class' => 'form-control col-md-9 col-xs-12',
                'title' => 'Provide Email accessible ',
                'placeholder' => 'az@xyz.com'
            )
        ));
        $this->add(array(
            'name' => 'password',
            'type' => 'Laminas\Form\Element\Password',
            'options' => array(
                'label' => 'Proposed Password',
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

        $this->add(array(
            'name' => 'passwordVerify',
            'type' => 'Laminas\Form\Element\Password',
            'options' => array(
                'label' => 'Confirm Password',
                'label_attributes' => array(
                    'class' => 'control-label col-md-3 col-sm-3 col-xs-12'
                )
            ),
            'attributes' => array(
                'class' => 'form-control col-md-9 col-xs-12',
                'id' => 'passwordVerify',
                'required' => 'required'
            )
        ));

        $this->add([
            "name" => "newsletter",
            "type" => Checkbox::class,
            "options" => [
                "label" => "if you want to get updates and lates insurance information please click on thin link ",
                'label_attributes' => array(
                    'class' => 'control-label col-md-3 col-sm-3 col-xs-12'
                )
            ],
            'attributes' => [
                'class' => 'form-control col-md-9 col-xs-12'

            ]
        ]);

        $this->add([
            "name" => "terms",
            "type" => Checkbox::class,
            "options" => [
                "label" => "I have read and accept the Terms & Conditions and Privacy Policy",
                'label_attributes' => array(
                    'class' => 'control-label col-md-3 col-sm-3 col-xs-12'
                )
            ],
            'attributes' => [
                'class' => 'form-control col-md-9 col-xs-12'

            ]
        ]);

//        $this->add(array(
//            'name' => 'usernameOrEmail',
//            'type' => 'text',
//            'options' => array(
//                'label' => 'Username',
//                'label_attributes' => array(
//                    'class' => ''
//                )
//            ),
//            'attributes' => array(
//                'class' => 'form-control col-md-9 col-xs-12',
//                'id' => 'username',
//                'required' => 'required',
//                'title' => 'Provide Staffs phone number'
//            )
//        ));
    }

    /**
     * (non-PHPdoc)
     *
     * @see \Laminas\InputFilter\InputFilterProviderInterface::getInputFilterSpecification()
     *
     */
    public function getInputFilterSpecification()
    {
        return array(
            "firstname" => array(
                "required" => true,
                "allow_empty" => false,
                "filters" => array(
                    array(
                        'name' => 'StripTags'
                    ),
                    array(
                        'name' => 'StringTrim'
                    )
                ),
                "validators" => array(
                    array(
                        'name' => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min' => 2,
                            'max' => 50,
                            "messages" => array(
                                StringLength::TOO_SHORT => "The firstname must be more than 2 characters",
                                StringLength::TOO_LONG => "This firstname is too long to memorize"
                            )
                        )
                    )
                )
            ),

            "lastname" => array(
                "required" => true,
                "allow_empty" => false,
                "filters" => array(
                    array(
                        'name' => 'StripTags'
                    ),
                    array(
                        'name' => 'StringTrim'
                    )
                ),
                "validators" => array(
                    array(
                        'name' => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min' => 2,
                            'max' => 50,
                            "messages" => array(
                                StringLength::TOO_SHORT => "The lastname must be more than 2 characters",
                                StringLength::TOO_LONG => "This last is too long"
                            )
                        )
                    )
                )
            ),
            "password" => array(
                "required" => true,
                "allow_empty" => false,
                "filters" => array(
                    array(
                        'name' => 'StripTags'
                    ),
                    array(
                        'name' => 'StringTrim'
                    )
                ),
                "validators" => array(
                    array(
                        'name' => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min' => 6,
                            'max' => 50,
                            "messages" => array(
                                StringLength::TOO_SHORT => "The password must be more than 6 characters",
                                StringLength::TOO_LONG => "This password is too long to memorize"
                            )
                        )
                    )
                )
            ),

            "passwordVerify" => array(
                "required" => true,
                "allow_empty" => false,
                "validators" => array(
                    array(
                        'name' => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min' => 6,
                            'max' => 50,
                            "messages" => array(
                                StringLength::TOO_SHORT => "The password must be more than 6 characters",
                                StringLength::TOO_LONG => "This password is too long to memorize"
                            )
                        )
                    ),
                    array(
                        'name' => 'Identical',
                        'options' => array(
                            'token' => 'password',
                            "messages" => array(
                                Identical::NOT_SAME => "The passwords are not identical"
                            )
                        )
                    )
                )
            ),
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
                    // array(
                    // 'name' => 'Regex',
                    // 'options' => array(
                    // 'pattern' => '/^[a-zA-Z0-9.!#$%&\'*+\/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/',
                    // 'messages' => array(
                    // Regex::NOT_MATCH => 'Please provide a valid email address.'
                    // )
                    // ),
                    // 'break_chain_on_failure' => true
                    // ),
                    array(
                        'name' => 'DoctrineModule\Validator\NoObjectExists',
                        'options' => array(
                            'use_context' => true,
                            'object_repository' => $this->entityManager->getRepository('CsnUser\Entity\User'),
                            'object_manager' => $this->entityManager,
                            'fields' => array(
                                'email'
                            ),
                            'messages' => array(

                                NoObjectExists::ERROR_OBJECT_FOUND => 'Someone else is registered with this email'
                            )
                        )
                    ),
                    array(
                        'name' => 'Laminas\Validator\StringLength',
                        'options' => array(
                            'messages' => array(),
                            'min' => 3,
                            'max' => 256,
                            'messages' => array(
                                StringLength::TOO_SHORT => 'Email Too short',
                                StringLength::TOO_LONG => 'We dont think this is a genuine email'
                            )
                        ),

                        array(
                            'name' => 'EmailAddress',

                            'options' => array(

                                'messages' => array(
                                    EmailAddress::INVALID_FORMAT => 'Please check your email something is not right'
                                )
                            )
                        )
                    )

                )
            ),
            'username' => array(
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
                    array(

                        'name' => 'DoctrineModule\Validator\NoObjectExists',
                        'options' => array(
                            'use_context' => false,
                            'object_repository' => $this->entityManager->getRepository('CsnUser\Entity\User'),
                            'object_manager' => $this->entityManager,
                            'fields' => [
                                'username'
                            ],
                            'use_context' => true,
                            'messages' => array(
                                NoObjectExists::ERROR_OBJECT_FOUND => 'Someone else is registered with this phone number'
                            )
                        )
                    ),

                    array(
                        'name' => 'StringLength',
                        'options' => array(
                            'min' => 9,
                            'max' => 11,
                            'messages' => array(
                                StringLength::TOO_SHORT => 'Please insert the correct amount of digits',
                                StringLength::TOO_LONG => 'We dont think this is a genuine phone number'
                            )
                        )
                    )
                )
            )
        );
    }

    /**
     * @return EntityManager
     */
    public function getEntityManager(): EntityManager
    {
        return $this->entityManager;
    }

    /**
     * @param EntityManager $entityManager
     */
    public function setEntityManager(EntityManager $entityManager): UserBasicFieldset
    {
        $this->entityManager = $entityManager;
        return $this;
    }

    /**
     * @return GeneralService
     */
    public function getGeneralService(): GeneralService
    {
        return $this->generalService;
    }

    /**
     * @param GeneralService $generalService
     */
    public function setGeneralService(GeneralService $generalService): UserBasicFieldset
    {
        $this->generalService = $generalService;
        return $this;
    }


}

