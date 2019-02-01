<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

use App\Entity\Category;
use App\Entity\Topic;

class CategoryController extends AbstractController
{
    /**
     * @Route("/categories", name="categories")
     */
    public function index() {
        $repository = $this->getDoctrine()->getRepository(Category::class);
        $categories = $repository->findAllOrderedByName();

        return $this->render('category/categories.html.twig', [
                    'categories' => $categories,
        ]);
    }

    /**
     * @Route("/category/{id}", name="show_category")
     */
    public function show($id) {
        $category = $this->getDoctrine()
                ->getRepository(Category::class)
                ->find($id);

        if (!$category) {
            throw $this->createNotFoundException(
                    'There is no category with id : ' . $id
            );
        }

        $topics = $this->getDoctrine()
        ->getRepository(Topic::class)
        ->findByIdCategory($id);

        return $this->render('category/category.html.twig', [
                    'category' => $category,
                    'topics' => $topics
        ]);
    }

}
