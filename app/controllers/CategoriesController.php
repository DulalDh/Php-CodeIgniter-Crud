<?php namespace App\controllers;

use App\Models\Category;
use App\Models\ItemCategory;
use CodeIgniter\Controller;

class CategoriesController extends Controller
{
    public function list()
    {

        $model = new Category();
        $data = [
            'categories' => $model->getCategories(),
            'title' => 'Manage Categoties'
        ];
        // return $this->respond($data);
        echo view('categories/manage', $data);

    }

    public function createUi()
    {
        $data = array(
            'success' => false
        );
        
        
        echo view('categories/create', $data);
        
    }

    public function create()
    {
        $data = array(
            'success' => false
        );
        if ($this->request->getPost('name')) {
            $model = new Category();
            $model->save([ 'name' => $this->request->getPost('name')]);

            $data['success'] = true;
        }
        
        
        echo view('categories/create', $data);
        
    }

    public function delete($id = null){

        $data['category'] = (new Category())-> where('id', $id)->delete();
        $data['ItemCategories'] = (new ItemCategory())->where('category_id', $id)->delete();
        return redirect()->to( base_url('categories/manage') );

    }

    public function updateUi($id = null){

        $data['category'] = (new Category())->where('id', $id)->first();
        echo view('categories/edit', $data);
    
    }
    
    public function update($id = null){
        if ($this->request->getPost('name')) {
         
            $model = (new Category());
            $data = ['name' => $this->request->getPost('name')];
            $save = $model->update($id, $data);
         return redirect()->to('/categories/manage');
        }else{
            //ToDo: error handling
        } 
    }
}