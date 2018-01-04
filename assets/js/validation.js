    function validuser(f) {
        !(/^[A-z0-9]*$/i).test(f.value)?f.value = f.value.replace(/[^A-z0-9]/ig,''):null;
            f.value = f.value.replace(/\^/g, "");
            f.value = f.value.replace(/\[/g, "");
            f.value = f.value.replace(/\]/g, "");
            f.value = f.value.replace(/\_/g, "");
            f.value = f.value.replace(/\\/g, "");
        } 
    function validpass(f) {
            f.value = f.value.replace(/\ /g, "");
        } 
    function showPassword() {
        var key_attr = $('#key').attr('type');        
        if(key_attr != 'text') {
            $('.checkbox').addClass('show');
            $('#key').attr('type', 'text');           
        } else {           
            $('.checkbox').removeClass('show');
            $('#key').attr('type', 'password');          
        }
    }
    function validname(f) {
        !(/^[A-z-.' ]*$/i).test(f.value)?f.value = f.value.replace(/[^A-z-.' ]/ig,''):null;
            f.value = f.value.replace(/\^/g, "");
            f.value = f.value.replace(/\[/g, "");
            f.value = f.value.replace(/\]/g, "");
            f.value = f.value.replace(/\_/g, "");
            f.value = f.value.replace(/\\/g, "");
            f.value = f.value.replace(/\ \ /g, "");
            f.value = f.value.replace(/\.\./g, "");
            f.value = f.value.replace(/\-\-/g, "");
            f.value = f.value.replace(/\'\'/g, "");
            f.value = f.value.replace(/\.\ \./g, "");
            f.value = f.value.replace(/\-\ \-/g, "");
            f.value = f.value.replace(/\'\ \'/g, "");
        } 
    function validadd(f) {
        !(/^[A-z0-9-.,' ]*$/i).test(f.value)?f.value = f.value.replace(/[^A-z0-9-.,' ]/ig,''):null;
            f.value = f.value.replace(/\^/g, "");
            f.value = f.value.replace(/\[/g, "");
            f.value = f.value.replace(/\]/g, "");
            f.value = f.value.replace(/\_/g, "");
            f.value = f.value.replace(/\\/g, "");
            f.value = f.value.replace(/\ \ /g, "");
            f.value = f.value.replace(/\.\./g, "");
            f.value = f.value.replace(/\-\-/g, "");
            f.value = f.value.replace(/\'\'/g, "");
            f.value = f.value.replace(/\,\,/g, "");
            f.value = f.value.replace(/\.\ \./g, "");
            f.value = f.value.replace(/\-\ \-/g, "");
            f.value = f.value.replace(/\'\ \'/g, "");
            f.value = f.value.replace(/\,\ \,/g, "");
        } 
    function validemail(f) {
        !(/^[A-z0-9@.]*$/i).test(f.value)?f.value = f.value.replace(/[^A-z0-9@.]/ig,''):null;
            f.value = f.value.replace(/\^/g, "");
            f.value = f.value.replace(/\[/g, "");
            f.value = f.value.replace(/\]/g, "");
            f.value = f.value.replace(/\\/g, "");
            f.value = f.value.replace(/\.\./g, "");
            f.value = f.value.replace(/\@\@/g, "");
            f.value = f.value.replace(/\_\_/g, "");
            f.value = f.value.replace(/\ \ /g, "");
        } 
    function validnum(f) {
            !(/^[0-9-]*$/i).test(f.value)?f.value = f.value.replace(/[^0-9-]/ig,''):null;
        }
    function checkPass()
    {
        //Store the password field objects into variables ...
        var password = document.getElementById('password');
        var password2 = document.getElementById('password2');
        //Store the Confimation Message Object ...
        var message = document.getElementById('confirmMessage');
        //Set the colors we will be using ...
        var goodColor = "#66cc66";
        var badColor = "#ff6666";
        //Compare the values in the password field 
        //and the confirmation field
        if(password.value == password2.value){
            //The passwords match. 
            //Set the color to the good color and inform
            //the user that they have entered the correct password 
            password2.style.backgroundColor = goodColor;
            message.style.color = goodColor;
            message.innerHTML = "Passwords Match!"
        }else{
            //The passwords do not match.
            //Set the color to the bad color and
            //notify the user.
            password2.style.backgroundColor = badColor;
            message.style.color = badColor;
            message.innerHTML = "Passwords Do Not Match!"
        }
    }  
    function validmsg(f) {
        !(/^[A-z-.,' ]*$/i).test(f.value)?f.value = f.value.replace(/[^A-z-.,' ]/ig,''):null;
            f.value = f.value.replace(/\^/g, "");
            f.value = f.value.replace(/\[/g, "");
            f.value = f.value.replace(/\]/g, "");
            f.value = f.value.replace(/\_/g, "");
            f.value = f.value.replace(/\\/g, "");
            f.value = f.value.replace(/\ \ /g, "");
            f.value = f.value.replace(/\.\./g, "");
            f.value = f.value.replace(/\-\-/g, "");
            f.value = f.value.replace(/\'\'/g, "");
            f.value = f.value.replace(/\,\,/g, "");
            f.value = f.value.replace(/\.\ \./g, "");
            f.value = f.value.replace(/\-\ \-/g, "");
            f.value = f.value.replace(/\'\ \'/g, "");
            f.value = f.value.replace(/\,\ \,/g, "");
        } 
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#blah').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
    
    $("#imgInp").change(function(){
        readURL(this);
    });
    
    