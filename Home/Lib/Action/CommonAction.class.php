<?php 
// 本类由系统自动生成，仅供测试用途
class CommonAction extends Action {
	public function _initialize() {
		header("Content-Type:text/html; charset=utf-8");
		header('Content-Type:application/json; charset=utf-8');
		$this -> checkLogin();
		$this -> cd_Init(); 
		$this->getPower();
		// $this->cd_InitCheck();
	} 
	public function checkLogin() {
		if (!isset($_SESSION['user'])) {
			$this -> redirect('Index/index');
		} 
	} 
	public function cd_Init() {
		$datas = $_SESSION['datas'];
		$model = MODULE_NAME;
		if ($datas['bz'] == $model) {
			$str_mn = $v2['data'];
		} else {
			foreach($datas as $k => $v) {
				if ($model == $v['bz']) {
					$str_mn = $v['data'];
				} else {
					if (array_key_exists('data', $datas[$k])) {
						foreach($v['data'] as $k1 => $v1) {
							if ($model == $v1['bz']) {
								$str_mn = $v1['data'];
							} else {
								if (array_key_exists('data', $v['data'][$k1])) {
									foreach($v1['data'] as $k2 => $v2) {
										if ($model == $v2['bz']) {
											$str_mn = $v2['data'];
										} 
									} 
								} 
							} 
						} 
					} 
				} 
			} 
		} 
		$this -> str_mn = $str_mn;
	} 
	public function cd_InitCheck() {
		$datas = $_SESSION['datas'];
		$model = MODULE_NAME;
		$flag = false; 
		// if($datas['bz']==$model){
		// $flag=true;
		// }else{
		foreach($datas as $k => $v) {
			if ($model == $v['bz']) {
				$flag = true;
				$a = $model;
			} else {
				if (array_key_exists('data', $datas[$k])) {
					foreach($v['data'] as $k1 => $v1) {
						if ($model == $v1['bz']) {
							$flag = true;
						} else {
							if (array_key_exists('data', $v['data'][$k1])) {
								foreach($v1['data'] as $k2 => $v2) {
									if ($model == $v2['bz']) {
										$flag = true;
									} 
								} 
							} 
						} 
					} 
				} 
			} 
		} 
		// }
		if (!$flag) {
			$this -> error('没有权限');
		} 
	} 
	public function getPower() {
			$datas=$_SESSION['datas'];
			$numLeft=0;
			$numDatas=0;
			$left='';
			if($_GET['num']) {
				$this->num=$_GET['num'];
			}else {
				$this->num=0;
			}
			foreach($datas as $key=>$val) {
				if($val['position']=='l') {
					$left[$numLeft]=$datas[$numDatas];
					$numLeft++;
				}
				$numDatas++;
			}
			$this->assign('left',$left);
	}
} 

?>