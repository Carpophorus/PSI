<?php
namespace Psi\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Psi\AdminBundle\Form\UserForm;
use Psi\UserBundle\Entity\User;

/**
 * @Route("/user")
 * @Security("has_role('ROLE_ADMIN')")
 */
class UserController extends Controller
{

    /**
     * Lists all users in the system
     * 
     * @Route("/list", name="admin_user_list_action")
     */
    public function listAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository(User::class);

        return $this->render(
                'PsiAdminBundle:User:list.html.php', [
                'repository' => $repository,
                'router' => $this->container->get('router')
        ]);
    }

    /**
     * Renders user view
     * 
     * @Route("/view/{user}", name="admin_user_view_action", requirements={"user": "\d+"})
     */
    public function viewAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $manager = $this->get('psi.user.manager');

        $user = $manager->findUser(['id' => $request->get('user')]);

        return $this->render(
                'PsiAdminBundle:User:view.html.php', [
                'user' => $user,
                'router' => $this->container->get('router')
        ]);
    }

    protected function buildUserForm(UserForm $userForm, $statusRegistry)
    {
        return $this->createFormBuilder($userForm)
                ->add('email', EmailType::class)
                ->add('firstname', TextType::class)
                ->add('lastname', TextType::class)
                ->add('password', PasswordType::class)
                ->add('status', ChoiceType::class, [
                    'choices' => $statusRegistry->toFormOptions()
                ])
                ->add('summonerName', TextType::class)
                ->add('purchaseOrderNumber', TextType::class)
                ->add('additionalData', TextareaType::class)
                ->add('save', SubmitType::class, array('label' => 'Save'))
                ->getForm();
    }

    protected function extractAdditionalData(UserForm $userForm)
    {
        return serialize([
            'firstname' => $userForm->getFirstname(),
            'lastname' => $userForm->getLastname(),
            'purchaseOrderNumber' => $userForm->getPurchaseOrderNumber(),
            'additional' => $userForm->getAdditionalData(),
            'summonerName' => $userForm->getSummonerName()
        ]);
    }

    /**
     * User new action
     * 
     * @Route("/new", name="admin_user_new_action")
     */
    public function newAction(Request $request)
    {
        $manager = $this->get('psi.user.manager');
        $statusRegistry = $this->get('psi.user.model.user.status');

        $userForm = new UserForm();

        $form = $this->buildUserForm($userForm, $statusRegistry);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $userForm = $form->getData();

            $additionalData = $this->extractAdditionalData($userForm);
            $user = $manager->newUser($userForm->getEmail(), $userForm->getEmail(), $userForm->getPassword());
            $user->getEntity()
                ->setStatus($userForm->getStatus())
                ->setAdditionalData($additionalData);
            
            $manager->saveUser($user);

            $this->addFlash('success', 'User added.');
            return $this->redirectToRoute('admin_user_edit_action', ['user' => $user->getId()]);
        }

        return $this->render(
                'PsiAdminBundle:User:new.html.php', [
                'form' => $form->createView(),
                'router' => $this->container->get('router')
        ]);
    }

    /**
     * User edit action
     * 
     * @Route("/edit/{user}", name="admin_user_edit_action", requirements={"user": "\d+"})
     */
    public function editAction(Request $request)
    {
        $manager = $this->get('psi.user.manager');
        $statusRegistry = $this->get('psi.user.model.user.status');
        $user = $manager->findUser(['id' => $request->get('user')]);

        if (!$user || !$user->getId()) {
            $this->addFlash('error', "Requested user doesn't exist");
            return $this->redirectToRoute('admin_user_list_action');
        }

        $userForm = new UserForm();

        $additionalData = unserialize($user->getEntity()->getAdditionalData());

        $userForm->setEmail($user->getEmail())
            ->setFirstname($additionalData['firstname'])
            ->setLastname($additionalData['lastname'])
            ->setStatus($user->getStatus())
            ->setPurchaseOrderNumber($additionalData['purchaseOrderNumber'])
            ->setAdditionalData($additionalData['additional'])
            ->setSummonerName($additionalData['summonerName']);

        $form = $this->buildUserForm($userForm, $statusRegistry);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $userForm = $form->getData();

            $additionalData = $this->extractAdditionalData($userForm);

            $user->getEntity()
                ->setUsername($userForm->getEmail())
                ->setEmail($userForm->getEmail())
                ->setStatus($userForm->getStatus())
                ->setAdditionalData($additionalData);

            $manager->updatePassword($user, $userForm->getPassword());

            $this->addFlash('success', 'User updated.');
        }


        return $this->render(
                'PsiAdminBundle:User:edit.html.php', [
                'user' => $user,
                'form' => $form->createView(),
                'router' => $this->container->get('router')
        ]);
    }
}
