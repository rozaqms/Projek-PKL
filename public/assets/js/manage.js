var slider = document.querySelector("#kt_slider_basic");
var valueMin = document.querySelector("#kt_slider_basic_min");
var valueMax = document.querySelector("#kt_slider_basic_max");

noUiSlider.create(slider, {
    start: [20, 80],
    connect: true,
    range: {
        "min": 0,
        "max": 100
    }
});

slider.noUiSlider.on("update", function (values, handle) {
    if (handle) {
        valueMax.innerHTML = values[handle];
    } else {
        valueMin.innerHTML = values[handle];
    }
});