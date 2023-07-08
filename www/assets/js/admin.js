/* SHOW DATE IN DD/MM/YYYY HH:MM:SS FORMAT */

let formattedDate = (date) => {
  let dateObject = new Date(date);
  let year = dateObject.getFullYear();
  let month = String(dateObject.getMonth() + 1).padStart(2, "0");
  let day = String(dateObject.getDate()).padStart(2, "0");
  let hours = dateObject.getHours();
  let minutes = String(dateObject.getMinutes()).padStart(2, "0"); // Add leading zero
  let seconds = String(dateObject.getSeconds()).padStart(2, "0");

  return `${day}-${month}-${year} ${hours}:${minutes}:${seconds}`;
};

/* GET TICKET LIST */

async function getTicketList(url) {
  let response = await fetch(url);
  let data = await response.json();
  return data;
}

/* TICKET LIST STRUCTURE */

function ticketListStructure(ticket) {
  const ticketRow = document.createElement("tr");
  ticketRow.classList.add("ticket-row", "clickable-row");
  ticketRow.setAttribute("data-href", `/ticket/details/${ticket.id}`);

  const ticketId = document.createElement("td");
  ticketId.classList.add("ticket-id");
  ticketId.textContent = `${ticket.id}`;
  ticketRow.appendChild(ticketId);

  const ticketPriority = document.createElement("td");
  ticketPriority.classList.add("ticket-priority");
  ticketPriority.textContent = `${ticket.priority}`;
  ticketRow.appendChild(ticketPriority);

  const ticketType = document.createElement("td");
  ticketType.classList.add("ticket-type");
  ticketType.textContent = `${ticket.type}`;
  ticketRow.appendChild(ticketType);

  const ticketUser = document.createElement("td");
  ticketUser.classList.add("ticket-user");
  ticketUser.textContent = `${ticket.user}`;
  ticketRow.appendChild(ticketUser);

  const ticketSubject = document.createElement("td");
  ticketSubject.classList.add("ticket-subject");
  ticketSubject.textContent = `${ticket.subject}`;
  ticketRow.appendChild(ticketSubject);

  const ticketCreation = document.createElement("td");
  ticketCreation.classList.add("ticket-creation");
  ticketCreation.textContent = formattedDate(ticket.creation_date);
  ticketRow.appendChild(ticketCreation);

  const ticketModification = document.createElement("td");
  ticketModification.classList.add("ticket-modification");
  ticketModification.textContent = formattedDate(ticket.modification_date);
  ticketRow.appendChild(ticketModification);

  const ticketState = document.createElement("td");
  ticketState.classList.add("ticket-state");
  ticketState.textContent = `${ticket.state}`;
  ticketRow.appendChild(ticketState);

  if (ticketList) {
    ticketList.appendChild(ticketRow);
  }
}

/* CREATE TICKET LIST */

function createTicketList(url, state = "all") {
  getTicketList(url).then((tickets) => {
    const ticketList = document.querySelector(".ticket-list");

    if (state == "pending") {
      tickets
        .filter((ticket) => ticket.state == "wip" || ticket.state == "todo")
        .map((ticket) => {
          ticketListStructure(ticket);
        });
    } else if (state == "done") {
      tickets
        .filter((ticket) => ticket.state == "done")
        .map((ticket) => {
          ticketListStructure(ticket);
        });
    } else {
      tickets.map((ticket) => {
        ticketListStructure(ticket);
      });
    }
    priorityBadges();
    clickableRow();
  });
}

/* ALL/PENDING/FINISHED TICKETS */

let allTickets = document.querySelector(".all-tickets");
let pendingTickets = document.querySelector(".pending-tickets");
let finishedTickets = document.querySelector(".finished-tickets");

allTickets.addEventListener("click", () => {
  ticketList.innerHTML = "";
  createTicketList(`/ticket/ticket_list_json`);
});

pendingTickets.addEventListener("click", () => {
  ticketList.innerHTML = "";
  createTicketList(`/ticket/ticket_list_json`, "pending");
});

finishedTickets.addEventListener("click", () => {
  ticketList.innerHTML = "";
  createTicketList(`/ticket/ticket_list_json`, "done");
});

/* ACCESS TO TICKET DETAILS CLICKING ROW */

function clickableRow() {
  let clickableRow = document.querySelectorAll(".clickable-row");

  clickableRow.forEach((element) => {
    element.addEventListener("click", (e) => {
      window.location = `${e.currentTarget.attributes["data-href"].value}`;
    });
  });
}

/* TABLE BADGES */

function priorityBadges() {
  let priorityColumn = document.querySelectorAll(".ticket-priority");

  priorityColumn.forEach((element) => {
    let priority = element.textContent;
    switch (priority) {
      case "Urgent":
        element.classList.add("badge-urgent");
        break;
      case "High":
        element.classList.add("badge-high");
        break;
      case "Normal":
        element.classList.add("badge-normal");
        break;
      case "Low":
        element.classList.add("badge-low");
        break;
    }
  });
}

/* BUTTONS EDIT / DELET FROM USER LIST */

let btnDelete = document.querySelectorAll(".btn_delete");
let btnUpdate = document.querySelectorAll(".btn_update");

const deleteItem = (id) => {
  let data = {
    item: id,
  };

  let url = `/user/delete`;

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

btnDelete.forEach((element) => {
  element.addEventListener("click", (e) => {
    deleteItem(e.currentTarget.attributes["del"].value);
  });
});

btnUpdate.forEach((element) => {
  element.addEventListener("click", (e) => {
    console.log(e.currentTarget.attributes["upd"].value);
  });
});

/* TODO: MIX TABLES.JS && ADMIN.JS */

let ticketList = document.querySelector(".ticket-list");

let dataId = ticketList.getAttribute("data-id");
let userId = ticketList.getAttribute("user-id");

createTicketList(`/ticket/ticket_list_json`);

/* ORDER TICKET LIST */

let idColumn = document.querySelector("#id-column");
let idPriority = document.querySelector("#priority-column");
let idType = document.querySelector("#type-column");
let idUser = document.querySelector("#user-column");
let idSubject = document.querySelector("#subject-column");
let idCreation = document.querySelector("#creation-column");
let idModification = document.querySelector("#modification-column");
let idState = document.querySelector("#state-column");