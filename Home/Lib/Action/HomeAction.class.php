<?php
	 class HomeAction extends CommonAction {
		public function index() {
			//dump($left);
			$this->display();
		}
		public function music() {
			$this->assign('musicList',D("TblMusic")->getAllMusic());
			$this->display();
		}
	 }
?>
