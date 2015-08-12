社会工程学系统 

系统配置如下：
1.创建数据和表名

CREATE DATABASES sgk

CREATE TABLE `data_126` (`id` int(10) NOT NULL AUTO_INCREMENT,`username` varchar(40) DEFAULT NULL,`nickname` varchar(40) DEFAULT NULL,`password` varchar(60) DEFAULT NULL,`salt` varchar(32)`,email` varchar(40) DEFAULT NULL,`mobile` varchar(50) DEFAULT NULL,`idcard` varchar(30) DEFAULT NULL,`address` varchar(100) DEFAULT NULL,`site` varchar(30) DEFAULT NULL,PRIMARY KEY (`id`),KEY `tid` (`username`,`email`)) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

2.使用navcat mysql导入数据

3.修改mysql1.inc.php配置文件中的配置参数（数据库名和用户密码）



-----------------简单的防御方法------------------------------------------------------------------
1.在页面中加入防护，有两种做法，根据情况二选一即可：

a).在所需要防护的页面加入代码
require_once('360_safe3.php');
就可以做到页面防注入、跨站
如果想整站防注，就在网站的一个公用文件中，如数据库链接文件config.inc.php中！
添加require_once('360_safe3.php');来调用本代码

b).在每个文件最前加上代码
在php.ini中找到:
Automatically add files before or after any PHP document.
auto_prepend_file = 360_safe3.php路径;
