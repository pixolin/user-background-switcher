var saveclass = null;
var sel = document.getElementById('bgswitcher');
sel.onchange = function(){
	saveclass = saveclass ? saveclass : document.body.className;
	document.body.className = saveclass + ' ' + sel.value;

	setCookie('bgswitcher', sel.value, 365);
};

function saveTheme(cookieValue) {
	var sel = document.getElementById('bgswitcher');

	saveclass = saveclass ? saveclass : document.body.className;
	document.body.className = saveclass + ' ' + sel.value;

	setCookie('bgswitcher', cookieValue, 365);
}

function setCookie(cookieName, cookieValue, nDays) {
	var today = new Date();
	var expire = new Date();

	if (!nDays) nDays=1;

	expire.setTime(today.getTime() + 3600000*24*nDays);
	document.cookie = cookieName+"="+escape(cookieValue) + ";expires="+expire.toGMTString();
}

function readCookie(name) {
  var nameEQ = name + "=";
  var ca = document.cookie.split(';');
  for(var i = 0; i < ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == ' ') c = c.substring(1, c.length);
    if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
  }
  return null;
}

document.addEventListener('DOMContentLoaded', function() {
    var themeSelect = document.getElementById('ThemeSelect');
    var selectedTheme = readCookie('theme');

    themeSelect.value = selectedTheme;
    saveclass = saveclass ? saveclass : document.body.className;
    document.body.className = saveclass + ' ' + selectedTheme;
});
