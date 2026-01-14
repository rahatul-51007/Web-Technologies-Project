let homeBox = document.getElementById("home");
let updateBox = document.getElementById("update");
let addBox = document.getElementById("add-remove");
let staffBox = document.getElementById("staff");
let summaryBox = document.getElementById("summary");


homeBox.style.display = "block";
updateBox.style.display = "none";
addBox.style.display="none";
staffBox.style.display="none";
summaryBox.style.display="none";

document.getElementById('room-option')
  .addEventListener('submit', function (e) {
      e.preventDefault();
  });

document.getElementById('add-option')
  .addEventListener('submit', function (e) {
      e.preventDefault();
  });

document.getElementById('search-by-room-name')
  .addEventListener('submit', function (e) {
      e.preventDefault();
  });

document.getElementById('search-by-date')
  .addEventListener('submit', function (e) {
      e.preventDefault();
  });

function showHome() {

    homeBox.style.display = "block";
    updateBox.style.display = "none";
    addBox.style.display="none";
    staffBox.style.display="none";
    summaryBox.style.display="none";
}

function showRoomUpdate() {

    homeBox.style.display = "none";
    updateBox.style.display = "block";
    addBox.style.display="none";
    staffBox.style.display="none";
    summaryBox.style.display="none"; 
}

function showAdd() {

    homeBox.style.display = "none";
    updateBox.style.display = "none";
    addBox.style.display="block";
    staffBox.style.display="none";
    summaryBox.style.display="none"; 
}

function showRequest() {
    
    homeBox.style.display = "none";
    updateBox.style.display = "none";
    addBox.style.display="none";
    staffBox.style.display="block";
    summaryBox.style.display="none"; 
}

function showSummary() {
    
    homeBox.style.display = "none";
    updateBox.style.display = "none";
    addBox.style.display="none";
    staffBox.style.display="none";
    summaryBox.style.display="block"; 
}