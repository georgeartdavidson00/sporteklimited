const styleTag = document.querySelector("style");
const spanTag = document.querySelector("#team-id");
const bodyTag = document.querySelector("body");

const teamId = spanTag.getAttribute("data-id");
const teamBgImage = `${teamId}T.png`;
// passing teams background image
styleTag.innerHTML += `.team-bg {  
    background-image:url("../images/${teamBgImage}");
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;
}`;
bodyTag.classList.add("team-bg");