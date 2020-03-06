<?php

// 配置可參考套件 codevTT 提供的 config_inc.php 範例, https://github.com/lbayle/codev/tree/master/doc/mantis_config

// ---------- database 參數：在安裝 mantisbt install page 時，填寫初始化資料時定義 ----------
$g_hostname                 = 'mysql';
$g_db_type                  = 'mysqli';
$g_database_name            = 'x';
$g_db_username              = 'x';
$g_db_password              = 'x';
$g_db_table_plugin_prefix   = 'x';
$g_db_table_suffix          = 'x';

// ---------- 系統環境參數 ----------
$g_default_timezone        = 'Asia/Taipei';
$g_default_language        = 'english';
$g_send_reset_password     = OFF;
$g_reauthentication_expiry = 60 * 60;

# ---------- Add CodevTT to mantis main menu ----------
array_push($g_main_menu_custom_options, array( "CodevTT", NULL, '../codevtt/index.php' ));

# 對應翻譯請查看 lang/strings_chinese_traditional.txt

# -------------------------------------------------------------
# 工作流程預設值 $g_status_enum_string = '10:new,20:feedback,30:acknowledged,40:confirmed,50:assigned,80:resolved,90:closed';
# 對應翻譯 $s_status_enum_string = '10:新問題,20:需要回覆,30:已接受,40:已確認,50:已分配,80:已解決,90:已結束';
# --- customize workflow ---
# see also custom_constants_inc.php and custom_strings_inc.php
$g_status_enum_string = '10:new,20:feedback,30:acknowledged,40:analyzed,50:open,80:resolved,82:validated,85:delivered,90:closed';

$g_status_colors['analyzed']  = '#fff494';
$g_status_colors['open']      = '#c2dfff';
$g_status_colors['validated'] = '#9EDB63';
$g_status_colors['delivered'] = '#61DB63';

$g_status_enum_workflow[NEW_]         ='20:feedback,30:acknowledged,40:analyzed,50:open,80:resolved';
$g_status_enum_workflow[FEEDBACK]     ='30:acknowledged,40:analyzed,50:open,80:resolved';
$g_status_enum_workflow[ACKNOWLEDGED] ='20:feedback,40:analyzed,50:open,80:resolved';
$g_status_enum_workflow[ANALYZED]     ='20:feedback,50:open,80:resolved';
$g_status_enum_workflow[OPEN_]        ='20:feedback,80:resolved';
$g_status_enum_workflow[RESOLVED]     ='20:feedback,82:validated,85:delivered,90:closed';
$g_status_enum_workflow[VALIDATED]    ='20:feedback,85:delivered,90:closed';
$g_status_enum_workflow[DELIVERED]    ='20:feedback,90:closed';
$g_status_enum_workflow[CLOSED]       ='20:feedback';
# --- END customize workflow ---

# -------------------------------------------------------------
# 出現頻率 $g_reproducibility_enum_string = '10:always,30:sometimes,50:random,70:have not tried,90:unable to duplicate,100:N/A';
# 對應翻譯 $s_reproducibility_enum_string = '10:持續,30:時常,50:隨機,70:尚未嘗試,90:無法重現,100:不適用';

# $g_reproducibility_enum_string = '10:always,30:sometimes,50:random,70:have not tried,90:unable to duplicate,100:N/A';
# --- END customize reproducibility ---

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
      'view_state',
      'handler',
      'priority',
      'severity',
      'resolution',
#      'reproducibility',
#      'platform',
#      'os',
#      'os_version',
#      'product_version',
      'product_build',
#      'target_version',
      'summary',
      'description',
      'additional_info',
      'steps_to_reproduce',
      'attachments',
 #     'due_date',
   );

   /**
    * An array of the fields to show on the bug view page.
    *
    * To overload this setting per project, then the settings must be included in the database through
    * the generic configuration form.
    *
    * @global array $g_bug_view_page_fields
    */
   $g_bug_view_page_fields = array (
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
#      'eta',
#      'platform',
#      'os',
#      'os_version',
#      'product_version',
      'product_build',
#      'target_version',
#      'fixed_in_version',
      'summary',
      'description',
      'additional_info',
      'steps_to_reproduce',
      'tags',
      'attachments',
#      'due_date',
   );
?>
