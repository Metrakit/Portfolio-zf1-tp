<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        /* @var $authIdentity Model_User */
        if (Zend_Auth::getInstance()->hasIdentity()) {
            $authIdentity = Zend_Auth::getInstance()->getIdentity();
            $userMapper = new Model_Mapper_User();
            $user = $userMapper->find($authIdentity->getId());
            var_dump('Bienvenue ' . $user->getLogin());
        } else {
            var_dump('Bienvenue guest');
        }

    }  

}

