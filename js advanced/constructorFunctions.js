function Person(name, age) {
    this.name = name;
    this.age = age;

    // this.info = function() { console.log(`${this.name} ${this.age}`); };
}

Person.prototype.info = function() { console.log(`${this.name} ${this.age}`); };

const person = new Person('Person', 22);
const ivan = new Person('Ivan', 23);

person.info();
ivan.info();

function Student(name, age, fn) {
    Person.call(this, name, age);

    this.fn = fn;

    let _mark;

    this.getMark = function () { return _mark; };
    this.setMark = function (mark) { _mark = mark; };
}

// Student.prototype.sayHi = function() { console.log(`Hello, ${this.fn}`); };

// Student.prototype = Person.prototype;
Student.prototype = Object.create(Person.prototype);

Student.prototype.studentInfo = function() { 
    console.log(`${this.fn}: `);
    this.info();
};

const student = new Student('Student', 22, 88888);
student.info();
console.log(student.name);
console.log(student.fn);
student.studentInfo();
// student.sayHi();
student.setMark(6);
student.getMark();
// student._mark; -> undefined

const petkan = new Person('Petkan', 23);
petkan.studentInfo();