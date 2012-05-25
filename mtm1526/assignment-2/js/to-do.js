//JavaScript File

var enter = document.getElementById('enter');
var newItem = document.getElementById('newItem')

document.getElementById('buttonClk').addEventListener('click', function (ev) {

if (enter.value != '') {
	var createBtn = document.createElement('li');
	createBtn.innerHTML = enter.value;
	newItem.appendChild(createBtn);
}

enter.value = '';
}, false);

newItem.addEventListener('click', function (ev) {
 	
	 if (ev.target.className == 'strike') {
	ev.target.className = '';
	
	} else {
	
	ev.target.className = 'strike';

}}, false);