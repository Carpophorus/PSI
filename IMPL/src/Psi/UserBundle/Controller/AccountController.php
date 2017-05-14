<?php
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
        return $this->render(
                'PsiUserBundle:Account:index.html.php', [
        ]);
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

                return $this->redirectToRoute('user_index_action');
            } else {
                
            }
        }

        return $this->render(
                'PsiUserBundle:Account:login.html.php', [
                'router' => $this->container->get('router'),
                'form' => $form->createView()
        ]);
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

            return $this->render(
                    'PsiUserBundle:Account:register_success.html.php', [
                    'router' => $this->container->get('router')
            ]);
        }

        return $this->render(
                'PsiUserBundle:Account:register.html.php', [
                'router' => $this->container->get('router'),
                'form' => $form->createView()
        ]);
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

    public function resetPasswordAction(Request $request)
    {
        
    }

    /**
     * Test:
     * @Route("/delete/{id}")
     */
    public function deleteAction(Request $request)
    {
        $id = $request->get("id");

        $userManager = $this->get("psi.user.manager");

        $user = $userManager->findUser(['id' => $id]);
        if ($user) {
            $userManager->deleteUser($user);
        }

        return $this->redirectToRoute('user_register_action');
    }
}
