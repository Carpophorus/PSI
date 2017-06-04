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

/**
 * @Route("/configuration")
 * @Security("has_role('ROLE_ADMIN')")
 */
class ConfigurationController extends Controller
{

    /**
     * Lists all system settings in a form
     * 
     * @Route("/", name="configuration_index_action")
     */
    public function indexAction()
    {
        $configurationRegistry = $this->get('psi.configuration.manager.registry');

        return $this->render(
                'PsiAdminBundle:Configuration:configuration.html.php', [
                'configurationRegistry' => $configurationRegistry,
                'router' => $this->container->get('router')
        ]);
    }

    /**
     * Updates system settings configuration
     * 
     * @Route("/update", name="configuration_update_action")
     */
    public function updateAction()
    {
        
    }
}
