window.addEventListener("DOMContentLoaded", function(e){

    let first_container = document.querySelector("#first_container");

    first_container.querySelector("#input_first_color").addEventListener("input", function(e) {
        let first_ex_console_el = first_container.querySelector(".tadbj_console_text");
        let first_ex_img_el = first_container.querySelector("img");

        first_ex_console_el.innerHTML += "Saving with new color: " + e.target.value + "<br>";
        first_ex_img_el.style.backgroundColor = e.target.value;
    });

    first_container.querySelector("#input_first_range").addEventListener("input", function(e) {
        let first_ex_console_el = first_container.querySelector(".tadbj_console_text");
        let first_ex_img_el = first_container.querySelector("img");

        first_ex_console_el.innerHTML += "Saving with hue degree: " + e.target.value + "<br>";
        first_ex_img_el.style.filter = "hue-rotate(" + e.target.value +  "deg)";
        first_ex_img_el.style.backgroundColor = e.target.value;
    })
});