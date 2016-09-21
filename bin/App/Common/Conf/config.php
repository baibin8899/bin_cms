<?php
return array(
	//'配置项'=>'配置值'
    'MODULE_ALLOW_LIST'    =>    array('Home','Admin','User'),
    'DEFAULT_MODULE'       =>    'Home',
    'MD5_BIN'              =>'bin_cms',
    'URL_MODEL' => 2,
    'APP_GROUP_MODE'=>1,//项目独立分组
    'URL_HTML_SUFFIX'=>'html', //伪静态后缀
    'SESSION_AUTO_START'    =>  true,    // 是否自动开启Session
    'COOKIE_EXPIRE' => '7200',
    'COOKIE_DOMAIN' => 'localhost',
    'TMPL_PARSE_STRING' => array(
        '__UPLOAD__' => __ROOT__ . '/Uploads',
        '__TEMP__'=>THEME_NAME.'/Public',
        '__PUBLIC__' => __ROOT__ . '/Public/Home',
        '__ACSS__' => __ROOT__ . '/Public/Admin/css',
        '__AJS__' => __ROOT__ . '/Public/Admin/js',
        '__WAP__' => __ROOT__ . '/Public/Wap',
    ),
    //数据库配置
    'DB_TYPE'      =>  'mysql',     // 数据库类型
    'DB_HOST'      =>  'localhost',     // 服务器地址
    'DB_NAME'      =>  'bin_cms',     // 数据库名
    'DB_USER'      =>  'root',     // 用户名
    'DB_PWD'       =>  'root',     // 密码
    'DB_PORT'      =>  '3306',     // 端口
    'DB_PREFIX'    =>  'cms_',     // 数据库表前缀
    'DB_CHARSET'   =>  'utf8', // 数据库的编码 默认为utf8
    'DB_DEBUG'  =>  TRUE, // 数据库调试模式 开启后可以记录SQL日志
    
);