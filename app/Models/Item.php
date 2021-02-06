<?php namespace App\Models;

use CodeIgniter\Model;

class Item extends Model
{
    protected $table = 'items';
    protected $allowedFields = ['id', 'name', 'price'];
    
    public function getItems()
    {
        return $this->findAll();
    }

    public function getItemsWithCategories() {
        
        $query = $this->db->query("select i.id, i.name as item_name, price, c.name as category_name from items i " . 
        "left join items_categories s on s.item_id = i.id " . 
        "left join categories c on c.id = s.category_id");

        $result = array();

        foreach($query->getResult() as $row) {
            
            if (!array_key_exists( $row->id, $result)) {
                $result[$row->id] = array(
                    'id' => $row->id,
                    'name' => $row->item_name,
                    'price' => $row->price,
                    'categories' => array($row->category_name)
                );
            } else {
                array_push($result[$row->id]['categories'], $row->category_name); 
            }
        }
        return $result;
    }
}