let url = "/develop/ticket_list_json";

async function getTicketList(url) {
  let response = await fetch(url);
  let data = await response.json();
  return data;
}

const main = document.querySelector("main");

const ticketList = document.createElement("div");
ticketList.classList.add("ticket-list");
main.appendChild(ticketList);

function createTicketList() {
  getTicketList().then((tickets) => {
    
    tickets.map((ticket) => {

      const ticketId = document.createElement("p");
      ticketId.classList.add("ticket-id");
      ticketId.textContent = `Ticket ID: ${ticket.id}`;
      main.appendChild(ticketId);

      const ticketUser = document.createElement("p");
      ticketUser.classList.add("ticket-user");
      ticketUser.textContent = `User: ${ticket.user}`;
      main.appendChild(ticketUser);

      const ticketType = document.createElement("p");
      ticketType.classList.add("ticket-type");
      ticketType.textContent = `Type: ${ticket.type}`;
      main.appendChild(ticketType);

      const ticketPriority = document.createElement("p");
      ticketPriority.classList.add("ticket-priority");
      ticketPriority.textContent = `Priority: ${ticket.priority}`;
      main.appendChild(ticketPriority);

      const ticketSubject = document.createElement("p");
      ticketSubject.classList.add("ticket-subject");
      ticketSubject.textContent = `Subject: ${ticket.subject}`;
      main.appendChild(ticketSubject);

      const ticketText = document.createElement("p");
      ticketText.classList.add("ticket-text");
      ticketText.textContent = `Ticket Text: ${ticket.ticket_text}`;
      main.appendChild(ticketText);
    });
  });
}

createTicketList();
