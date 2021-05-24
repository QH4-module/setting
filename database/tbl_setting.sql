DROP TABLE IF EXISTS `tbl_setting`;

CREATE TABLE `tbl_setting`
(
    `id`                   INT          NOT NULL AUTO_INCREMENT,
    `type`                 TINYINT      NOT NULL COMMENT '类型,业务自定义',
    `group`                VARCHAR(200) NOT NULL COMMENT '分组',
    `key`                  VARCHAR(200) NOT NULL COMMENT 'KEY',
    `name`                 VARCHAR(200)  DEFAULT NULL COMMENT '名称',
    `value`                VARCHAR(2000) DEFAULT NULL COMMENT '值',
    `update_by`            VARCHAR(64)  NOT NULL COMMENT '更新人',
    `update_time`          BIGINT       NOT NULL COMMENT '更新时间',
    `is_effective`         TINYINT      NOT NULL COMMENT '是否生效',
    `effective_start_time` BIGINT       NOT NULL COMMENT '生效的开始时间,0不限制',
    `effective_end_time`   BIGINT       NOT NULL COMMENT '生效的结束时间,0不限制',
    `del_time`             BIGINT       NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB COMMENT = '系统设置';