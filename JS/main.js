var nameInput = document.getElementById("name");
var ageInput = document.getElementById("age");
var salaryInput = document.getElementById("salary");
var phoneInput = document.getElementById("phone");
var addBtn = document.getElementById("addBtn");
var employees;
var inputs = document.getElementsByClassName("form-control");

if (localStorage.getItem("employeeList") == null) {
    employees = [];
}
else {
    employees = JSON.parse(localStorage.getItem("employeeList"));
    displayData();
}
addBtn.onclick = function () {
    addEmployee();
    displayData();
    clearData();

}

function addEmployee() {
    var employee = {
        name: nameInput.value,
        age: ageInput.value,
        salary: salaryInput.value,
        phone: phoneInput.value,
    }
    employees.push(employee);
    localStorage.setItem("employeeList", JSON.stringify(employees))
}

function displayData() {
    var trs = "";
    for (var i = 0; i < employees.length; i++) {
        trs += `
        <tr>
            <td>${employees[i].name}</td>
            <td>${employees[i].age}</td>
            <td>${employees[i].salary}</td>
            <td>${employees[i].phone}</td>
            <td>
                <button class="btn btn-warning" onclick="editData(${i})">Update</button>
            </td>
            <td>
                <button class="btn btn-danger" onclick="deleteData(${i})">Delete</button>
            </td>
        </tr>`
    }
    document.getElementById("tableBody").innerHTML = trs
}

function clearData() {
    for (var i = 0; i < inputs.length; i++) {
        inputs[i].value = "";
    }

}

function deleteData(index) {
    employees.splice(index, 1);
    displayData();
    localStorage.setItem("employeeList", JSON.stringify(employees))
}

function editData(index) {
    nameInput.value = employees[index].name;
    ageInput.value = employees[index].age;
    salaryInput.value = employees[index].salary;
    phoneInput.value = employees[index].phone;
    addBtn.innerHTML = "Edit Employee";
    addBtn.onclick = function () {
        employees[index].name = nameInput.value;
        employees[index].age = ageInput.value;
        employees[index].salary = salaryInput.value;
        employees[index].phone = phoneInput.value;
        displayData();
        localStorage.setItem("employeeList", JSON.stringify(employees));
        clearData();
        addBtn.innerHTML = "Add Employee";
    }


}








































































