<?php
	 class MusicAction extends CommobAction {
		public function music() {
			$this->assign('musicList',D("TblMusic")->getAllMusic());
			echo 1;
			$this->display();
		}
	 }
?>
