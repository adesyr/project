<?php

namespace App\Controller;

use App\Entity\Property;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PropertyController extends AbstractController
{
    /**
     * @Route("/property", name="property.index")
     */
    public function index()
    {

        $property = new Property();
        $property->setTitle("Premier bien")
                ->setPrice(200000)
                ->setRooms(4)
                ->setBedrooms(3)
                ->setDescription("une petite description")
                ->setSurface(60)
                ->setFloor(4)
                ->setHeat(1)   //on va créer une constante pour le type de chauffage dans l'entity
                ->setAddress('15 rue ici')
                ->setZipcode('12345')
                ->setCity('labas');

        $em = $this->getDoctrine()->getManager();
        $em->persist($property);
        $em->flush();

        return $this->render('property/index.html.twig', [
            'current_menu' => 'Properties',
        ]);

        //on ajoute des elements à la vue(current_name que l'on appelle properties
    }
}
