--TEST--
swoole_mysql: simple insert
--SKIPIF--
<?php require __DIR__ . "/../inc/skipif.inc"; ?>
--INI--
assert.active=1
assert.warning=1
assert.bail=0
assert.quiet_eval=0


--FILE--
<?php
require_once __DIR__ . "/../inc/zan.inc";

fork_exec(function() {
    require_once __DIR__ . "/../../apitest/swoole_mysql/swoole_mysql_insert.php";
});
?>
--EXPECT--
SUCCESS
