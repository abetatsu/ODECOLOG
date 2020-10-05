window.sendGform = function() {
     document.myForm.submit();
     document.getElementById('formWrapper').style.display = 'none';
     document.getElementById('thxMessage').style.display = 'block';
}
