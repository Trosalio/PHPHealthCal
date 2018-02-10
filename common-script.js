let currentURLTemplate;

function changePanel(selectedValue) {
    let selectedPanel = $("#form-panel, #formula-panel");
    $("#result-panel").fadeOut();
    selectedPanel.fadeOut();
    if (selectedValue !== "") {
        selectedPanel.hide();
        if (selectedValue === "bmi") {
            currentURLTemplate = "BMITemplate.html";
        } else if (selectedValue === "bmr") {
            currentURLTemplate = "BMRTemplate.html";
        } else {
            currentURLTemplate = "CCLTemplate.html";
        }
        $('#form-panel').load(`${currentURLTemplate} #form`);
        $('#formula-panel').load(`${currentURLTemplate} #formula`);
        selectedPanel.fadeIn();
    }
}

$(document).ready(function () {
    $(document).on("submit", "form", function (e) {
        e.preventDefault();
        $("#result-panel").fadeOut();
        $.get($(this).attr("action"), $(this).serialize(), function (response) {
            console.log(response);
            $("#result-panel").load(`${currentURLTemplate} #result`, function () {
                $(this).find("#result > div").html(response);
                $(this).fadeIn();
            });
        });
    })
});