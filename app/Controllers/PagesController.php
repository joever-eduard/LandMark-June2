<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;
use App\Models\LotModel;
use App\Models\PropertyDistanceModel;
use App\Models\PropertyValuationModel; 
use App\Models\DocumentModel;

class PagesController extends BaseController
{
    public function index()
    {
        return view('homepage');
    }

    public function about()
    {
        return view('about');
    }

    public function map()
    {
        $lot = '1'; // Replace with the actual value you want to switch on

        switch ($lot) {
            case '1':
                $lotModel = new LotModel();
                $lots = $lotModel->findAll();
                break;
            case '2':
                $lotModel = new LotModel();
                $lots = $lotModel->findAll();
                break;
            default:
                return redirect()->back()->withInput()->with('error', 'Lot number not found.');
        }

        $data = [
            'lots' => $lots,
        ]; 

        return view('map', $data);
    }

    public function adminmap()
    {
        $lot = '1'; // Replace with the actual value you want to switch on

        switch ($lot) {
            case '1':
                $lotModel = new LotModel();
                $lots = $lotModel->findAll();
                break;
            case '2':
                $lotModel = new LotModel();
                $lots = $lotModel->findAll();
                break;
            default:
                return redirect()->back()->withInput()->with('error', 'Lot number not found.');
        }

        $data = [
            'lots' => $lots,
        ]; 

        return view('adminmap', $data);
    }

    public function search()
    {

        $lotModel = new LotModel();
        
        $lots = $lotModel->findAll();

        // Retrieve the data you want to pass to the view
        $data = [
            'lots' => $lots,
        ];

        echo view('search', $data);
    }

    public function adminHome()
    {       
        $data = [];

        return view('adminhome', $data);
    }

    public function adminAbout()
    {
        return view('adminabout');
    }

    public function adminSearch()
    {
        $lotModel = new LotModel();
        
        $lots = $lotModel->findAll();

        // Retrieve the data you want to pass to the view
        $data = [
            'lots' => $lots,
        ];

        echo view('adminsearch', $data);
    }

    public function searchinfo()
    {
        $lotModel = new LotModel();
        $propertyDistanceModel = new PropertyDistanceModel();
        $propertyValuationModel = new PropertyValuationModel();

        $lotNo = $this->request->getVar('lot_no');

        // Validate the lot number
        $validation = $this->validate([
            'lot_no' => 'required|numeric|is_not_unique[lot_details.lot_no]',
        ]);

        if (!$validation) {
            // If validation fails, redirect back with errors
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Lot number is valid, proceed with fetching data
        $lot = $lotModel->where('lot_no', $lotNo)->first();

        if (!$lot) {
            // Lot number not found, show error message
            return redirect()->back()->withInput()->with('error', 'Lot number not found.');
        }

        // Fetch multiple property distances
        $propertyDistances = $propertyDistanceModel->where('lot_id', $lot['id'])->findAll();

        // Fetch multiple property valuations
        $propertyValuations = $propertyValuationModel->where('lot_id', $lot['id'])->findAll();

        $data = [
            'lot' => $lot,
            'propertyDistances' => $propertyDistances, // Pass the property distances array to the view
            'propertyValuations' => $propertyValuations, // Pass the property valuations array to the view
        ];

        return view('searchinfo', $data);
    }

    public function usersearch()
    {
        $lotModel = new LotModel();
        $propertyDistanceModel = new PropertyDistanceModel();
        $propertyValuationModel = new PropertyValuationModel();

        $lotNo = $this->request->getVar('lot_no');

        // Validate the lot number
        $validation = $this->validate([
            'lot_no' => 'required|numeric|is_not_unique[lot_details.lot_no]',
        ]);

        if (!$validation) {
            // If validation fails, redirect back with errors
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Lot number is valid, proceed with fetching data
        $lot = $lotModel->where('lot_no', $lotNo)->first();

        if (!$lot) {
            // Lot number not found, show error message
            return redirect()->back()->withInput()->with('error', 'Lot number not found.');
        }

        // Fetch multiple property distances
        $propertyDistances = $propertyDistanceModel->where('lot_id', $lot['id'])->findAll();

        // Fetch multiple property valuations
        $propertyValuations = $propertyValuationModel->where('lot_id', $lot['id'])->findAll();

        $data = [
            'lot' => $lot,
            'propertyDistances' => $propertyDistances, // Pass the property distances array to the view
            'propertyValuations' => $propertyValuations, // Pass the property valuations array to the view
        ];

        return view('usersearch', $data);
    }

    

    public function viewlot($lotId)
    {
        $lotModel = new LotModel();
        $propertyDistanceModel = new PropertyDistanceModel();
        $propertyValuationModel = new PropertyValuationModel();
    
        // Fetch the lot information
        $lot = $lotModel->find($lotId);
    
        if (!$lot) {
            // Lot not found, redirect back with an error message
            return redirect()->back()->withInput()->with('error', 'Lot not found.');
        }
    
        // Fetch property distances
        $propertyDistances = $propertyDistanceModel->where('lot_id', $lotId)->findAll();
    
        // Fetch property valuations
        $propertyValuations = $propertyValuationModel->where('lot_id', $lotId)->findAll();
    
        $data = [
            'lot' => $lot,
            'propertyDistances' => $propertyDistances,
            'propertyValuations' => $propertyValuations,
        ];
    
        return view('viewlot', $data);
    }



    public function reports()
    {
        $lotModel = new LotModel();
        $documentModel = new DocumentModel();


        // Get the total area of all the lots
        $totalArea = $lotModel->db->query('SELECT SUM(size_of_area) AS total_area FROM lot_details')->getRow()->total_area;

        // Get the total number of lots
        $totalLot = $lotModel->countAll();
        $totalDocs = $documentModel->countAll();

        // Pass the calculated values to the view
        $data['totalArea'] = $totalArea;
        $data['totalLot'] = $totalLot + $totalDocs;
        $data['totalLotNoDoc'] = $totalLot;
        $data['totalDocs'] = $totalDocs;

        return view('reports', $data);
    }  

    public function documents()
    {
        $lotModel = new LotModel();
        $lots = $lotModel->findAll();

        $documentModel = new DocumentModel();
        $documents = $documentModel->findAll();

        $data = [
            'lots' => $lots,
            'documents' => $documents,
        ];

        return view('documents', $data);
    }

    public function download(){

    }

    public function add()
    {
        $data = [];
        helper(['form']);

        if ($this->request->getMethod() == 'post') {
            // Retrieve the form data
            $newData = [
                'lot_no' => $this->request->getVar('lot_no'),
                'cad_no' => $this->request->getVar('cad_no'),
                'size_of_area' => $this->request->getVar('size_of_area'),
                'location' => $this->request->getVar('location'),
                'phase' => $this->request->getVar('phase'),
                'land_owner' => $this->request->getVar('land_owner'),
                'status' => $this->request->getVar('status'),
            ];

            // Instantiate models
            $lotModel = new LotModel();
            $propertyDistanceModel = new PropertyDistanceModel();
            $propertyValuationModel = new PropertyValuationModel();

            // Attempt to save data
            try {
                // Save lot details
                $lotModel->save($newData);
                $lotId = $lotModel->getInsertID(); // Get the ID of the inserted lot

                // Save property distance
                $distanceData = $this->request->getVar('distance');
                foreach ($distanceData as $distance) {
                    $propertyDistanceModel->save([
                        'lot_id' => $lotId, // Use the correct variable here
                        'bllm' => $distance['bllm'],
                        'distance_to_point1' => $distance['distance_to_point1'],
                    ]);
                }

                // Save property valuation
                $valuationData = $this->request->getVar('valuation');
                foreach ($valuationData as $valuation) {
                    $propertyValuationModel->save([
                        'lot_id' => $lotId, // Use the correct variable here
                        'valuation_amount' => $valuation['valuation_amount'],
                        'tree_valuation_amount' => $valuation['tree_valuation_amount'],
                        'disturbance_amount' => $valuation['disturbance_amount'],
                        'house_structure_amount' => $valuation['house_structure_amount'],
                    ]);
                }

                // Pass the new land detail to the view
                $data['lot_no'] = $newData['lot_no'];
                $data['cad_no'] = $newData['cad_no'];
                $data['size_of_area'] = $newData['size_of_area'];
                $data['location'] = $newData['location'];

                // Redirect to success page
                return redirect()->to('/documents/')->with('newData', $data);

            } catch (\Exception $e) {
                // Handle any exceptions thrown during the save process
                log_message('error', $e->getMessage()); // Log the error message
                $data['error'] = 'An error occurred while saving the data. Please try again later.'; // Set an error message to display
            }
        }

        echo view('add', $data);
    }


    public function upload()
    {
        $file = $this->request->getFile('fileToUpload');

        if ($file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();

            if ($file->move(WRITEPATH . 'uploads', $newName)) {
                // File uploaded successfully, now save the details in the database
                $documentModel = new DocumentModel();

                $data = [
                    'file_name' => $file->getName(),
                    'original_name' => $file->getClientName(), // Store the original filename
                    'upload_date' => date('Y-m-d H:i:s'),
                    'file_path' => 'uploads/' . $newName
                ];

                $documentModel->insert($data);

                // Redirect back to the document list with success message
                return redirect()->to('/documents')->with('success', 'File uploaded successfully');
            } else {
                // Error moving the uploaded file
                $error = $file->getError();
                // Handle the error accordingly
            }
        } else {
            // Invalid file or file has already been moved
            // Handle the error accordingly
        }
    }

    
    public function delete($id)
    {
        // Get the lot with the provided ID from the database
        $lotModel = new LotModel();
        $lot = $lotModel->find($id);

        if ($lot === null) {
            // Lot not found, handle the error condition
            return redirect()->back()->with('error', 'Lot not found.');
        }

        // Perform the delete operation
        $lotModel->delete($id);

        // Redirect back to the land details page with success message
        return redirect()->back()->with('success', 'Lot deleted successfully.');
    }
    


    public function update($lotId)
    {
        $data = [];
        helper(['form']);

        // Instantiate models
        $lotModel = new LotModel();
        $propertyDistanceModel = new PropertyDistanceModel();
        $propertyValuationModel = new PropertyValuationModel();

        // Get the data of the lot to be updated
        $lot = $lotModel->find($lotId);
        $propertyDistance = $propertyDistanceModel->where('lot_id', $lotId)->findAll();
        $propertyValuation = $propertyValuationModel->where('lot_id', $lotId)->findAll();

        // Populate the form with the data
        $data['lotId'] = $lotId;
        $data['lot'] = $lot;
        $data['propertyDistance'] = $propertyDistance;
        $data['propertyValuation'] = $propertyValuation;

        if ($this->request->getMethod() == 'post') {
            $updatedData = [
                'lot_no' => $this->request->getVar('lot_no'),
                'cad_no' => $this->request->getVar('cad_no'),
                'size_of_area' => $this->request->getVar('size_of_area'),
                'location' => $this->request->getVar('location'),
                'phase' => $this->request->getVar('phase'),
                'land_owner' => $this->request->getVar('land_owner'),
                'status' => $this->request->getVar('status'),
            ];

            // Attempt to update data
            try {
                // Update lot details
                $lotModel->update($lotId, $updatedData);

                // Update property distances
                $distances = $this->request->getVar('propertyDistances');
                foreach ($distances as $index => $distance) {
                    $propertyDistanceModel->update($distance['id'], $distance);
                }

                // Update property valuations
                $valuations = $this->request->getVar('propertyValuations');
                foreach ($valuations as $index => $valuation) {
                    $propertyValuationModel->update($valuation['id'], $valuation);
                }

                // Redirect to success page
                return redirect()->to('/documents/');

            } catch (\Exception $e) {
                // Handle any exceptions thrown during the update process
                log_message('error', $e->getMessage()); // Log the error message
                $data['error'] = 'An error occurred while updating the data. Please try again later.'; // Set an error message to display
            }
        }

        echo view('update', $data);
    }

    public function deleteDocument($id)
    {
        $documentModel = new DocumentModel();
        $document = $documentModel->find($id);

        if (!$document) {
            // Handle document not found error
            return redirect()->to('/documents')->with('error', 'Document not found');
        }

        $filePath = WRITEPATH . 'uploads/' . $document['file_name'];

        if (is_file($filePath) && file_exists($filePath)) {
            unlink($filePath);
            $documentModel->delete($id);

            // Redirect to the documents page with success message
            return redirect()->to('/documents')->with('success', 'Document deleted successfully');
        } else {
            // Handle file not found error
            return redirect()->to('/documents')->with('error', 'File not found');
        }
    }






    public function downloadDocument($documentId)
    {
        $documentModel = new DocumentModel();
        $document = $documentModel->find($documentId);

        if (!$document) {
            // Document not found, show error message or redirect back
            return redirect()->back()->with('error', 'Document not found.');
        }

        $filePath = WRITEPATH . 'uploads/' . $document['file_name'];

        if (file_exists($filePath)) {
            return $this->response->download($filePath, null);
        } else {
            return redirect()->back()->with('error', 'File not found.');
        }
    }


    
}
 
