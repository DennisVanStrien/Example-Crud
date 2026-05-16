##num errors

400 - Bad Request
This error means that the server cannot understand or process the request because of an error on the client side. This most likely means the data sent by the browser is invalid.
To fix this, double check the url for typos and make sure all input fields are named correctly. (You can also try clearing your browser cache/cookies if thats really needed)

401 - Unauthorized
This error means you are not authenticated to view the page. You will get this error when you try to view a protected page (One that requires logging in) without being logged in.
To fix this, make sure you log in or check if your authentication session has expired.

403 - Forbidden
You'll get this error when you don't have the permissions to view a page. For example a normal user gets redirected to an admin page, but they can't view this page.


404 - Page not found
This simply means the page is not found. This can either mean your page does not exist or your url doesn't redirect you to the correct page.
To fix this double check your routing/redirects.


419 - Page Expired
This error means that your security token has either expired or is missing. In most cases its missing.
To fix this make sure your form has a csrf token inside of it ("@csrf").
A csrf token protects you by prohibiting requests from other sites, making your site more safe.
When you use Laravel as framework, for protection it will require you to use a @csrf token in your form, else it will give this error.
