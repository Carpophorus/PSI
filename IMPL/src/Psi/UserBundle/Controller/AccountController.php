<?php
// Stefan Erakovic 3086/2016
namespace Psi\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Psi\UserBundle\Form\LoginForm;
use Psi\UserBundle\Form\RegisterForm;
use Psi\UserBundle\Form\ResetForm;
use Psi\UserBundle\Model\TokenStatus;
use Psi\UserBundle\Model\UserStatus;
use Psi\UserBundle\Entity\AccessToken;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;

class AccountController extends Controller
{

    /**
     * User my account dashboard
     * @param Request $request
     * @Route("/", name="user_index_action")
     */
    public function indexActon(Request $request)
    {
        $loginForm = $this->createFormBuilder(new LoginForm())
            ->add('email', EmailType::class)
            ->add('password', PasswordType::class)
            ->add('save', SubmitType::class, array('label' => 'Login'))
            ->getForm();

        $registerForm = $this->createFormBuilder(new RegisterForm())
            ->add('email', EmailType::class)
            ->add('username', TextType::class)
            ->add('password', RepeatedType::class, array(
                'type' => PasswordType::class,
                'first_options' => array('label' => 'Password'),
                'second_options' => array('label' => 'Repeat Password'),
            ))
            ->add('save', SubmitType::class, array('label' => 'Register'))
            ->getForm();

        $resetForm = $this->createFormBuilder(new RegisterForm())
            ->add('email', EmailType::class)
            ->getForm();

        return $this->render(
                'PsiUserBundle:Account:login.html.php', [
                'router' => $this->container->get('router'),
                'loginForm' => $loginForm->createView(),
                'registerForm' => $registerForm->createView(),
                'resetPasswordForm' => $resetForm->createView()
        ]);
    }

    public function resetAction(Request $request)
    {
        $resetForm = new ResetForm();
        $form = $this->createFormBuilder($resetForm)
            ->add('email', EmailType::class)
            ->getForm();

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $resetForm = $form->getData();
            $userManager = $this->get('psi.user.manager');
            //echo success message
        }
    }

    /**
     * @Route("/login", name="user_login_action")
     */
    public function loginAction(Request $request)
    {
        $loginForm = new LoginForm();

        $form = $this->createFormBuilder($loginForm)
            ->add('email', EmailType::class)
            ->add('password', PasswordType::class)
            ->add('save', SubmitType::class, array('label' => 'Login'))
            ->getForm();
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $loginForm = $form->getData();

            $email = $loginForm->getEmail();
            $password = $loginForm->getPassword();

            $manager = $this->get('psi.user.manager');

            $user = $manager->validateCredentials($email, $password);
            if ($user) {
                $roles = $user->getRoles()->toArray();
                $roles[] = "IS_AUTHENTICATED_FULLY";

                $token = new UsernamePasswordToken($user, $user->getPassword(), "main", $roles);
                $this->get("security.token_storage")->setToken($token);

                $event = new InteractiveLoginEvent($request, $token);
                $this->get("event_dispatcher")->dispatch("security.interactive_login", $event);

                $this->addFlash('success', "You have been logged in.");
                return $this->redirect('');
                // echo success message
            } else {
                // echo fail message
                $this->addFlash('error', "Invalid login information.");
            }
        }

        return $this->redirectToRoute('user_index_action');
    }

    /**
     * @Route("/register", name="user_register_action")
     */
    public function registerAction(Request $request)
    {
        $registerForm = new RegisterForm();
        $form = $this->createFormBuilder($registerForm)
            ->add('email', EmailType::class)
            ->add('username', TextType::class)
            ->add('password', RepeatedType::class, array(
                'type' => PasswordType::class,
                'first_options' => array('label' => 'Password'),
                'second_options' => array('label' => 'Repeat Password'),
            ))
            ->add('save', SubmitType::class, array('label' => 'Register'))
            ->getForm();
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $registerForm = $form->getData();

            $userManager = $this->get('psi.user.manager');

            $username = $registerForm->getUsername();
            $email = $registerForm->getEmail();
            $password = $registerForm->getPassword();

            $user = $userManager->newUser($username, $email, $password);

            if ($user) {
                // echo success message
            } else {
                // echo fail message
            }
        }
    }

    /**
     * @Route("/confirm/{token}", name="user_confirm_action")
     * @param Request $request
     * @return Response
     */
    public function confirmAction(Request $request)
    {
        $token = $request->get("token");
        $manager = $this->getDoctrine()->getManager();
        $repository = $manager->getRepository(AccessToken::class);
        $tokenManager = $this->get("psi.user.access.token.manager");

        // expire old tokens
        $tokenManager->expireTokens();

        $result = $repository->findOneBy([
            'token' => $token,
            'state' => TokenStatus::STATUS_VALID
        ]);

        if ($result) {
            // activate user
            $user = $result->getUser();
            $user->setStatus(UserStatus::STATUS_ENABLED);
            $result->setState(TokenStatus::STATUS_INVALID);
            $manager->persist($result);
            $manager->persist($user);
            $manager->flush();

            $this->addFlash('success', "Your account has been activated. You may now login.");
        } else {
            $this->addFlash('error', "The confirmation url you used is no longer valid.");
        }
        // invalid token
        return $this->redirectToRoute('user_login_action');
    }
}
