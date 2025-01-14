# Elementor Form to User

## Description

This plugin integrates with Elementor Pro forms to create a new WordPress user upon form submission. It supports user creation, updates user metadata, and logs in the new user automatically.

## Features

- **Create New User**: Automatically creates a new WordPress user using the provided username, password, and email.
- **User Metadata**: Updates the first and last names for the newly created user.
- **Automatic Login**: Logs in the newly created user after registration.
- **Custom Redirect**: Redirects the user to a custom URL after login.

## Installation

1. Download and install the plugin as you would any other WordPress plugin.
2. Activate the plugin through the WordPress dashboard.
3. Create an Elementor form with the fields: Username, Password, Email, First Name, and Last Name.
4. Ensure the form's name is set to **Create New User** in Elementor’s form settings.
5. Configure the form’s submission settings as needed.

## Configuration

You can replace `'https://aliziya.com.tr'` with the URL you want to redirect the user to after login.

## How It Works

Once a user submits the form:

- **New User Creation**: The plugin automatically creates a new user in WordPress using the provided username, password, and email.
- **User Metadata Update**: First and last names (if provided) are added to the user profile.
- **Automatic Login**: The newly created user is logged into the website.
- **Redirection**: After login, the user is redirected to the URL specified in the plugin settings.

## Troubleshooting

- **Failed User Creation**: If the plugin fails to create the user, make sure that the form fields (username, password, email) are properly filled out and that there are no validation issues in the form.
- **Automatic Login Not Working**: Ensure that there are no issues with your WordPress login system, and check for any conflicts with other plugins that may restrict login functionality.

## License

This plugin is licensed under the [GNU General Public License v3.0](https://www.gnu.org/licenses/gpl-3.0.html).

## Author

**Aliziya**  
[Visit our website](https://aliziya.com.tr)
