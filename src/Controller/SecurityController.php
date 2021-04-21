<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\FormPasswordResetType;
use App\Form\RegistrationType;
use App\Form\ResetPasswordType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Csrf\TokenGenerator\TokenGeneratorInterface;

class SecurityController extends AbstractController
{

    public function __construct(SessionInterface $session){
        $this->session = $session;
    }

    /**
     * @Route("/inscription", name="registration")
     */
    public function registration(Request $request, EntityManagerInterface $manager, UserPasswordEncoderInterface $encoder, MailerInterface $mailer){
        if($this->getUser()){
            return $this->redirectToRoute('home');
        }
        $user = new  User;
        $form = $this->createForm(RegistrationType::class, $user);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $hash = $encoder->encodePassword($user, $user->getPassword());
            $user->setPassword($hash);

            // generate token
            $user->setActivationToken(md5(uniqid()));
            
            $manager->persist($user);
            $manager->flush();
            
            $email = (new TemplatedEmail())
            ->from('tristan.meillat28@gmail.com')
            ->to($user->getUsername())
            ->subject('Activation de votre compte Snowtricks')
            ->htmlTemplate('email/sendToken.html.twig')
            ->context([
                "token" => $user->getActivationToken()
            ]);

            $mailer->send($email);

            return $this->redirectToRoute('login');
        }

        return $this->render('pages/registration.html.twig',[
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/connexion", name="login")
     */
    public function login(){
        if($this->getUser()){
            return $this->redirectToRoute('home');
        }
        return $this->render('pages/login.html.twig');
    }

    /**
     * @Route("/logout", name="logout")
     */
    public function logout(){}

    /**
     * @Route("/activation/{token}", name="activation")
     */
    public function activationToken($token, UserRepository $userRepository){
        $user = $userRepository->findOneBy(['activationToken' => $token]);

        if(!$user){
            throw $this->createNotFoundException("Cet utilisateur n'éxiste pas");
        }

        $user->setActivationToken(null);

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($user);
        $entityManager->flush();

        $this->session->getFlashBag()->add('message', 'Votre compte à bien été activé !');
        return $this->redirectToRoute('home');
    }

    /**
     * @Route("/forgot-password", name="forgot-password")
     */
    public function forgotPassword(Request $request, TokenGeneratorInterface $tokenGenerator, UserRepository $userRepository, MailerInterface $mailer){
        if($this->getUser()){
            return $this->redirectToRoute('home');
        }
        $form = $this->createForm(ResetPasswordType::class);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $data = $form->getData();
            $user = $userRepository->findOneByEmail($data['email']);

            if(!$user){
                $this->session->getFlashBag()->add('error', "Cette adresse n'éxiste pas.");

                return $this->redirectToRoute('login');
            }

            $token = $tokenGenerator->generateToken();

            try{
                $user->setResetToken($token);
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($user);
                $entityManager->flush();
            }
            catch(\Exception $e){
                $this->session->getFlashBag()->add('error', "Une erreur est survenue : ". $e->getMessage());
                return $this->redirectToRoute('login');
            }

            $email = (new TemplatedEmail())
            ->from('tristan.meillat28@gmail.com')
            ->to($user->getUsername())
            ->subject('Activation de votre compte Snowtricks')
            ->htmlTemplate('email/resetPassword.html.twig')
            ->context([
                "token" => $user->getResetToken()
            ]);

            $mailer->send($email);
            $this->session->getFlashBag()->add('message', 'Un email de réinitialisation de mot de passe à été envoyer à votre adresse mail!');

            return $this->redirectToRoute('login');
        }

        return $this->render('pages/forgotPassword.html.twig', [
            'emailForm' => $form->createView()
        ]);
    }

    /**
     * @Route("/reset/{token}", name="reset")
     */
    public function resetToken(Request $request, $token, UserRepository $userRepository, UserPasswordEncoderInterface $encoder){
        $user = $userRepository->findOneBy(['reset_token' => $token]);

        if(!$user){
            throw $this->createNotFoundException("Une erreur est survenue");
        }

        $form = $this->createForm(FormPasswordResetType::class);
        $form->handleRequest($request);
        
        if($form->isSubmitted() && $form->isValid()){
            $hash = $encoder->encodePassword($user, $user->getPassword());
            $user->setPassword($hash);

            $this->session->getFlashBag()->add('message', 'Votre nouveau mot de passe à bien été enregistrer !');
            return $this->redirectToRoute('login');
        }

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($user);
        $entityManager->flush();
        $user->setResetToken(null);

        return $this->render('pages/formResetPassword.html.twig', [
            "form" => $form->createView(    )
        ]);
    }

}
