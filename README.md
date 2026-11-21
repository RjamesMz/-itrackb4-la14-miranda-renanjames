F1. I learned how to register, log in, and log out users in Laravel. I also learned how to protect certain pages so only logged-in users can access them. Next meeting, we will learn more about deifferent roles and controlling what users are allowed to do.

F2. Laravel changes the session ID after login for security purposes. If we don't regenerate it, someone might reuse an existing session ID to access another user's account.

F3. Using the same error message prevents people from knowing if an email is registered or not. This helps protect users' information from being exposed.

F4. The index and show pages are public because visitors should still be able to browse and view records. The other actions require login because they can add, edit, or delete data.

F5. Hiding the buttons does not stop guests from accessing the pages through their URLs. The auth middleware is what actually blocks them and redirects them to the login page.

F6. Laravel expects the login route to be named exactly login when someone tries to open a protected page. If the name is changed, Laravel cannot find the route and shows an error.