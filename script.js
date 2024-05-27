
// Function to update the Course select list based on the selected Course Type
function updateCourseOptions() {
    // Get the selected Course Type value
    var courseType = document.getElementById("courseType").value;

    // Get the Course select list
    var courseSelect = document.getElementById("courseSelect");

    // Clear existing options
    courseSelect.innerHTML = "<option selected>Select Course</option>";

    // Define options based on the selected Course Type
    var options = [];

    if (courseType === "1") { // Under Graduation
        options = ["B.Li.Sc", "BBA", "BHM & CT", "History", "B.Sc(B)", "B.Sc(M)", "B.Sc(V)", "B.Com", "B.A", "B.B.M", "BCA", "B.Sc(V)"];
    } else if (courseType === "2") { // Post Graduation
        options = ["PGDCA", "PGDG&C", "M.A", "story", "M.COM", "M.Sc", "MASTER OF SOCIAL WORK", "MASTER OF TOURISM", "M.H.R.M.", "M.Li.Sc", "M.C.J.", "M.P.Ed"];
    } else if (courseType === "3") { // Professional
        options = ["B.Ed", "B.TECH", "B.Pharmacy", "LAW", "MBA", "MCA", "M.Pharmacy", "M.TECH", "M.ED", "B.P.ED", "PHARM-D", "M.Sc 5-YEAR INTEGRATED CHEMISTRY", "M.Sc 5-YEAR INTEGRATED BIOTECHNOLOGY"];
    }

    // Add options to the Course select list
    options.forEach(function (option) {
        var optionElement = document.createElement("option");
        optionElement.value = option;
        optionElement.textContent = option;
        courseSelect.appendChild(optionElement);
    });
}