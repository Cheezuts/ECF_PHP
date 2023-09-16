$(document).ready(function () {
  $("#selectAllBoxes").click(function (event) {
    if (this.checked) {
      $(".checkBoxes").each(function () {
        this.checked = true;
      });
    } else {
      $(".checkBoxes").each(function () {
        this.checked = false;
      });
    }
  });
});

// recherche :
document.addEventListener("DOMContentLoaded", function () {
  var filterButtons = document.querySelectorAll(".filter-button");
  var filterFields = document.querySelector(".filter-fields");

  filterFields.style.display = "none"; // Ajoute cette ligne pour masquer les champs au chargement de la page

  filterButtons.forEach(function (button) {
    button.addEventListener("click", function () {
      var filterType = this.getAttribute("data-filter");
      filterFields = document.querySelector(".filter-fields");

      if (filterType === filterFields.getAttribute("data-filter")) {
        filterFields.style.display =
          filterFields.style.display === "none" ? "block" : "none";
      } else {
        filterFields.style.display = "block";
      }

      filterFields.setAttribute("data-filter", filterType);
    });
  });
});
