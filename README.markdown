# formal - A dead-simple contact form e-mailer in PHP
`formal` represents the strategy I've developed after writing a few (hundred) simple contact forms in PHP. It can be used alone or as a launchpad for more in-depth customizations.

`formal` contains a simple HTML file containing a form, along with some JavaScript code (utilizing jQuery) for AJAX processing of the form. If a user has disabled JavaScript, the form uses a fallback PHP handler.

The code in `json_handler.php` speaks JSON to the HTML form, and it also provides functionality for the fallback `php_handler.php` file.

Included also is a `formal.conf` file that defines basic configuration variables.

Feel free to use `formal` as you wish or fork the project and make quick fixes. The code is licensed under the [GNU General Public License v3](http://www.gnu.org/copyleft/gpl.html).
