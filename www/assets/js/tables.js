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
      'Accept': "application/json",
      'Content-Type': "application/json",
    },
    body: JSON.stringify(data),
  })
    .then(resp => resp.text(), e => {
      console.log("Error", e);
    })
    .then(() => location.reload());

};

btnDelete.forEach(element => {
  element.addEventListener("click", e => {
    deleteItem(e.currentTarget.attributes['del'].value);
  });
});

btnUpdate.forEach(element => {
  element.addEventListener("click", e => {
    console.log(e.currentTarget.attributes['upd'].value);
  });
});


/* ACCESS TO TICKET DETAILS CLICKING ROW */

let clickableRow = document.querySelectorAll(".clickable-row");

clickableRow.forEach(element => {
  element.addEventListener("click", e => {
    window.location = `${e.currentTarget.attributes['data-href'].value}`;
  });
});

/* TABLE BADGES */

let priorityColumn = document.querySelectorAll(".priority-column");

priorityColumn.forEach(element => {
  let priority = element.innerHTML;
  switch (priority) {
    case "Urgent": element.classList.add("badge-urgent"); break;
    case "High": element.classList.add("badge-high"); break;
    case "Normal": element.classList.add("badge-normal"); break;
    case "Low": element.classList.add("badge-low"); break;    
  } 
});
