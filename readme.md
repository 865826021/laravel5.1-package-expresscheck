

### Laravel 5.1 ExpressCheck快递单号查询

# 使用示例
### 快递单号查询示例代码

```
composer require yuxiaoyang/expresscheck
```

或者在你的 `composer.json` 的 require 部分中添加:
```json
 "yuxiaoyang/expresscheck": "~1.0"
```

下载完毕之后,直接配置 `config/app.php` 的 `providers`:

```php
//Illuminate\Hashing\HashServiceProvider::class,

Yuxiaoyang\ExpressCheck\ExpressCheckProvider::class,
```
控制器中使用 `ExpressCheckController.php` :


```php

<?php


use \Yuxiaoyang\ExpressCheck\ExpressCheck;

class ExpressCheckController extends Controller
{
    
    public $expresscheck;

    //快递单号查询
    public function expresscheck()
    {
        //创建示例对象
	//$this->expresscheck = new \Yuxiaoyang\ExpressCheck\ExpressCheck();
        $this->expresscheck = new ExpressCheck();
        $expressNum = "30000029654217";
        $data = $this->expresscheck->search($expressNum);
        return $data;
    }


}

不传递快递公司代码时，会自动判断快递单号所属快递公司，默认返回json.
```
返回结果:
```
{
    "message": "ok",
    "nu": "30000029654217",
    "ischeck": "0",
    "condition": "00",
    "com": "annengwuliu",
    "status": "200",
    "state": "0",
    "data": [
        {
            "time": "2017-04-18 19:10:20",
            "ftime": "2017-04-18 19:10:20",
            "context": "【衡阳市】衡阳分拨中心快件已到达",
            "location": "衡阳市"
        },
        {
            "time": "2017-04-17 18:16:47",
            "ftime": "2017-04-17 18:16:47",
            "context": "【永州市】永州冷水滩一部已发出,下一站衡阳分拨中心",
            "location": "永州市"
        },
        {
            "time": "2017-04-17 02:57:25",
            "ftime": "2017-04-17 02:57:25",
            "context": "【永州市】安能永州冷水滩一部收件员已揽件",
            "location": "永州市"
        }
    ]
}
```
返回结果说明：
```
com	物流公司编号
nu	物流单号
time	每条跟踪信息的时间
context	每条跟综信息的描述
state	快递单当前的状态 ：　
	0：在途，即货物处于运输过程中；
	1：揽件，货物已由快递公司揽收并且产生了第一条跟踪信息；
	2：疑难，货物寄送过程出了问题；
	3：签收，收件人已签收；
	4：退签，即货物由于用户拒签、超区等原因退回，而且发件人已经签收；
	5：派件，即快递正在进行同城派件；
	6：退回，货物正处于退回发件人的途中；
status	查询结果状态：
	0：物流单暂无结果，
	1：查询成功，
	2：接口出现异常，
```
快递公司代码：
```
$data = array(
        'shunfeng' => '顺丰',
        'yuantong' => '圆通速递',
        'shentong' => '申通',
        'yunda' => '韵达快运',
        'ems' => 'ems快递',
        'tiantian' => '天天快递',
        'zhaijisong' => '宅急送',
        'quanfengkuaidi' => '全峰快递',
        'zhongtong' => '中通速递',
        'rufengda' => '如风达',
        'debangwuliu' => '德邦物流',
        'huitongkuaidi' => '汇通快运',
        'aae' => 'aae全球专递',
        'anjie' => '安捷快递',
        'anxindakuaixi' => '安信达快递',
        'biaojikuaidi' => '彪记快递',
        'bht' => 'bht',
        'baifudongfang' => '百福东方国际物流',
        'coe' => '中国东方（COE）',
        'changyuwuliu' => '长宇物流',
        'datianwuliu' => '大田物流',
        'dhl' => 'dhl',
        'dpex' => 'dpex',
        'dsukuaidi' => 'd速快递',
        'disifang' => '递四方',
        'fedex' => 'fedex（国外）',
        'feikangda' => '飞康达物流',
        'fenghuangkuaidi' => '凤凰快递',
        'feikuaida' => '飞快达',
        'guotongkuaidi' => '国通快递',
        'ganzhongnengda' => '港中能达物流',
        'guangdongyouzhengwuliu' => '广东邮政物流',
        'gongsuda' => '共速达',
        'hengluwuliu' => '恒路物流',
        'huaxialongwuliu' => '华夏龙物流',
        'haihongwangsong' => '海红',
        'haiwaihuanqiu' => '海外环球',
        'jiayiwuliu' => '佳怡物流',
        'jinguangsudikuaijian' => '京广速递',
        'jixianda' => '急先达',
        'jjwl' => '佳吉物流',
        'jymwl' => '加运美物流',
        'jindawuliu' => '金大物流',
        'jialidatong' => '嘉里大通',
        'jykd' => '晋越快递',
        'kuaijiesudi' => '快捷速递',
        'lianb' => '联邦快递（国内）',
        'lianhaowuliu' => '联昊通物流',
        'longbanwuliu' => '龙邦物流',
        'lijisong' => '立即送',
        'lejiedi' => '乐捷递',
        'minghangkuaidi' => '民航快递',
        'meiguokuaidi' => '美国快递',
        'menduimen' => '门对门',
        'ocs' => 'OCS',
        'peisihuoyunkuaidi' => '配思货运',
        'quanchenkuaidi' => '全晨快递',
        'quanjitong' => '全际通物流',
        'quanritongkuaidi' => '全日通快递',
        'quanyikuaidi' => '全一快递',
        'santaisudi' => '三态速递',
        'shenghuiwuliu' => '盛辉物流',
        'sue' => '速尔物流',
        'shengfeng' => '盛丰物流',
        'saiaodi' => '赛澳递',
        'tiandihuayu' => '天地华宇',
        'tnt' => 'tnt',
        'ups' => 'ups',
        'wanjiawuliu' => '万家物流',
        'wenjiesudi' => '文捷航空速递',
        'wuyuan' => '伍圆',
        'wxwl' => '万象物流',
        'xinbangwuliu' => '新邦物流',
        'xinfengwuliu' => '信丰物流',
        'yafengsudi' => '亚风速递',
        'yibangwuliu' => '一邦速递',
        'youshuwuliu' => '优速物流',
        'youzhengguonei' => '邮政包裹挂号信',
        'youzhengguoji' => '邮政国际包裹挂号信',
        'yuanchengwuliu' => '远成物流',
        'yuanweifeng' => '源伟丰快递',
        'yuanzhijiecheng' => '元智捷诚快递',
        'yuntongkuaidi' => '运通快递',
        'yuefengwuliu' => '越丰物流',
        'yad' => '源安达',
        'yinjiesudi' => '银捷速递',
        'zhongtiekuaiyun' => '中铁快运',
        'zhongyouwuliu' => '中邮物流',
        'zhongxinda' => '忠信达',
        'zhimakaimen' => '芝麻开门'
    );
```
