<?php
	 class IndexAction extends Action {
		public function index() {
			$this->display();
		}
		public function checkUser() {
			echo json_encode(D("TblUser")->checkUser());
		}
	 }
?>
