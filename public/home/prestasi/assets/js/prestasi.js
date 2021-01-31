const cards = document.querySelectorAll(".prestasi-card");
const categories = document.querySelectorAll(".category-body");
const pills = document.querySelectorAll(".pill-item");
const prestasiHeader = header.querySelector("#prestasi-header-img");
const meetBg = document.querySelector("#meet-bg");

// cards.forEach((card, i) => {
// 	card.setAttribute("data-toggle", "modal");
// 	card.setAttribute("data-target", `#modal`);
// });

window.addEventListener("load", main_prestasi);
window.addEventListener("resize", main_prestasi);

function categoryToggle(i) {
	pills.forEach(function (pill) {
		console.log("category-" + i);
		if (pill.getAttribute("onclick") == "categoryToggle(" + i + ")") {
			pill.classList.add("active");
		} else {
			pill.classList.remove("active");
		}
	});

	categories.forEach(function (category) {
		if (category.id == "category-" + i) {
			category.classList.add("active");
		} else {
			category.classList.remove("active");
		}
	});
}

function main_prestasi() {
	if (window.innerWidth <= breakpoints["lg"]) {
		if (prestasiHeader) {
			prestasiHeader.src = base_url + "public/home/prestasi/assets/images/prestasi-header-sm.png";
			meetBg.src = base_url + "public/home/prestasi/assets/images/meet-sm.png";
		}
	} else {
		if (prestasiHeader) {
			prestasiHeader.src = base_url + "public/home/prestasi/assets/images/prestasi-header.png";
			meetBg.src = base_url + "public/home/prestasi/assets/images/meet.png";
		}
	}
}
