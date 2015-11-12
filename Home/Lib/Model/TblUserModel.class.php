<?php
	 class TblUserModel extends Model {
		public function checkUser() {
			session_start();
			$userid=$_GET['userid'];
			$passwd=$_GET['passwd'];
			$passwd=D("AlgSec")->lock($passwd);
			$result=M("TblUser")->where("userid='".$userid."' and passwd='".$passwd."'")->select();
			if($result[0]['userid']) {
				if($result[0]['statu']) {
					$_SESSION['user']=$result[0]['userid'];
					//$result=M("SysPower")->where("role='".$result[0]['role']."'")->select();
					$model=M();
					if($result[0]['role']=='2') {
						$sql="select * from sys_node where statu='1'";
					}else {
						$sql="select b.url,b.mc,b.position,b.pid,b.img from sys_power as a left join sys_node as b on b.bm=a.node where a.role='".$result[0]['role']."' and a.stasu='1' and b.statu='1'";
					}
					$result=$model->query($sql);
					$_SESSION['datas']=$result;
					Return array('status' => 1, info => '登陆成功','url' => U('Home/index'));
				}else {
					Return array('status' => 0, info => '用户名被禁用，请联系管理员！'.M("TblUser")->getlastsql());
				}
			}else {
				Return array('status' => 0, info => '用户名或密码错误');
			}
			
		}
	 }
?>
