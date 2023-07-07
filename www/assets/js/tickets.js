let ticketId = document.querySelector("#ticket");
let ticketResponses = document.querySelector("#ticket-responses");

/* JAVASCRIPT DATE TO MYSQL FORMAT */
let formattedDate = () => {
  let dateObject = new Date();
  let year = dateObject.getFullYear();
  let month = String(dateObject.getMonth() + 1).padStart(2, "0"); 
  let day = dateObject.getDate();
  let hours = dateObject.getHours();
  let minutes = String(dateObject.getMinutes()).padStart(2, "0"); // Add leading zero
  let seconds = dateObject.getSeconds();

  return `${year}-${month}-${day} ${hours}:${minutes}:${seconds}`;
};


/* CREATE A NEW RESPONSE BOX  */
let newResponseBox = () => {
  let row = document.createElement("div");
  row.classList.add("row");
  let column = document.createElement("div");
  column.classList.add("column");
  row.appendChild(column);
  let textarea = document.createElement("textarea");
  textarea.setAttribute("id", "textarea-ticket-response");
  textarea.setAttribute("placeholder", "Write your response here...");
  textarea.setAttribute("rows", "6");
  textarea.setAttribute("style", "height:auto;");
  textarea.setAttribute("maxlength", "568");
  column.appendChild(textarea);
  ticketResponses.appendChild(row);
};

let ticketDetailsButtons = document.querySelector("#ticket-details-buttons");

/* REPLACE NEW REPLY FOR SEND BUTTON */
let newResponseButton = () => {
  let button = document.createElement("button");
  button.classList.add("button");
  button.setAttribute("id", "button-reply-send");
  button.innerHTML = "Send";
  ticketDetailsButtons.appendChild(button);

  let buttonSend = document.querySelector("#button-reply-send");
  let response = document.querySelector("#textarea-ticket-response");
  buttonSend.addEventListener("click", () => {
    if (response.value === "") {
      alert("Please write your response before sending it.");
    } else {
      sendResponse();
    }
  });
};

let replyButton = document.querySelector("#button-reply-ticket");

replyButton.addEventListener("click", () => {
  newResponseBox();
  let replyButton = document.querySelector("#button-reply-ticket");
  replyButton.style.display = "none";
  newResponseButton();
});

/* SEND RESPONSE TO BACKEND */
const sendResponse = () => {
  let data = {
    ticket_id: ticketId.getAttribute("ticket-id"),
    response_text: document.querySelector("#textarea-ticket-response").value,
    response_date: formattedDate(),
  };

  let url = `/ticket/response`;

  fetch(url, {
    method: "POST",
    headers: {
      Accept: "application/json",
      "Content-Type": "application/json",
    },
    body: JSON.stringify(data),
  })
    .then(
      (resp) => resp.text(),
      (e) => {
        console.log("Error", e);
      }
    )
    .then(() => location.reload());
};

/* UPDATE STATE IN TICKET DETAILS */

let updateStateButton = document.querySelector("#update-state-button");

updateStateButton.addEventListener("click", () => {
  let select = document.querySelector("#select-state");

  let data = {
    id: ticketId.getAttribute("ticket-id"), 
    state: select.value,
    modification_date: formattedDate()
  };

  console.log(data); 

  let url = `/ticket/update_state`;

  fetch(url, {
    method: "PUT",
    headers: {
      Accept: "application/json",
      "Content-Type": "application/json",
    },
    body: JSON.stringify(data),
  })
    .then(
      (resp) => resp.text(),
      (e) => {
        console.log("Error", e);
      }
    )
    .then(() => location.reload());
});

let sendTicketButton = document.querySelector("#button-send-ticket");
let formSendTicket = document.querySelector("#form-send-ticket");

/* FIXME: CONSOLE ERROR IN TICKET DETAILS ? */

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
    .then(() => (window.location = `/user/profile/${data.user}`));
});
