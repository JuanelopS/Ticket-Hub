let sendTicketButton = document.querySelector("#button-send-ticket");
let formSendTicket = document.querySelector("#form-send-ticket");

/* JAVASCRIPT DATE TO MYSQL FORMAT */
let formattedDate = () => {
  let dateObject = new Date();
  let year = dateObject.getFullYear();
  let month = dateObject.getMonth() + 1;
  let day = dateObject.getDate();
  let hours = dateObject.getHours();
  let minutes = String(date.getMinutes()).padStart(2, "0");
  let seconds = dateObject.getSeconds();

  return `${year}-${month}-${day} ${hours}:${minutes}:${seconds}`;
};

formSendTicket.addEventListener("submit", (e) => {
  e.preventDefault();

  let data = {
    user: document.querySelector("#user").value,
    type: document.querySelector("#type").value,
    priority: document.querySelector("#priority").value,
    subject: document.querySelector("#subject").value,
    ticket_text: document.querySelector("#ticket_text").value,
    creation_date: formattedDate(),
  };

  let url = "/ticket/exec_send_ticket";

  fetch(url, {
    method: "POST",
    body: JSON.stringify(data),
    headers: {
      "Content-Type": "application/json",
    },
  })
    .then(
      (resp) => resp.text(),
      (e) => {
        console.log("Error", e);
      }
    )
    .then(() => location.reload());
});
