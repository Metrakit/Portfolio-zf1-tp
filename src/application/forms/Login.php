<?php
class Form_Login extends Zend_Form 
{
    public function init()
    {
        // M�thode longue
        $username = $this->createElement('text', 'login');
        $username->setLabel('login');
        $this->addElement($username);
        
        // M�thode courte
        $this->addElement('password', 'password', array(
            'label' => 'Password'
        ));
        
  
        $this->addElement('submit', 'signin');
        
        // Possibilit� de r�cup�rer l'�l�ment (c'est un objet)
        $signin = $this->getElement('signin');
        $signin->setLabel('Sign In');

    }
}