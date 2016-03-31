/*
 * Content
 * 1. function to create cookies
 * 2. function to read cookies
 * 3. function to create cookie on dropdown event
 * 4. call function to create cookie on dropdown event
 * 5. read cookie after document was loaded
 */

var saveclass = null;
var sel = document.getElementById('bgswitcher');

/*
 * 1. function to create cookies
 */

function createCookie(name,value,days) {
	var expires;
	if (days) {
    var date = new Date();
    date.setTime(date.getTime()+(days*24*60*60*1000));
    expires = "; expires="+date.toGMTString();
  } else {
		expires = "";
	}
  document.cookie = name+"="+value+expires+"; path=/";
}

/*
 * 2. function to read cookies
 */

function readCookie(name) {
  var nameEQ = name + "=";
  var ca = document.cookie.split(';');
  for(var i=0;i < ca.length;i++) {
    var c = ca[i];
    while (c.charAt(0)===' ') {
			c = c.substring(1,c.length);
		}
    if (c.indexOf(nameEQ) === 0) {
			return c.substring(nameEQ.length,c.length);
		}
  }
  return null;
}

/*
 * 3. create cookie on dropdown event
 */

function saveBackground (value) {

	saveclass = saveclass ? saveclass : document.body.className;
	document.body.className = saveclass + ' ' + value;

	createCookie('wp-bgs', value, 365);
}

/*
 * 4. saveBackground on change of dropdown
 */

sel.onchange = function() {
	saveBackground (sel.value);
}

/*
 * 5. read cookie after document was loaded
 */

document.addEventListener('DOMContentLoaded', function() {
	var sel = document.getElementById('bgswitcher');
	var cookie = readCookie('wp-bgs');

	if (cookie) {
		sel.value = cookie;

		saveclass = saveclass ? saveclass : document.body.className;
		document.body.className = saveclass + ' ' + sel.value;
	}
});
