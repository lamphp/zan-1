<?php
if(!function_exists('swoole_get_mysqli_sock')) {
	die("no async_mysql support\n");
}
$db = new mysqli;
$db->connect('127.0.0.1', 'root', 'root', 'test');
$db->query("show tables", MYSQLI_ASYNC);
swoole_event_add(swoole_get_mysqli_sock($db), function($__db_sock) {
    global $mysql_pool;
    var_dump($__db_sock);
    $res = $mysql_pool->reap_async_query();
    var_dump($res->fetch_all(MYSQLI_ASSOC));
    $mysql_pool->query("show tables", MYSQLI_ASYNC);
    sleep(1);
});
echo "Finish\n";
