<?php
	 class TblMusicModel extends Model {
		public function getAllMusic() {
			$userid=$_SESSION['user'];
			$model=M();
			$sql="select * from usr_music where userid='".$userid."' or power='3' or (power='2' and (userid in (select host from sys_friend where gust='".$userid."' and toho='1' and statu='1') or userid in (select gust from sys_friend where host='".$userid."' and togu='1' and statu='1')))";
			$result=$model->query($sql);
			Return $result;
		}
	 }
?>
