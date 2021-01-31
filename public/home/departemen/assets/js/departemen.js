const departemenHeader = document.querySelector('#departemen-header>img')
const departemenTop = document.querySelector('#profil-departemen>img')
const departemenMid = document.querySelector('#prospek-kerja>img')
const departemenBot = document.querySelector('#alumni>img')
const departemenPrestasi = document.querySelector('#departemen-prestasi>img')
const breakpoints = {
	xs: 0,
	sm: 576,
	md: 768,
	lg: 992,
	xl: 1200,
};

window.addEventListener('load', main);
window.addEventListener('resize', main);
// window.addEventListener('scroll', scrollEvent);

// function scrollEvent() {
// 	if (window.scrollY >= 10) {
// 		// navbar.classList.add("navbar-scroll");
// 		scrollToTop.classList.remove('invisible');
// 		scrollToTop.classList.add('bounce');
// 	} else {
// 		// navbar.classList.remove("navbar-scroll");
// 		scrollToTop.classList.remove('bounce');
// 		scrollToTop.classList.add('invisible');
// 	}
// }

function main() {
	if (window.innerWidth <= breakpoints['lg']) {
		if(departemenHeader){
			departemenHeader.src = base_url+'public/home/departemen/images/departemen-sm.png';
		}

		if(departemenTop){
			departemenTop.src = base_url+'public/home/departemen/images/departemen-profil-sm.png';
		}

		if(departemenMid){
			departemenMid.src = base_url+'public/home/departemen/images/departemen-prospek-sm.png';
		}

		if(departemenBot){
			departemenBot.src = base_url+'public/home/departemen/images/departemen-alumni-sm.png';
		}

		if(departemenPrestasi){
			departemenPrestasi.src = base_url+'public/home/departemen/images/departemen-prestasi-sm.png';
		}
	} else {		
		if(departemenHeader){
			departemenHeader.src = base_url+'public/home/departemen/images/fasilitas-header.png';
		}
		
		if(departemenTop){
			departemenTop.src = base_url+'public/home/departemen/images/departemen-profil.png';
		}

		if(departemenMid){
			departemenMid.src = base_url+'public/home/departemen/images/departemen-prospek.png';
		}

		if(departemenBot){
			departemenBot.src = base_url+'public/home/departemen/images/departemen-alumni.png';
		}

		if(departemenPrestasi){
			departemenPrestasi.src = base_url+'public/home/departemen/images/departemen-prestasi.png';
		}
	}
}
