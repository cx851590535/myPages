<?php
	 class AlgSecModel extends Model {
		public function lock($str) {
			$str=trim($str);
			$len=strlen($str);
			$str=strrev($str);
			$pass='';
			for($i=0; $i<$len; $i++) {
				$charps=substr($str,$i,1);
				$pass.=chr(ord($charps)+($len-$i-3)*2);
			}
			Return $pass;
		}
		public function unlock($str) {
			$str=trim($str);
			$len=strlen($str);
			$pass='';
			for($i=0; $i<$len; $i++) {
				$charps=substr($str,$i,1);
				$pass.=chr(ord($charps)-($len-$i-3)*2);
			}
			$pass=strrev($pass);
			Return $pass;
		}
	 }
?>
