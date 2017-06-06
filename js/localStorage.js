$(document).ready(function(){
    $('#guardarCon').on('click',function(){
        var name = document.getElementById('nameCon').value,
        host = document.getElementById('host').value,
        baseDn = document.getElementById('baseDN').value,
        user = document.getElementById('username').value,
        pass = document.getElementById('password').value;

        var data = {            
            'host':host,
            'baseDn':baseDn,
            'user':user,
            'pass':pass
        }

        localStorage.setItem(name,JSON.stringify(data));        
    });
});