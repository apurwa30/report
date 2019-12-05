<?php

require(__DIR__.'/../../config.php');
require_once($CFG->libdir.'/adminlib.php');

admin_externalpage_setup('reportlastaddeduser', '', null, '', array('pagelayout'=>'report'));
echo $OUTPUT->header();
echo $OUTPUT->heading(get_string('lastaddeduser', 'report_lastaddeduser'));
//echo "llllllllllllllllllll";

$table = new html_table();
$table->head = array('First Name','Last Name','Username','Email');
$table->data = array();

$sql = "select username,id,email,firstname,lastname from mdl_user order by id desc";
$rs = $DB->get_recordset_sql($sql, array());
foreach ($rs as $log) {
    $row = array();
    $row[] = $log->firstname;
    $row[] = $log->lastname;
    $row[] = $log->username;
    $row[] = $log->email;
    $table->data[] = $row;
}

echo html_writer::table($table);

echo $OUTPUT->footer();