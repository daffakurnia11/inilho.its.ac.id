const header = document.querySelector("#header");
const fasilitasHeader = header.querySelector("#fasilitas-header");
const departemenHeader = header.querySelector("#departemen-header");
const departemenTop = document.querySelector("#carousel-departemen #bg-img");
const departemenMid = document.querySelector("#bidang-keahlian #bg-img");
const departemenBot = document.querySelector("#prospek-kerja #bg-img");
const departemenEnd = document.querySelector("#end-departemen");
const breakpoints = {
	xs: 0,
	sm: 576,
	md: 768,
	lg: 992,
	xl: 1200,
};

window.addEventListener("load", main);
window.addEventListener("resize", main);
window.addEventListener("scroll", scrollEvent);

function scrollEvent() {
	if (window.scrollY >= 10) {
		// navbar.classList.add("navbar-scroll");
		scrollToTop.classList.remove("invisible");
		scrollToTop.classList.add("bounce");
	} else {
		// navbar.classList.remove("navbar-scroll");
		scrollToTop.classList.remove("bounce");
		scrollToTop.classList.add("invisible");
	}
}

function main() {
	if (window.innerWidth <= breakpoints["lg"]) {
		if (departemenHeader) {
			departemenHeader.src = "assets/images/departemen-sm.png";
		}

		if (departemenTop) {
			departemenTop.src = "assets/images/departemen-foto-sm.png";
		}

		if (departemenMid) {
			departemenMid.src = "assets/images/departemen-bidang-keahlian-sm.png";
		}

		if (departemenBot) {
			departemenBot.src = "assets/images/departemen-prospek-kerja-sm.png";
		}

		if (departemenEnd) {
			element = departemenEnd.querySelector("#bg-img");
			departemenEnd.removeChild(element);
		}

		bpSelector.forEach(function (bpItem) {
			bpItem.classList.add("mobile");
		});

		mobileContainer.classList.add("w-100");
	} else {
		if (fasilitasHeader) {
			console.log("masuk sini");
			fasilitasHeader.src = "assets/images/departemen-header.png";
		}

		if (departemenHeader) {
			departemenHeader.src = "assets/images/fasilitas-header.png";
		}

		if (departemenTop) {
			departemenTop.src = "assets/images/departemen-foto.png";
		}

		if (departemenMid) {
			departemenMid.src = "assets/images/departemen-bidang-keahlian.png";
		}

		if (departemenBot) {
			departemenBot.src = "assets/images/departemen-prospek-kerja.png";
		}

		if (departemenEnd) {
			var bg_img = document.createElement("img");
			bg_img.setAttribute("src", "assets/images/departemen-end.png");
			bg_img.setAttribute("id", "bg-img");
			departemenEnd.appendChild(bg_img);
		}
	}
}
