<?php namespace App\Models;

use CodeIgniter\Model;

class ItemCategory extends Model
{
    protected $table = 'items_categories';
    protected $allowedFields = ['item_id', 'category_id'];   
    public function getItemsCategories()
    {
        return $this->findAll();
    }
}