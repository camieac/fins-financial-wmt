<?php class Purchase extends AppModel {
	
	   public function get()
    {
       return $this->query("SELECT * FROM purchases, stocklists, clients WHERE purchases.stock = stocklists.id AND purchases.customer = clients.id;");
    }
}
?>
