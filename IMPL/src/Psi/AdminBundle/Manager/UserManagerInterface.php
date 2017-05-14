<?php
namespace Psi\AdminBundle\Manager;

use Psi\UserBundle\Manager\UserManagerInterface as BaseUserManagerInterface;

interface UserManagerInterface extends BaseUserManagerInterface
{
    
    /**
     * Returns underlying user manager
     * @return \Psi\UserBundle\Manager\UserManagerInterface
     */
    public function getUserManager();
    
}
