<?php

namespace App\Controller;

use App\Form\UploadFileType;
use App\Repository\ResultLotoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ResultController extends AbstractController
{
    private ResultLotoRepository $repo;

    public function __construct(ResultLotoRepository $repo)
    {
        $this->repo = $repo;
    }

    #[Route('/', name: 'app.index')]
    public function index(): Response
    {
        return $this->render('result/index.html.twig', [
            'controller_name' => 'ResultController',
        ]);
    }

    #[Route('/results', name: 'app.results')]
    public function results(): Response
    {
        $results = $this->repo->findAll();


        return $this->render('result/results.html.twig', [
            'controller_name' => 'ResultController',
            'results' => $results
        ]);
    }

    #[Route('/file', name: 'app.import.file')]
    public function import_file(Request $request): Response
    {
        $form = $this->createForm(UploadFileType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            //$someNewFilename = ...
    
            $file = $form['attachment']->getData();
            dump($file);

            if (($handle = fopen($file->getPathname(), "r")) !== false) {
                // Read and process the lines. 
                // Skip the first line if the file includes a header
                while (($data = fgetcsv($handle)) !== false) {

                    //dump($data[0]);

                    list($timestamp, $day, $date, $date_2, $ball_1, $ball_2, $ball_3, $ball_4, $ball_5, $lucky_number) = explode(";", $data[0]);
                    dump($day . ' ' . $date . ' ' . $ball_1 . ' ' . $ball_2 . ' ' . $ball_3 . ' ' . $ball_4 . ' ' . $ball_5 . ' ' . $lucky_number);
                    // Do the processing: Map line to entity, validate if needed
                    //$entity = new Entity();
                    // Assign fields
                    //$entity->setField1($data[0]);
                    //$em->persist($entity);
                }
                fclose($handle);
                //$em->flush();
            }
            //$file->move($directory, $someNewFilename);
    
            // ...
        }

        return $this->render('result/import_file.html.twig', [
            'controller_name' => 'ResultController',
            'form' => $form->createView()
        ]);
    }
}
