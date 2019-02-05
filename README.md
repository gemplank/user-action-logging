## WordPress User Action Logging

Howdy!

This plugin was created to assist with user tracking & activity logging. Currently the plugin tracks user logins & logouts but you can easily incorporate the functionality into your theme by running my custom action to log further activity.

The custom action would need to be run via `do_action` when your desired activity is triggered. Here is an example below;

```
// Store user id.
$user_id = get_current_user_id();

// If we have the user id, continue.
if ( ! empty( $user_id ) ) {
  // Get user data with id.
  $user = get_userdata( $user_id );

  // Store a user name.
  $user_name = $user->display_name ? $user->display_name : $user->user_nicename;

  // Log this activity.
  do_action( 'ual_log_action', $user->ID, $user_name . ' logged In', 'logged-in' );
}
```

The final line - `do_action( 'ual_log_action', $user->ID, $user_name . ' logged In', 'logged-in' );` is where the magic happens! It takes 4 parameters; action name (`ual_log_action`), user ID (int), message (string) and taxonomy slug (string). When this action is used, a post gets created within the `Activity` CPT and utilises the final parameter to set a taxonomy to that post. This helps with filtering and being able to gain stats. By default, the `Activity` post that gets created assigns the user ID as the author - again this helps to filter activity by user.

Once you have a range of activity triggers, you could generate a PDF/CSV which contains all the posts for all users or specific users. If you have any questions or improvements feel free to let me know! :)
