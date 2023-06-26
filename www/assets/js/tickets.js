let ticketId = document.querySelector("#ticket");
let ticketResponses = document.querySelector("#ticket-responses");

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
  textarea.setAttribute("rows", "5");
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
  };

  /* console.log(data); */

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
