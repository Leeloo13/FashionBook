<?php

namespace App\Controller;

use App\Repository\PostRepository;
use App\Repository\ArticleFbRepository;
use App\Entity\Post;
use App\Entity\ArticleFb;
use App\Entity\User;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\File;
use Symfony\Component\String\Slugger\SluggerInterface;


class HomeController extends AbstractController
{
    /**
     * @var PostRepository
     */
    private $postRepo;

    /**
     * @var ObjectManager
     */
    private $entityManager;

    public function __construct(ManagerRegistry $doctrine)
    {
        $this->postRepo = $doctrine->getRepository(Post::class);
        $this->entityManager = $doctrine->getManager();
    }

    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        $posts = $this->postRepo->findBy(['visible' => true], ['createdAt' => 'DESC']);
        return $this->render('home/index.html.twig', [
            'posts' => $posts
        ]);
    }

    /**
     * @Route("/show/{id}",name="app_post_show",requirements={"id"="\d+"})
     *
     * @param integer $id
     * @return Response
     */
    public function show(int $id): Response
    {
        $post = $this->postRepo->find($id);
        return $this->render('home/show.html.twig', [
            'post' => $post
        ]);
    }

}