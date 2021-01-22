const el = document.getElementById("particle");
const base_url = el.getAttribute("base_url");

const ellipse = base_url + "public/assets/ellipse.svg";

const particles = {
	particles: {
		number: {
			value: 5,
			density: {
				enable: false,
				value_area: 800,
			},
		},
		color: {
			value: ["#0C0C6D", "#7FDAEF", "#F95D8A", "#7FEF35", "#FCFC54"],
		},
		shape: {
			type: "circle",
			stroke: {
				width: 0,
				color: "#000000",
			},
		},
		opacity: {
			value: 1,
			random: false,
			anim: {
				enable: true,
				speed: 1,
				opacity_min: 0.4,
				sync: false,
			},
		},
		size: {
			value: 96.20472365193136,
			random: true,
			anim: {
				enable: true,
				speed: 4,
				size_min: 0.3,
				sync: false,
			},
		},
		line_linked: {
			enable: false,
			distance: 150,
			color: "#ffffff",
			opacity: 0.4,
			width: 1,
		},
		move: {
			enable: true,
			speed: 10,
			direction: "none",
			random: true,
			straight: false,
			out_mode: "out",
			bounce: false,
			attract: {
				enable: false,
				rotateX: 600,
				rotateY: 600,
			},
		},
	},
	interactivity: {
		detect_on: "window",
		events: {
			onhover: {
				enable: true,
				mode: "repulse",
			},
			onclick: {
				enable: true,
				mode: "push",
			},
			resize: true,
		},
		modes: {
			grab: {
				distance: 100,
				line_linked: {
					opacity: 1,
				},
			},
			bubble: {
				distance: 250,
				size: 0,
				duration: 1,
				opacity: 0,
				speed: 10,
			},
			repulse: {
				distance: 100,
				duration: 10,
			},
			push: {
				particles_nb: 4,
			},
			remove: {
				particles_nb: 2,
			},
		},
	},
	retina_detect: true,
};

particlesJS("particles-js", particles, function () {
	console.log("callback - particles.js config loaded");
});

console.log(ellipse);
