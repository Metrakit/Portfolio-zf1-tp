<?php

class AuthenticateController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function loginAction()
    {
        $form = new Form_Login();
        
        if ($this->getRequest()->isPost()) {  
            $data = $this->getRequest()->getPost();
            if ($form->isValid($data)) {
                $login = $form->getValue('login');
                $password = $form->getValue('password');
                
                $adapter = new Zend_Auth_Adapter_DbTable();
                $adapter->setTableName(Model_DbTable_User::TABLE_NAME)
                        ->setIdentityColumn(Model_DbTable_User::COL_LOGIN)
                        ->setCredentialColumn(Model_DbTable_User::COL_PASSWORD)
                        ->setIdentity($login)
                        ->setCredential($password);
                
                $auth = Zend_Auth::getInstance();
                
                $authResult = $auth->authenticate($adapter);
                
                if ($authResult->isValid()) {
                    // Récupération de l'objet de stockage des informations d'authentification
                    $storage = $auth->getStorage();
                    
                    // Récupération des données d'authentification
                    $row = $adapter->getResultRowObject(null, Model_DbTable_User::COL_PASSWORD);

                    // Création d'un Model_user
                    $user = new Model_User();
                    $id = Model_DbTable_User::COL_ID;
                    $login = Model_DbTable_User::COL_LOGIN;
                    $email = Model_DbTable_User::COL_EMAIL;
                    
                    $user->setId($row->id);
                    $user->setLogin($row->login);
                    $user->setEmail($row->email); 
                   
                    // Ecriture dans l'objet de stockage des nouvelles informationso
                    $storage->write($user);
                    
                }

                // Check si l'auth est ok
                if ($authResult->getCode() == Zend_Auth_Result::SUCCESS) {
                    // Redirection sur la home
                    $this->redirect($this->view->url(array(), 'IndexIndex'));
                } else {
                    var_dump('login failed');
                }
            }
            
            // message erreur
        }
        
        $this->view->form = $form;
        
        $this->view->assign('form', $form);

    }

    public function logoutAction()
    {
        $this->_helper->viewRenderer->setNoRender();
        
        Zend_Auth::getInstance()->clearIdentity();
        $this->redirect($this->view->url(array(), 'IndexIndex'));
    }

}

