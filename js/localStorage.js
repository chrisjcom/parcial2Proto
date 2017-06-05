const name = document.getElementById('nombreCon'),
btnGuardar = document.getElementById('guardarCon'),
host = document.getElementById('host'),
baseDn = document.getElementById('baseDN'),
user = document.getElementById('username'),
pass = document.getElementById('password');
/*function storageAvailable() {
    try {
        var storage = localStorage,
            x = '__storage_test__';
        storage.setItem(x, x);
        storage.removeItem(x);
        return true;
    }
    catch(e) {
        return e instanceof DOMException && (
            // everything except Firefox
            e.code === 22 ||
            // Firefox
            e.code === 1014 ||
            // test name field too, because code might not be present
            // everything except Firefox
            e.name === 'QuotaExceededError' ||
            // Firefox
            e.name === 'NS_ERROR_DOM_QUOTA_REACHED') &&
            // acknowledge QuotaExceededError only if there's something already stored
            storage.length !== 0;
    }
}

if (storageAvailable()) {
	// Yippee! We can use localStorage awesomeness
}
else {
	// Too bad, no localStorage for us
    console.log('error');
}*/

function saveOnLocalStorage(evt) {
    evt.
    console.log("1");
    var datos = {    
    'host':host.value,
    'baseDN':baseDn.value,
    'username':user.value,
    'password':pass.value
    };
    localStorage.setItem(name.value,datos);
}

btnGuardar.addEventListener("onclick",saveOnLocalStorage);    