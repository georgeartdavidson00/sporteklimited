 // passing form value to select statements
const fitnessSelect = document.querySelector("#fitness");
const teamNameSelect = document.querySelector("#teamname");

const fitnessValue = fitnessSelect.getAttribute("data-value");
fitnessSelect.value = fitnessValue;

const teamNameValue = teamNameSelect.getAttribute("data-value");
console.log(teamNameValue);
teamNameSelect.value = teamNameValue;