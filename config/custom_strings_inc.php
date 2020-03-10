<?php

# 這邊定義工作流程要使用的對應翻譯標籤

# '10:新問題,20:需要回覆,30:已接受,40:已確認,50:已分配,60:驗收中,80:驗收完成,90:已結束'
# $s_status_enum_string = '10:new,20:feedback,30:acknowledged,40:confirmed,50:assigned,80:resolved,90:closed';
$s_status_enum_string = join(
    [
        '5'  . ':' . 'not_assign_yet',      // 未分配
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

$status_enum = [
    'not_assign_yet'      => ['button' => '未分配 btn', 'title' => '未分配', 'notification' => '當前問題尚未分配給 RD'],
    'in_progress'         => ['button' => '修復中 btn', 'title' => '修復中', 'notification' => ''],
    'fix_done'            => ['button' => '修復完成 btn', 'title' => '修復完成', 'notification' => ''],
    'wait_for_acceptance' => ['button' => '等待驗收 btn', 'title' => '等待驗收', 'notification' => ''],
    'testing'             => ['button' => '驗收中 btn', 'title' => '驗收中', 'notification' => ''],
    'need_fix_again'      => ['button' => '驗收退回 btn', 'title' => '驗收退回', 'notification' => ''],
    'acceptance_done'     => ['button' => '驗收通過 btn', 'title' => '驗收通過', 'notification' => ''],
    'double_check_done'   => ['button' => '預更新驗收通過 btn', 'title' => '預更新驗收通過', 'notification' => ''],
    'deployed'            => ['button' => '已修復上線 btn', 'title' => '已修復上線', 'notification' => ''],
    'archived'            => ['button' => '封存結束 btn', 'title' => '封存結束', 'notification' => ''],
    'need_track'          => ['button' => '持續追蹤 btn', 'title' => '持續追蹤', 'notification' => ''],
];
foreach ($status_enum as $status => $setting) {
    ${"s_{$status}_bug_button"} = $setting['button'];
    ${"s_{$status}_bug_title"} = $setting['title'];
    ${"s_email_notification_title_for_status_bug_{$status}"} = $setting['notification'];
}

// WARN: trailing spaces & empty lines AFTER the PHP end tag (? >) will cause mantis to crash !
?>
