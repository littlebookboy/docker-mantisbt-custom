<?php

include "autoload.php";

// 配置可參考套件 codevTT 提供的 config_inc.php 範例, https://github.com/lbayle/codev/tree/master/doc/mantis_config

// ---------- 系統環境參數 ----------
$g_crypto_master_salt =      env('CRYPTO_MASTER_SALT');
$g_default_timezone =        env('DEFAULT_TIMEZONE');
$g_default_language =        env('DEFAULT_LANGUAGE');
$g_send_reset_password =     env('SEND_RESET_PASSWORD');
$g_reauthentication_expiry = env('REAUTHENTICATION_EXPIRY');

// ---------- database 參數：在安裝 mantisbt install page 時，填寫初始化資料時定義 ----------
$g_hostname =                env('DB_HOST');
$g_db_type =                 env('DB_TYPE');
$g_database_name =           env('DATABASE_NAME');
$g_db_username =             env('DB_USERNAME');
$g_db_password =             env('DB_PASSWORD');
$g_db_table_plugin_prefix =  env('DB_TABLE_PLUGIN_PREFIX');
$g_db_table_suffix =         env('DB_TABLE_SUFFIX');

# 對應翻譯請查看 lang/strings_chinese_traditional.txt

# -------------------------------------------------------------
# 工作流程預設值
# $g_status_enum_string = '10:new,20:feedback,30:acknowledged,40:confirmed,50:assigned,80:resolved,90:closed';
# 新增對應翻譯
# $s_status_enum_string = '5:未分配,15:修復中,25:修復完成,35:等待驗收,43:驗收退回,45:驗收通過,46:預更新驗收通過,85:已修復上線,92:封存結束,93:持續追蹤';
#
# see also custom_constants_inc.php and custom_strings_inc.php
$g_status_enum_string = join(
    [
        '5' .  ':' . 'not_assign_yet',      // 未分配
        '15' . ':' . 'in_progress',         // 修復中
        '25' . ':' . 'fix_done',            // 修復完成
        '35' . ':' . 'wait_for_acceptance', // 等待驗收
        '42' . ':' . 'testing',             // 驗收中
        '43' . ':' . 'need_fix_again',      // 驗收退回
        '45' . ':' . 'acceptance_done',     // 驗收通過
        '46' . ':' . 'double_check_done',   // 預更新驗收通過
        '85' . ':' . 'deployed',            // 已修復上線
        '92' . ':' . 'archived',            // 封存結束
        '93' . ':' . 'need_track',          // 持續追蹤
    ],
    ','
);

$g_status_colors = [
    'not_assign_yet'      => '#a2d7dd',   // 未分配
    'in_progress'         => '#7DB9DE',   // 修復中
    'fix_done'            => '#1F4788',   // 修復完成
    'wait_for_acceptance' => '#D3B17D',   // 等待驗收
    'testing'             => '#407A52',   // 驗收中
    'need_fix_again'      => '#FFA400',   // 驗收退回
    'acceptance_done'     => '#cfefc8',   // 驗收通過
    'double_check_done'   => '#cfefc8',   // 預更新驗收通過
    'deployed'            => '#6967AB',   // 已修復上線
    'archived'            => '#FBFBF6',   // 封存結束
    'need_track'          => '#B56C60',   // 持續追蹤
];

$g_status_enum_workflow['NOT_ASSIGN_YET']      = '15:in_progress,25:fix_done,35:wait_for_acceptance,42:testing,43:need_fix_again,45:acceptance_done,46:double_check_done,85:deployed,92:archived,93:need_track';
$g_status_enum_workflow['IN_PROGRESS']         = '25:fix_done,35:wait_for_acceptance,42:testing,43:need_fix_again,45:acceptance_done,46:double_check_done,85:deployed,92:archived,93:need_track';
$g_status_enum_workflow['FIX_DONE']            = '35:wait_for_acceptance,42:testing,43:need_fix_again,45:acceptance_done,46:double_check_done,85:deployed,92:archived,93:need_track';
$g_status_enum_workflow['WAIT_FOR_ACCEPTANCE'] = '25:fix_done,42:testing,43:need_fix_again,45:acceptance_done,46:double_check_done,85:deployed,92:archived,93:need_track';
$g_status_enum_workflow['TESTING']             = '25:fix_done,35:wait_for_acceptance,43:need_fix_again,45:acceptance_done,46:double_check_done,85:deployed,92:archived,93:need_track';
$g_status_enum_workflow['NEED_FIX_AGAIN']      = '25:fix_done,35:wait_for_acceptance,42:testing,45:acceptance_done,46:double_check_done,85:deployed,92:archived,93:need_track';
$g_status_enum_workflow['ACCEPTANCE_DONE']     = '25:fix_done,35:wait_for_acceptance,42:testing,43:need_fix_again,46:double_check_done,85:deployed,92:archived,93:need_track';
$g_status_enum_workflow['DOUBLE_CHECK_DONE']   = '25:fix_done,35:wait_for_acceptance,42:testing,43:need_fix_again,45:acceptance_done,85:deployed,92:archived,93:need_track';
$g_status_enum_workflow['DEPLOYED']            = '92:archived,93:need_track';
$g_status_enum_workflow['ARCHIVED']            = '93:need_track';
$g_status_enum_workflow['NEED_TRACK']          = '92:archived';
# --- END customize workflow ---
# -------------------------------------------------------------

# -------------------------------------------------------------
# 出現頻率預設值
# $g_reproducibility_enum_string = '10:always,30:sometimes,50:random,70:have not tried,90:unable to duplicate,100:N/A';
#
# 對應翻譯
# $s_reproducibility_enum_string = '10:持續,30:時常,50:隨機,70:尚未嘗試,90:無法重現,100:不適用';
#
# $g_reproducibility_enum_string = '10:always,30:sometimes,50:random,70:have not tried,90:unable to duplicate,100:N/A';
# --- END customize reproducibility ---
# -------------------------------------------------------------

# -------------------------------------------------------------
# --- remove unused fields ---
# http://www.mantisbt.org/forums/viewtopic.php?f=4&t=15606
# https://github.com/lbayle/codev/blob/master/doc/mantis_config/config_inc.php
# extract from config_deafults_inc.php

/**
 * An array of the fields to show on the bug report page.
 *
 * The following fields can not be included:
 * id, project, date_submitted, last_updated, status,
 * resolution, tags, fixed_in_version, projection, eta,
 * reporter.
 *
 * The following fields must be included: category_id, summary, description.
 *
 * To overload this setting per project, then the settings must be included in the database through
 * the generic configuration form.
 *
 * @global array $g_bug_report_page_fields
 */
$g_bug_report_page_fields = array(
    'category_id',
    'view_state',           // '公開 | 非公開'
    'handler',              // 分配給
    'priority',             // 優先權
    'resolution',           // 問題分析: 10:尚未分析,20:已修正,30:已重啟,40:無法重現,50:無法修復,60:重複問題,70:無須修正,80:暫緩處理,90:不做處理
    'summary',              // 摘要
    'description',          // 說明 (並附上應如何修復)
    'additional_info',      // 其他資訊
    'steps_to_reproduce',   // 重新產生問題的步驟
    'attachments',          // 附加檔案
#      'severity',          // 嚴重性
#      'reproducibility',   // 出現頻率
#      'platform',          // 平台類型
#      'os',                // 作業系統
#      'os_version',        // 作業系統版本
#      'product_version',   // 產品版本
#      'product_build',     // 產品 build
#      'target_version',    // 目標版本
#      'due_date',          // 到期日
);

/**
 * An array of the fields to show on the bug view page.
 *
 * To overload this setting per project, then the settings must be included in the database through
 * the generic configuration form.
 *
 * @global array $g_bug_view_page_fields
 */
$g_bug_view_page_fields = array(
    'id',
    'project',
    'category_id',
    'view_state',
    'date_submitted',
    'last_updated',
    'reporter',
    'handler',
    'priority',
    'severity',
    'reproducibility',
    'status',
    'resolution',
    'projection',
    'product_build',
    'summary',
    'description',
    'additional_info',
    'steps_to_reproduce',
    'tags',
    'attachments',
#      'eta',
#      'platform',
#      'os',
#      'os_version',
#      'product_version',
#      'target_version',
#      'fixed_in_version',
#      'due_date',
);

# ---------- Add CodevTT to mantis main menu ----------
array_push($g_main_menu_custom_options, array("CodevTT", null, '../codevtt/index.php'));
?>
