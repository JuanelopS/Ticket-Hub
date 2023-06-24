let ticketDetails = document.querySelector('#ticket-details');

let newResponseBox = () => {
    let row = document.createElement('div');
    row.classList.add('row');
    let column = document.createElement('div');
    column.classList.add('column');
    row.appendChild(column);
    let textarea = document.createElement('textarea');
    textarea.classList.add('textarea-ticket-response');
    textarea.setAttribute('placeholder', 'Write your response here...');
    textarea.setAttribute('rows', '5');
    column.appendChild(textarea);
    ticketDetails.appendChild(row);
}

let ticketDetailsButtons = document.querySelector('#ticket-details-buttons');

let newResponseButton = () => {
    let button = document.createElement('button');
    button.classList.add('button');
    button.setAttribute('id', 'button-reply-send');
    button.innerHTML = 'Send';
    ticketDetailsButtons.appendChild(button);
}

let replyButton = document.querySelector('#button-reply-ticket');

replyButton.addEventListener('click', function() {
    newResponseBox();
    let replyButton = document.querySelector('#button-reply-ticket');
    replyButton.style.display = 'none';
    newResponseButton();
});