<?php

/**
 * Gets data from the "database".
 *
 * @return array
 */
function get_users() {
	// Don't touch this method. This just mocks a possible response.
	return [
		[
			'name'    => 'Helen Abraham',
			'email'   => 'helen.a@example.com',
			'website' => '<http://helenabraham.example.com>',
		],
		[
			'name'    => 'Rashid Mihyar Quraishi',
			'email'   => 'rashid.m.q@example.com',
			'website' => 'rashid.example.com',
		],
		// etc.
	];
}

function get_user_websites() {
	$users = get_users();
	$websites = [];

	// Collect list of websites users have entered on their profile.
	foreach ( $users as $user ) {
		if ( !empty( $user['website'] ) ) {
			$clean_url = filter_var( $user['website'], FILTER_SANITIZE_URL );

			if ( filter_var( $clean_url, FILTER_VALIDATE_URL ) ) {
				$websites[] = $clean_url;
			} 

			// Note: depending on requirements, it is probably appropriate to do some additional checks to catch user-submitted websites without a protocol attached and perhaps prepend them with https.  
		}
	}

	return $websites;
}

function test_it_gets_user_websites() {
	$websites = get_user_websites();
    $valid_protocol = 'http';

	// Assume `assertTrue()` is provided by the framework.
	// The first param needs to be true, the second is the error if it's not.
	// Feel free to make up similar test functions like "assertEquals" or "assertContains" (or refer to PHPUnit's docs if you like).
	assertTrue( count( $websites ), 'Found a list of websites entered by users.' );
    assertContains( $valid_protocol, $websites, 'URL has http protocol' );
}
