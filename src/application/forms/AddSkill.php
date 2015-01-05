<?php
class Form_AddSkill extends Zend_Form
{
    public function init()
    {
      
        $label = $this->createElement('text', 'label');
        $label->setLabel('Label')
               ->setRequired(true);
        $this->addElement($label);
        
        $level = $this->createElement('select', 'level');
        $level->setLabel('Level')     
              ->addMultiOptions(array(
                   '1' => '1',
                   '2' => '2',
                   '3' => '3',
                   '4' => '4',
                   '5' => '5'
             ))
             ->addValidator(new Zend_Validate_Digits())
             ->setRequired(true);
        $this->addElement($level);    
              
        $this->addElement('textarea', 'description', array(
            'label' => 'Description'
        )); 
               
        $type = $this->createElement('select', 'type');
        $type->setLabel('Type')
             ->addMultiOptions(array(
                'dev-front' => 'Development front',
                'dev-back' => 'Develoment Back',
                'webdesign' => 'Webdesign',
                'network' => 'Network',
                'System'  => 'System'
            ))
            ->setRequired(true);
        $this->addElement($type);
        
        $years = $this->createElement('text', 'years');
        $years->setLabel('Years')
              ->addValidator(new Zend_Validate_Digits());
        $this->addElement($years);
        
        $this->addElement('submit', 'submit', array(
            'label' => 'Add skill'
        ));
        

    }
}