<?php namespace App\controllers;

use App\Models\Item;
use App\Models\Category;
use App\Models\ItemCategory;
use CodeIgniter\Controller;

class ItemsController extends Controller
{
    public function list()
    {
        $data['items'] = (new Item())->getItemsWithCategories();
        $data['title'] = 'Mange Items';
        echo view('items/manage', $data);

    }
    
    public function createUi()
    {
        
        $data = array(
            'success' => false,
            'categories' => (new Category())->getCategories()
        );

        
        echo view('items/create', $data);
        
    }

    public function create()
    {
        
        $data = array(
            'success' => false,
            'categories' => (new Category())->getCategories()
        );

            if ($this->request->getPost('name') && $this->request->getPost('price')) {
                
                $model2 = new Item();
                $insertId = $model2->insert(
                    [ 'name' => $this->request->getPost('name'), 'price' => $this->request->getPost('price') ]
                );
                
                $catIds = $this->request->getPost('categories');
                if (is_array($catIds)) {
                    for ($i=0; $i < count($catIds); $i++) { 
                        $model3 = new  ItemCategory();
                        $model3->save(
                            [ 'item_id' => $insertId, 'category_id' => $catIds[$i] ]
                        );
                    }

                }

                $data['success'] = true;
            }

        
        echo view('items/create', $data);
        
    }

    public function updateUi($id = null){
        $data['item'] = (new Item())->where('id', $id)->first();
        $categoryIds = (new ItemCategory())->where('item_id', $id)->findAll();
        $arrayIds = array();
        foreach ($categoryIds as $ids) { 
            array_push($arrayIds, $ids['category_id']);

        }
        $data['categoryIds'] = $arrayIds;
        $data['categories'] =  (new Category())->getCategories();
        echo view('items/edit', $data);
    }

    public function update($id = null){
        
            if ($this->request->getPost('name')) {
        
                $data = ['name' => $this->request->getPost('name'), 'price' => $this->request->getPost('price'),  ];
                $save = (new Item())->update($id, $data);

                $catIds = $this->request->getPost('categories');
                if (is_array($catIds)) {
                    (new ItemCategory())-> where('item_id', $id)->delete();
                    for ($i=0; $i < count($catIds); $i++) { 
                        $model3 = new  ItemCategory();
                        $model3->save(
                            [ 'item_id' => $id, 'category_id' => $catIds[$i] ]
                        );
                    }
                }
                return redirect()->to('/items/manage');
            }
        
        

    }

    public function delete($id = null){

        $data['item'] = (new Item())-> where('id', $id)->delete();
        $data['ItemCategories'] = (new ItemCategory())->where('item_id', $id)->delete();
        return redirect()->to('/items/manage');

    }
}