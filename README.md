QH4框架扩展模块-系统设置模块

### api列表
```php
/**
 * 分页获取数据
 * @return array [total,list,page,limit]
 */
public function actionIndex()
{
    $model = new Index([
        'external' => $this->ext_setting(),
    ]);

    return $this->runModel($model);
}
```

```php
/**
 * 新增一条设置
 */
public function actionCreate()
{
    $model = new Create([
        'external' => $this->ext_setting(),
    ]);

    return $this->runModel($model);
}
```

```php
/**
 * 更新单条设置
 */
public function actionUpdate()
{
    $model = new Update([
        'external' => $this->ext_setting(),
    ]);

    return $this->runModel($model);
}
```

```php
/**
 * 删除多条设置
 */
public function actionDelete()
{
    $model = new Delete([
        'external' => $this->ext_setting(),
    ]);

    return $this->runModel($model);
}
```

```php
/**
 * 获取设置的详细信息
 * @return array
 */
public function actionDetail()
{
    $model = new Detail([
        'external' => $this->ext_setting(),
    ]);

    return $this->runModel($model);
}
```

### 方法列表

```php
/**
 * 获取一条设置
 * @param string $key KEY值,也支持.形式,表示group.key
 * @param bool $effective 是否有效才返回
 * @param bool $only_value 是否只返回值(value字段)
 * @param ExtSetting|null $external
 * @return array|mixed|null
 */
public static function getOne($key, $effective = false, $only_value = true,ExtSetting $external=null)
```