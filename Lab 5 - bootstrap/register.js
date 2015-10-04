// JavaScript Document

window.addEventListener('load',init);

var pwd1Input = document.getElementById('password1');
var pwd2Input = document.getElementById('password2');

function init()
{
	pwd1Input.addEventListener('change',updatePwd2Pattern);
	pwd2Input.addEventListener('invalid',setPwd2ErrorMsg);
	pwd2Input.addEventListener('change',clearPwd2ErrorMsg);
}

function updatePwd2Pattern()
{
	pwd2Input.pattern = pwd1Input.value;
}

function setPwd2ErrorMsg()
{
	var pwd2Input = document.getElementById('password2');
	pwd2Input.setCustomValidity('Your passwords do not match');
}

function clearPwd2ErrorMsg()
{
	pwd2Input.setCustomValidity('');
}









