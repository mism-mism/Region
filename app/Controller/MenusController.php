

<?php
class MenusController extends AppController {
	public $uses = array('Food', 'Menu');

	public function index() {
		$default1 = $this->Menu->find('all');
		foreach ($default1 as $menus) {
			$menu=array(
				'id'=>$menus['Menu']['id'],
				'name'=>$menus['Menu']['name'],
				'energy'=>$menus['Menu']['calorie'],
				'protein'=>$menus['Menu']['protein'],
				'lipid'=>$menus['Menu']['lipid'],
				'carbohydrate'=>$menus['Menu']['carbohydrate'],
				'salt'=>$menus['Menu']['salinity'],
				'fiber'=>$menus['Menu']['fiber'],
				'calcium'=>$menus['Menu']['calcium'],
				'category_id'=>1,

			);
			$this->Food->save($menu);
		}
		$this -> set('menus1',$default1);
		$this -> set('menus2',$menu);

	}

}