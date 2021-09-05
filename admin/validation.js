const amount = document.getElementById("amount");
const form = document.getElementById("form");
const erroElememt = document.getElementById("eror");

form.addEventListener("submit", (e) => {
  let mesg = [];
  if (amount.value > 400000) {
    mesg.push("Amount must be samller or equal to 400,000 birr");
  }

  if (mesg.length > 0) {
    e.preventDefault();
    erroElememt.innerText = mesg.join(", ");
  }
});
