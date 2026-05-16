## Methods to return a view

Redirect() <br>
Example: return redirect(/bears) <br>
Redirect using / like the url. You always start at the root of the website, so for example github.com is your starting point.
if you put redirect(/bears) you'll end up at github.com/bears. <br>

view() <br>
Example: return view('foldername.filename') <br>
Redirect from the views folder/map. <br>
<br>
Redirect->route() <br>
Example: Redirect->route('name') <br>
Redirect by using a name from the routes. (A.k.a using the name you gave to a route inside of web.php) <br>
