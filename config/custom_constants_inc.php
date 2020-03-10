<?php

# 這邊放自定義的新工作流程

/**
 * '5' . ':' . 'not_assign_yet',       // 未分配
 * '15' . ':' . 'in_progress',         // 修復中
 * '25' . ':' . 'fix_done',            // 修復完成
 * '35' . ':' . 'wait_for_acceptance', // 等待驗收
 * '42' . ':' . 'testing',             // 驗收中
 * '43' . ':' . 'need_fix_again',      // 驗收退回
 * '45' . ':' . 'acceptance_done',     // 驗收通過
 * '46' . ':' . 'double_check_done',   // 預更新驗收通過
 * '85' . ':' . 'deployed',            // 已修復上線
 * '92' . ':' . 'archived',            // 封存結束
 * '93' . ':' . 'need_track',          // 持續追蹤
 */

define('NOT_ASSIGN_YET', 5); # 未分配
define('IN_PROGRESS', 15); # 修復中
define('FIX_DONE', 25); # 修復完成
define('WAIT_FOR_ACCEPTANCE', 35); # 等待驗收
define('TESTING', 42); # 驗收中
define('NEED_FIX_AGAIN', 43); # 驗收退回
define('ACCEPTANCE_DONE', 45); # 驗收通過
define('DOUBLE_CHECK_DONE', 46); # 預更新驗收通過
define('DEPLOYED', 85); # 已修復上線
define('ARCHIVED', 92); # 封存結束
define('NEED_TRACK', 93); # 持續追蹤

// WARN: trailing spaces & empty lines AFTER the PHP end tag (? >) will cause mantis to crash !
?>
