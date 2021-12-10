
//close span when player deleted
const notification = document.querySelector(".notification");
const notificationClose = document.querySelector("#notification-close");

notificationClose.addEventListener("click",
    (e) => notification.classList.add("hide-notification"));