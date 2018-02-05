function showDiv(elem) {
	if (elem.value == 'week') {
		document.getElementById('actionsWeek').style.display = "block";
		document.getElementById('actionsMonth').style.display = "none";
		document.getElementById('actionsYear').style.display = "none";
	} else if (elem.value == 'month')  {
		document.getElementById('actionsWeek').style.display = "none";
		document.getElementById('actionsMonth').style.display = "block";
		document.getElementById('actionsYear').style.display = "none";
	} else if (elem.value == 'year')  {
		document.getElementById('actionsWeek').style.display = "none";
		document.getElementById('actionsMonth').style.display = "none";
		document.getElementById('actionsYear').style.display = "block";
	}
}