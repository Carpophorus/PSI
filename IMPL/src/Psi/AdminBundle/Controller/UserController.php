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

class UserController extends Controller
{

    /**
     * Lists all users in the system
     * 
     * @Security("has_role('ROLE_ADMIN')")
     * @Route("/list", name="statistics_list_action")
     */
    public function listAction(Request $request)
    {
        
    }

    /**
     * Renders user view
     * 
     * @Security("has_role('ROLE_ADMIN')")
     * @Route("/view", name="admin_user_view_action")
     */
    public function viewAction(Request $request)
    {
        
    }

    /**
     * User edit action
     * 
     * @Security("has_role('ROLE_ADMIN')")
     * @Route("/edit", name="admin_user_edit_action")
     */
    public function editAction(Request $request)
    {
        
    }
}
