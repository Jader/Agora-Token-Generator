<?php
/**
 * @Description :
 *
 * @Date        : 2019-03-14 17:31
 * @Author      : hmy940118@gmail.com
 */
namespace AgoraTokenGenerator\tests;

use AgoraTokenGenerator\AgoraTokenGenerator;
use PHPUnit\Framework\TestCase;

class TokenTest extends TestCase
{
    private $app_id;

    private $app_certificate;

    private $channel;

    private $uid;

    private $service;

    public function setUp(): void
    {
        $this->app_id = '753871db140341abbde556823a8a4493';
        $this->app_certificate = '1010f10f96214d0a80337e2e568381e7';
        $this->channel = md5(1);
        $this->uid = 10001;
        $this->service = new AgoraTokenGenerator($this->app_id, $this->app_certificate, $this->channel, $this->uid);
        $this->assertNotEmpty($this->service,'初始化服务失败');
    }

    public function testBuildToken()
    {

        $data = $this->service->buildToken();
        $this->assertNotEmpty($data,'生成的Token失败');
    }

    public function testInitPrivileges()
    {
        $data = $this->service->initPrivilege(0);
        $this->assertNull($data, '设置权限失败');
    }
}