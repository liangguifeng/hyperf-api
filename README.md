# 说明

开发采用了jwt做接口的认证，做了用户的单点登录认证等

# 使用步骤

### 1、克隆项目到本地
`git clone https://github.com/liangguifeng/hyperf-api`
如果觉得github比较慢的，可以使用gitee进行克隆
`git clone https://gitee.com/liangguifeng/hyperf-api`
克隆到本地后进入目录

### 2、安装composer依赖包
`composer install`

### 3、运行迁移文件
`php bin/hyperf.php migrate`

### 4、运行程序
由于这里我采用了 `hyperf-watch` 让hyperf热更新的插件，所以这里我们直接运行:
`./watch` 即可，当然你也可以运行hyperf的官方启动命令: `php bin/hyperf.php start`


# hyperf官网文档

[https://doc.hyperf.io/](https://doc.hyperf.io/)
