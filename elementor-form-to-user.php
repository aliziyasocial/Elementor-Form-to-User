<?php
/**
 * Plugin Name: Create New User with Elementor Form
 * Description: This plugin integrates with Elementor Pro forms to create a new WordPress user upon form submission. It supports user creation, updates user metadata, and logs in the new user automatically.
 * Author:      Aliziya
 * Author URI:  https://aliziya.com.tr
 * License URI: https://www.gnu.org/licenses/gpl-3.0.html
 */

add_action('elementor_pro/forms/new_record', 'aliziya_elementor_form_create_new_user', 10, 2);

function aliziya_elementor_form_create_new_user($record, $ajax_handler) {
    // Retrieve the form name from Elementor settings.
    $form_name = $record->get_form_settings('form_name');

    // Verify the form name matches the intended form for user creation.
    if ('Create New User' !== $form_name) {
        return;
    }

    // Extract the submitted form data.
    $form_data = $record->get_formatted_data();

    // Retrieve required fields: username, password, and email.
    $username = sanitize_user($form_data['User Name']);
    $password = sanitize_text_field($form_data['Password']);
    $email    = sanitize_email($form_data['Email']);

    // Attempt to create a new WordPress user.
    $user_id = wp_create_user($username, $password, $email);

    // Check if user creation was successful, otherwise return an error message.
    if (is_wp_error($user_id)) {
        $ajax_handler->add_error_message("Failed to create a new user: " . $user_id->get_error_message());
        $ajax_handler->is_success = false;
        return;
    }

    // Update user metadata with first and last names.
    $first_name = sanitize_text_field($form_data['First Name']);
    $last_name  = sanitize_text_field($form_data['Last Name']);
    wp_update_user([
        'ID'         => $user_id,
        'first_name' => $first_name,
        'last_name'  => $last_name,
    ]);

    // Automatically log in the newly created user.
    $credentials = [
        'user_login'    => $username,
        'user_password' => $password,
        'remember'      => true,
    ];
    $signon = wp_signon($credentials);

    // Redirect the user to the manually specified URL upon successful login.
    $manual_redirect_url = 'https://aliziya.com.tr'; // Replace with your desired URL.
    if (!is_wp_error($signon)) {
        $ajax_handler->add_response_data('redirect_url', $manual_redirect_url);
    }
}
