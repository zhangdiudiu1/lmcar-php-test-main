<?php

namespace Test\App;
require_once __DIR__ . '/../../vendor/autoload.php';

use App\App\Demo;
use PHPUnit\Framework\TestCase;
use App\Util\HttpRequest;


class DemoTest extends TestCase
{

    public function test_foo()
    {
        $http = new HttpRequest();
        $logger = new \Logger("user");
        $obj = new Demo($logger,$http);
        $this->assertEquals("bar", $obj->foo());
    }

    public function test_get_user_info()
    {
        $http = new HttpRequest();
        $logger = new \Logger("user");
        $obj = new Demo($logger,$http);
        $data = ['id'=>1,'username'=>'hello world'];
        $this->assertEquals($data, $obj->get_user_info());
    }
}
