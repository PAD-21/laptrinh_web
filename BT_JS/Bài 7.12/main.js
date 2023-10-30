var tableUsers = document.querySelector(".table-users");
var tbodyRef = tableUsers.getElementsByTagName("tbody")[0];

var idTitle = document.querySelector(".nameTable");
var nameTitle = document.querySelector(".nameTable");
var btnSort = document.querySelector(".btn-sort");
let sortedByName= false;
const data = [
  {nameID: "SP001",name: "Máy giặt",},
  { nameID: "SP002", name: "Bếp đa năng" },
  { nameID: "SP003", name: "Lò sưởi" },
  { nameID: "SP004", name: "Điều hòa nhiệt độ" },
  { nameID: "SP005", name: "Tủ lạnh" },
];
for (i = 0; i < data.length; i++) {
  document.getElementsByTagName("tbody")[0].innerHTML += `<tr><td>${
    i + 1
  }</td><td id="nameID">${data[i].nameID}</td><td>${data[i].name}</td></tr>`;
}

var sortUpIconName = document.querySelector(".sort-up-name");
var sortDownIconName = document.querySelector(".sort-down-name");

nameTitle.addEventListener("click", () => {
  if (sortDownIconName.classList.contains("hidden")) {
    sortDownIconName.classList.remove("hidden");
    sortUpIconName.classList.add("hidden");
  } else {
    sortDownIconName.classList.add("hidden");
    sortUpIconName.classList.remove("hidden");
  }
  console.log(data.name?'a':'b');
});
btnSort.onclick = () => {
  sortedByName = !sortedByName
  if (sortDownIconName.classList.contains("hidden")) {
    sortDownIconName.classList.remove("hidden");
    sortUpIconName.classList.add("hidden");
  } else {
    sortDownIconName.classList.add("hidden");
    sortUpIconName.classList.remove("hidden");
  }
  if(sortedByName){
    const sortName = [...data].sort((a,b) => a.name.localeCompare(b.name))
    document.getElementsByTagName("tbody")[0].innerHTML='';
    for (i = 0; i < sortName.length; i++) {
      document.getElementsByTagName("tbody")[0].innerHTML += `<tr><td>${
        i + 1
      }</td><td id="nameID">${sortName[i].nameID}</td><td>${sortName[i].name}</td></tr>`;
    }
  }
  else{
    document.getElementsByTagName("tbody")[0].innerHTML='';
    for (i = 0; i < data.length; i++) {
      document.getElementsByTagName("tbody")[0].innerHTML += `<tr><td>${
        i + 1
      }</td><td id="nameID">${data[i].nameID}</td><td>${data[i].name}</td></tr>`;
    }
  }
};
// Reset
function reset() {
  inputSearch.value = "";
  valueSearch = [];
  let td = document.getElementsByTagName("td");
  for (i = 0; i < td.length; i++) {
    td[i].style.color = "black";
  }
  let arrTr = tbodyRef.querySelectorAll("tr");
  for (i = 0; i < arrTr.length; i++) {
    arrTr[i].classList.remove("hidden");
  }
}

// highlight text when search
var valueSearch = [];
function setDefaultTable() {
  let trShow = document.querySelectorAll("tr[class=hidden]");
  console.log("valueSearch: ", valueSearch);
  if (valueSearch && valueSearch.length > 0) {
    for (j = 0; j < tbodyRef.rows.length; j++) {
      for (i = 0; i < valueSearch.length; i++) {
        for (z = 0; z < tbodyRef.rows[j].cells.length; z++) {
          tbodyRef.rows[j].cells[z].innerHTML = tbodyRef.rows[j].cells[
            z
          ].innerHTML.replace(
            `<span class="highlight" style="display: inline-block;min-width: 0;">${valueSearch[i]}</span>`,
            `${valueSearch[i]}`
          );
        }
      }
    }
  }
}
// search
function search(searchInput) {
  setDefaultTable();
  if (!searchInput.trim()) {
    // if (searchInput === "" && searchInput) {
    reset();
    return;
  }
  filter = searchInput;
  tr = tbodyRef.getElementsByTagName("tr");
  console.log(tr);
  let isFinded;
  for (let i = 0; i < tr.length; i++) {
    isFinded = false;
    for (let j = 0; j < tr[i].childNodes.length; j++) {
      td = tr[i].getElementsByTagName("td")[j];
      if (td) {
        let txtValue = td.innerText || td.textContent;
        // if (txtValue.toUpperCase().indexOf(filter) > -1) {
        if (txtValue.indexOf(filter) > -1) {
          isFinded = true;
          // td.style.color = "red";
          if (!valueSearch.includes(filter)) {
            valueSearch.push(filter);
          }
          console.log("filter: ", filter);
          td.innerHTML = td.innerHTML.replace(
            `${filter}`,
            `<span class='highlight' style='display: inline-block;min-width: 0;'>${filter}</span>`
          );
        }
      }
    }
    if (isFinded) {
      tr[i].classList.remove("hidden");
    } else {
      tr[i].classList.add("hidden");
    }
  }
}

var inputSearch = document.querySelector(".input-search");
inputSearch.addEventListener("keyup", () => {
  search(inputSearch.value);
});
