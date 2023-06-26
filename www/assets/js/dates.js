/* JAVASCRIPT DATE TO MYSQL FORMAT */
let formattedDate = () => {
  let dateObject = new Date();
  let year = dateObject.getFullYear();
  let month = dateObject.getMonth() + 1;
  let day = dateObject.getDate();
  let hours = dateObject.getHours();
  let minutes = String(dateObject.getMinutes()).padStart(2, "0"); // Add leading zero
  let seconds = dateObject.getSeconds();

  return `${year}-${month}-${day} ${hours}:${minutes}:${seconds}`;
};
