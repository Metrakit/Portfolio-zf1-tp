<?php

class Model_Mapper_User 
{
    
    public function find($userId)
    {
        $dbTable = new Model_DbTable_User();
        $result = $dbTable->find($userId);
        
        if (0 === $result->count()) {
            return false;
        }
        
        return $this->rowToObject($result->current());
    }
    
    private function objectToRow(Model_User $user)
    {
        return array(
            Model_DbTable_User::COL_ID => $user->getId(),
            Model_DbTable_User::COL_LOGIN => $user->getLogin(),
            Model_DbTable_User::COL_PASSWORD => $user->getPassword(),
            Model_DbTable_User::COL_EMAIL => $user->getEmail(),
            Model_DbTable_User::COL_CREATED => $user->getCreated()->toString()
        );
    }
    
    private function rowToObject($data)
    {
        $user = new Model_User();
        $user->setId($data[Model_DbTable_User::COL_ID])
             ->setLogin($data[Model_DbTable_User::COL_LOGIN])
             ->setPassword($data[Model_DbTable_User::COL_PASSWORD])
             ->setEmail($data[Model_DbTable_User::COL_EMAIL])
             ->setCreated($data[Model_DbTable_User::COL_CREATED]);
        
        return $user;
    }
        
}