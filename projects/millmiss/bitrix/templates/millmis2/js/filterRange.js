var slider = document.getElementById('range_cont');

noUiSlider.create(slider, {
	start: [0, 2500],
	connect: true,
	step: 500,
	range: {
		'min': 0,
		'max': 3000
	},
	pips: { // Show a scale with the slider
		mode: 'steps',
		stepped: true,
		density: 500
	}
});