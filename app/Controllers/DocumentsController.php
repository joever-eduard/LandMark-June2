<?php

namespace App\Controllers;

use App\Models\DocumentModel;
use CodeIgniter\Controller;

class DocumentsController extends Controller
{
    public function index()
    {
        $documentModel = new DocumentModel();
        $data['lots'] = []; // Replace with your logic to retrieve lot data

        return view('documents/index', $data);
    }

    public function upload()
    {
        $documentModel = new DocumentModel();

        // Check if the form is submitted
        if ($this->request->getMethod() === 'post') {
            // Check if a file was selected
            if ($this->request->getFile('fileToUpload')->isValid()) {
                $file = $this->request->getFile('fileToUpload');

                // Move the uploaded file to the desired location
                $originalName = $file->getName();
                $file->move(ROOTPATH . 'public/uploads', $originalName);

                // Save the file details in the database
                $documentModel->insert([
                    'lot_no' => $this->request->getPost('lot_no'),
                    'cad_no' => $this->request->getPost('cad_no'),
                    'size_of_area' => $this->request->getPost('size_of_area'),
                    'location' => $this->request->getPost('location'),
                    'file_path' => $originalName
                ]);

                return redirect()->to('/documents')->with('success', 'File uploaded successfully.');
            } else {
                return redirect()->to('/documents')->with('error', 'No file selected or file is not valid.');
            }
        }

        return redirect()->back();
    }
}
