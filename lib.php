<?php

function report_myreport_extend_navigation_course($navigation, $course, $context) {
    if (has_capability('report/lastaddeduser:view', $context)) {
        $url = new moodle_url('/report/lastaddeduser/index.php', array('id'=>$course->id));
        $navigation->add(get_string('pluginname', 'report_lastaddeduser'), $url, navigation_node::TYPE_SETTING, null, null, new pix_icon('i/report', ''));
    }
}