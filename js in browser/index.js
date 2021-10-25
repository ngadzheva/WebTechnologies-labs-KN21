// function load() { 

// }

// window.onload = load();

(function () {
    var header = document.getElementsByTagName('header')[0];
    console.log(header);
    var firstName = document.getElementById('first-name');
    console.log(firstName);
    var studentInfo = document.getElementsByClassName('student')[0];
    console.log(studentInfo);
    var headerRow = document.querySelector('#header-row');
    var student = document.querySelectorAll('.student');

    header.innerHTML += ' Marks'; 

    var actionTh = document.createElement('th');
    actionTh.innerHTML = 'Action';
    headerRow.appendChild(actionTh);

    var markTh = document.createElement('th');
    var text = document.createTextNode('Marks');
    markTh.append(text);

    actionTh.before(markTh);

    var td = document.createElement('td');
    td.innerHTML = '6';
    td.setAttribute('id', 'mark');

    var fn = document.getElementById('fn');
    fn.after(td);

    var deleteBtnCell = document.getElementById('delete');
    deleteBtnCell.children[0].addEventListener('click', function (event) {
        var studentToDelete = event.target.parentNode.parentNode;
        studentToDelete.parentNode.removeChild(studentToDelete);
    });

    var addBtn = document.getElementsByName('add')[0];
    addBtn.addEventListener('click', addStudent);
})();

function addStudent(event) {
    event.preventDefault();

    var firstName = document.querySelector('[name="first-name"]');
    var lastName = document.querySelector('[name="last-name"]');
    var fn = document.querySelector('[name="fn"]');
    var mark = document.querySelector('[name="mark"]');

    var studentInfo = {
        firstName,
        lastName,
        fn,
        mark
    };

    appendTable(studentInfo);

    firstName.value = '';
    lastName.value = '';
    fn.value = 0;
    mark.value = 0;
}

function appendTable(studentInfo) {
    var tbody = document.getElementsByTagName('tbody')[0];

    var tr = document.createElement('tr');
    tr.setAttribute('class', 'student');

    var firstNameTd = document.createElement('td');
    firstNameTd.innerHTML = studentInfo.firstName.value;

    var lastNameTd = document.createElement('td');
    lastNameTd.innerHTML = studentInfo.lastName.value;

    var fnTd = document.createElement('td');
    fnTd.innerHTML = studentInfo.fn.value;

    var markTd = document.createElement('td');
    markTd.innerHTML = studentInfo.mark.value;

    var deleteTd = document.createElement('td');
    var deleteBtn = document.createElement('button');
    deleteBtn.innerHTML = 'Delete';
    deleteTd.appendChild(deleteBtn);

    tr.append(firstNameTd, lastNameTd, fnTd, markTd, deleteTd);

    tbody.appendChild(tr);
}