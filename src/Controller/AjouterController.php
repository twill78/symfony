<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\HttpFoundation\Request;
use App\Entity\Chat;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\ChatRepository;

class AjouterController extends AbstractController
{
    /**
     * @Route("/ajouter", name="app_ajouter")
     */
    public function addChat(Request $request, EntityManagerInterface $orm, ChatRepository $repo)
    {
        if($request->isMethod('POST')){
            $request->request;
            $data= $request->request->all();
            $chat= new Chat($data['nom'],$data['race'],$data['sexe'],\DateTime::createFromFormat('Y-m-d', $data['naissance']),$data['caractere'],$data['photo'],\DateTime::createFromFormat('Y-m-d',$data['recueil']));
            $orm->persist($chat);
            $orm->flush();
            $chats = $repo->findAll();
            return $this->redirectToRoute('app_home', ['chats'=>$chats]);
        }
        return $this->render('chats/addChat.html.twig');
    }
}
