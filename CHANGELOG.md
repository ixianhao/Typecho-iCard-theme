# 更新日志

## [0.0.3] - 2026-07-30

### 新增
- 新增 `categories.php` 模板：展示所有分类和标签及其下属文章数量，点击可跳转至对应归档页
- 新增侧边栏分类入口配置项：`side_bar_cat_mc`（按钮名称）和 `side_bar_cat_url`（链接地址），留空则不显示

### 修复
- **PHP 8.x 兼容性**：修复 `scandir()` 返回 false 时的异常处理（#3）
- **PHP 8.x 兼容性**：修复多处 null 值直接操作导致的 TypeError / Deprecation 警告
- **PHP 8.x 兼容性**：新增 `reEmo()`、`ParseAvatar()`、`GetOs()` 缺失函数定义，与 vCards 原版功能一致
- 修复 `404.php` 中 `header.php`、`sidebar.php`、`footer.php` 路径错误，现已指向 `layout/` 目录
- 修复 `options/index.php` 中未定义变量 `$version` 导致的 PHP 警告

---

## [0.0.2] - 2023

### 介绍
- 基于 vCards 修改的第一个版本
- 简约卡片风格，PJAX 无刷新加载
