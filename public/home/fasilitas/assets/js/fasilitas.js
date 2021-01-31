const header = document.querySelector("#header");
const fasilitasHeader = header.querySelector("#fasilitas-header");
const breakpoints = {
	xs: 0,
	sm: 576,
	md: 768,
	lg: 992,
	xl: 1200,
};

window.addEventListener("load", main);
window.addEventListener("resize", main);
// window.addEventListener("scroll", scrollEvent);

// function scrollEvent() {
// 	if (window.scrollY >= 10) {
// 		// navbar.classList.add("navbar-scroll");
// 		scrollToTop.classList.remove("invisible");
// 		scrollToTop.classList.add("bounce");
// 	} else {
// 		// navbar.classList.remove("navbar-scroll");
// 		scrollToTop.classList.remove("bounce");
// 		scrollToTop.classList.add("invisible");
// 	}
// }

function main() {
	if (window.innerWidth <= breakpoints["lg"]) {
		if (fasilitasHeader) {
			fasilitasHeader.src = base_url + "public/home/fasilitas/assets/images/fasilitas-header-sm.png";
		}
	} else {
		if (fasilitasHeader) {
			fasilitasHeader.src = base_url + "public/home/fasilitas/assets/images/fasilitas-header.png";
		}
	}
}
