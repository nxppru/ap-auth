<?php 
return array (
  'INDUSTRY' => 
  array (
    1 => '餐饮',
    2 => '酒店宾馆',
    3 => '咖啡厅',
    4 => '汽车美容',
    5 => '桌游',
    6 => '足浴按摩',
    7 => '艺术摄影',
    8 => '健身瑜伽',
    9 => '美容美发',
    10 => '其他',
  ),
  'OPERATETYPE' => 
  array (
    0 => '添加商户',
    1 => '变更代理商短信数',
    2 => '商户账号类型变更',
    3 => '商家密码变更',
    4 => '删除商户',
  ),
  'DATA_CACHE_TYPE' => 'Redis',
  'REDIS_HOST' => '127.0.0.1',
  'REDIS_PORT' => 6379,
  'DATA_CACHE_TIME' => 3600,
  'DEFAULT_THEME' => 'default',
  'COMPANY_NAME' => '集客科技',
  'SMS_MESSAGE' => '上网验证码:【%d】，验证通过即可畅享免费网络；',
  'SMS_REG' => '短信验证码：【%d】, 有效期为5分钟',
  'SMS_USER' => '',
  'SMS_PASSWORD' => '',
  'DEFAULT_AD' => 
  array (
    0 => 
    array (
      'title' => '默认广告',
      'image' => '1.jpg',
    ),
  ),
  'HOMEPAGE_BANNER' => '1.jpg',
  'DEFAULT_STATION_SLIDE' => 
  array (
    0 => 
    array (
      'title' => '默认广告',
      'image' => '1.jpg',
      'url' => '#',
    ),
  ),
  'IS_REG' => true,
  'REG_DATE' => 0,
  'DEFAULT_MERCHANT' => 'jk2015020521244255',
  'QQ_APP_ID' => '101130543',
  'QQ_APP_KEY' => '75f48db0238684d6537817bdfbe1ab67',
  'WEIBO_APP_KEY' => '3513484001',
  'WEIBO_APP_SECRET' => 'b86b4163b9513be6b7a7c10b3f92ff64',
  'LOG_RECORD' => true,
  'LOG_LEVEL' => 'EMERG,ALERT,CRIT,ERR',
  'WEB_SITE' => 'http://auth.cnrouter.com',
  'AD_COUNT' => 6,
  'STATION_AD_COUNT' => 6,
  'WEIXIN_HREF_URL' => 'http://www.ispwlan.com',
  'TASK_TIME' => 3600,
  'STATION_NAV_LIST' => 
  array (
    1 => 
    array (
      'nav_name' => '关于我们',
      'nav_href' => 'Merchant/about_us',
      'nav_image' => 'icon-info',
      'type' => 1,
      'nav_id' => 1,
      'sort' => 4,
      'status' => 1,
    ),
    2 => 
    array (
      'nav_name' => '新闻中心',
      'nav_href' => 'Merchant/new_list',
      'nav_image' => 'icon-list-alt',
      'type' => 1,
      'nav_id' => 2,
      'sort' => 3,
      'status' => 1,
    ),
    3 => 
    array (
      'nav_name' => '产品展示',
      'nav_href' => 'Merchant/product',
      'nav_image' => 'icon-shopping-cart',
      'type' => 1,
      'nav_id' => 3,
      'sort' => 2,
      'status' => 1,
    ),
    4 => 
    array (
      'nav_name' => '联系我们',
      'nav_href' => 'Merchant/contact_us',
      'nav_image' => 'icon-user',
      'type' => 1,
      'nav_id' => 4,
      'sort' => 5,
      'status' => 1,
    ),
    5 => 
    array (
      'nav_name' => '活动中心',
      'nav_href' => 'Merchant/activity',
      'nav_image' => 'icon-bullhorn',
      'type' => 1,
      'nav_id' => 5,
      'sort' => 1,
      'status' => 1,
    ),
  ),
  'COPYRIGHT' => 
  array (
    'copyright_cn' => 'Copyright &copy; 2014-2015 By <a href="http://www.cnrouter.com" target="_blank">武汉集客科技有限公司</a> All Rights Reserved.',
    'homepage' => 'http://www.cnrouter.com',
    'oname_cn' => '武汉集客科技有限公司',
    'pname_cn' => '集客云平台',
    'version_major' => 'Beta',
    'logo' => 'logo.png',
  ),
);