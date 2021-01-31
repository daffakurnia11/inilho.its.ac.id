document.addEventListener("DOMContentLoaded", all);

function all() {
	const html = document.querySelector("html");
	const header = document.querySelector("#header") || null;
	const landingHeader = header?.querySelector("#landing-header") || null;
	// const prestasiHeader = header.querySelector("#prestasi-header-img");
	// const meetBg = document.querySelector("#meet-bg");
	const navbar = document.querySelector(".navbar");
	const navButton = document.querySelector("#navbar-button");
	const navIcon = document.querySelector(".navbar-toggler-icon");
	const navList = document.querySelector("#navbarNavUl");
	const navBrand = document.querySelector(".navbar-brand");
	const navDropButton = document.querySelector(".nav-dropdown");
	const navDropdown = document.querySelector(".nav-dropdown-content");
	const mobileContainer = document.querySelector("#mobileNavContainer");
	const bpSelector = document.querySelectorAll(".bp");
	const scrollToTop = document.querySelector(".scroll-to-top");

	const breakpoints = {
		xs: 0,
		sm: 576,
		md: 768,
		lg: 992,
		xl: 1200,
	};

	var isScrollDisabled = false;

	window.addEventListener("load", main);
	window.addEventListener("resize", main);
	window.addEventListener("scroll", scrollEvent);

	navButton.addEventListener("click", toggleNav);
	navDropButton.addEventListener("click", toggleDropdown);

	window.onscroll = function () {
		if (isScrollDisabled) {
			html.style.cssText = "scroll-behavior:auto";
			window.scrollTo({ left: 0, top: 0, behavior: "auto" });
		} else {
			html.style.cssText = "scroll-behavior:smooth";
		}
	};

	function scrollEvent() {
		if (window.scrollY >= 10 && !isScrollDisabled) {
			// navbar.classList.add("navbar-scroll");
			scrollToTop.classList.remove("invisible");
			scrollToTop.classList.add("bounce");
		} else {
			//// navbar.classList.remove("navbar-scroll");
			scrollToTop.classList.remove("bounce");
			scrollToTop.classList.add("invisible");
		}
	}

	function main() {
		if (window.innerWidth <= breakpoints["lg"]) {
			// if (prestasiHeader) {
			// 	prestasiHeader.src = 'images/prestasi-header-sm.png';
			// 	meetBg.src = 'images/meet-sm.png';
			// }

			if (landingHeader) {
				landingHeader.src = `/public/home/landing/assets/images/landing-header-sm.png`;
				landingHeader.style = "width: 100%; position: absolute; z-index: 0";
			}

			bpSelector.forEach(function (bpItem) {
				bpItem.classList.add("mobile");
			});

			mobileContainer.classList.add("w-100");
		} else {
			// if (prestasiHeader) {
			// 	prestasiHeader.src = 'images/prestasi-header.png';
			// 	meetBg.src = 'images/meet.png';
			// }

			if (landingHeader) {
				landingHeader.src = `/public/home/landing/assets/images/landing-header.png`;
				landingHeader.style = "width: 85%; position: absolute; z-index: 0";
			}

			bpSelector.forEach(function (bpItem) {
				bpItem.classList.remove("mobile");
			});

			mobileContainer.classList.remove("w-100");
		}
	}

	function toggleNav() {
		navbar.classList.toggle("nav-locked");
		navbar.classList.toggle("position-absolute");
		navIcon.classList.toggle("active");
		isScrollDisabled = !isScrollDisabled;
		navList.classList.toggle("w-100");
	}

	function toggleDropdown() {
		navBrand.classList.toggle("active");
		navDropdown.classList.toggle("active");
	}

	function scroll() {
		document.body.scrollTop = 0; // For Safari
		document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
	}
}
