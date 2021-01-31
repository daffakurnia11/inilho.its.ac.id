const fakultas = document.querySelectorAll(".fakultas-carousel");
const fakultasBtn = document.querySelectorAll(".fakultas-btn");

function fakultasToggle(i) {
	fakultas.forEach(function (f) {
		if (f.id == `fakultas-carousel-${i}`) {
			f.classList.add("active");
		} else {
			f.classList.remove("active");
		}
	});

	fakultasBtn.forEach(function (fBtn) {
		if (fBtn.id == `fakultas-btn-${i}`) {
			fBtn.classList.add("active");
		} else {
			fBtn.classList.remove("active");
		}
	});
}
