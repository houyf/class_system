<?php
/**
 * 自动化执行 命令行模式
 */
class TestCommand extends CConsoleCommand
{
	public function run($args) {
		$user_info = Admin::model()->findAll();
		$count = Advice::model() -> count('status=0');
	        	foreach ($user_info as $row) {
	        		if($row -> send_email == 0 || empty($row -> email)) continue;  
	        		$message = "您今天新增" . $count . "条后勤办反馈建议
	        		'http://localhost/logistics/index.php?r=admin/index/index' 点击链接登录后台进行查看";
			$mailer = Yii::createComponent('application.extensions.mailer.EMailer');
			$mailer->Host = 'smtp.qq.com';
			$mailer->IsSMTP();
			$mailer->SMTPAuth = true;
			$mailer->From = '472406004@qq.com';
			$mailer->AddReplyTo("$row->email");
			$mailer->AddAddress("$row->email");
			$mailer->FromName = '你大爷';
			$mailer->Username = '472406004';    //这里输入发件地址的用户名
			$mailer->Password = '199401045216hyf';    //这里输入发件地址的密码
			$mailer->SMTPDebug = true;   //设置SMTPDebug为true，就可以打开Debug功能，根据提示去修改配置
			$mailer->CharSet = 'UTF-8';
			$mailer->Subject = Yii::t('demo', 'Yii rulez!');
			$mailer->Body = $message;
			$x = $mailer->Send();   
			$x = $mailer->Send();   
	        	}	 
	}
}






