const toggleMenu = () => {
	const menu = document.querySelector('#main_menu')
	if(menu.classList.contains('open')) {
		menu.classList.remove('open')
	}

	else {
		menu.classList.add('open')
	}
}