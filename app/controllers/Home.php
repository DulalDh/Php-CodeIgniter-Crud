<?php namespace app\controllers;
use App\Models\Category;
use CodeIgniter\Controller;

class Home extends Controller
{
	public function index()
	{
		return view('welcome_message');
	}
	
    public function manage()
    {
        $model = new Category();
        $data = [
            'categories' => $model->getCategories(),
            'title' => 'Manage Categoties'
        ];
        echo view('categories/manage', $data);
    }
}