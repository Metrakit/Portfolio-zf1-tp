<?php
class Form_Login extends Zend_Form 
{
    public function init()
    {
        // Méthode longue
        $username = $this->createElement('text', 'login');
        $username->setLabel('login');
        $this->addElement($username);
        
        // Méthode courte
        $this->addElement('password', 'password', array(
            'label' => 'Password'
        ));
        
  
        $this->addElement('submit', 'signin');
        
        // Possibilité de récupérer l'élément (c'est un objet)
        $signin = $this->getElement('signin');
        $signin->setLabel('Sign In');

    }
}