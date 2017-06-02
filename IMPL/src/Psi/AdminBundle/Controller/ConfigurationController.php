<?php
namespace Psi\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

class ConfigurationController extends Controller
{

    /**
     * Lists all system settings in a form
     * 
     * @Security("has_role('ROLE_ADMIN')")
     * @Route("/list", name="configuration_list_action")
     */
    public function listAction()
    {
        
    }

    /**
     * Updates system settings configuration
     * 
     * @Security("has_role('ROLE_ADMIN')")
     * @Route("/update", name="configuration_update_action")
     */
    public function updateAction()
    {
        
    }
}
