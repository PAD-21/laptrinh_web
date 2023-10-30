function handleEnter(event) {
  if (event.key === "Enter") {
    const form = document.getElementById("form-register");
    const index = [...form].indexOf(event.target);
    form.elements[index + 1].focus();
  }
}

function titleCase(str) {
  str = str.toLowerCase();
  str = str.split(" ");
  for (let i = 0; i < str.length; i++) {
    str[i] = str[i].charAt(0).toUpperCase() + str[i].slice(1);
  }

  return str.join(" ");
}

function checkFullName() {
  let x = document.getElementById("fullName");
  x.value = titleCase(x.value.trim());
}

function checkBirthday() {
  const inputBirthday = document.getElementById("birthday");
  if (inputBirthday.value.length === 2 || inputBirthday.value.length === 5) {
    inputBirthday.value += "/";
  }
}
