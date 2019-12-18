<?php
// https://codex.wordpress.org/Creating_Tables_with_Plugins

function database_install() {
	global $wpdb;

	$table_name = $wpdb->prefix . 'events_form';

	$charset_collate = $wpdb->get_charset_collate();

	$sql = "CREATE TABLE $table_name (
		id mediumint(9) NOT NULL AUTO_INCREMENT,
    unique_id tinytext NOT NULL,
    form_id tinytext NOT NULL,
    action tinytext NOT NULL,
    token tinytext NOT NULL,
    landed_at datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
    submitted_at datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
    fullName varchar(55) NULL,
    firstName varchar(55) NULL,
    lastName varchar(55) NULL,
    employeeJobLevel text NULL,
    employeeJobTitle tinytext NULL,
    employeeDepartmentWork text NULL,
    qualityOfWork tinyint NULL,
    jobKnowledge tinyint NULL,
    communicationSkills tinyint NULL,
    form text DEFAULT '' NOT NULL,

		PRIMARY KEY  (id)
	) $charset_collate;";

	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	dbDelta( $sql );

	add_option( 'wpwh_db_version', WPWH_VERSION );
}

function database_populate() {
	global $wpdb;

	$welcome_name = 'Mr. WordPress';
	$welcome_text = 'Congratulations, you just completed the installation!';

	$table_name = $wpdb->prefix . 'liveshoutbox';

	$wpdb->insert(
		$table_name,
		array(
			'time' => current_time( 'mysql' ),
			'name' => $welcome_name,
			'text' => $welcome_text,
		)
	);
}
