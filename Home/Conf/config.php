<?php
return array(
	//'配置项'=>'配置值'
	'APP_DEBUG'=>true,
	'SHOW_PAGE_TRACE'=>true,
	'OUTPUT_ENCODE' => false,
	'TMPL_TEMPLATE_SUFFIX' => '.html',//模板后缀设置为.html
	'TMPL_L_DELIM'=>'{',//修改左定界符
	'TMPL_R_DELIM'=>'}',//修改左定界符
	//配置数据库连接
    'DB_TYPE'              => 'mysql',
    //'DB_HOST'              => '192.168.8.221',
    'DB_HOST'              => 'localhost',
    'DB_NAME'              => 'music',
    'DB_USER'              => 'root',
  // 'DB_PWD'               => 'skycloud',
	 'DB_PWD'               => '',
    //'DB_PORT'              => '3306',
    'DB_PREFIX'            => '',    
    'URL_HTML_SUFFIX'      => '',
);
?>