name = 'Super Global';
const pesho = { age: 22, name: 'Pesho' };
const ivan = { age: 23, name: 'Ivan' };
const maria = { age: 23, name: 'Maria' };

const sayHi = function(a, b, c) {
    console.log(`Hi, I am ${this.name}`);
};

// sayHi();

pesho.sayHi = sayHi;
// pesho.sayHi();

// sayHi.call(ivan, [1, 2, 3]);
// pesho.sayHi.apply(maria);

const student = { 
    name: 'Student',
    fn: 88888,
    info: function() { console.log(`${this.fn}: ${this.name}`); }
};

student.info();

const studentInfo = student.info;
studentInfo();

const bindedStudentInfo = student.info.bind(student);
bindedStudentInfo();

const greeting = () => console.log(`Hello, ${this.name}`);
ivan.greeting = greeting;
ivan.greeting();
greeting();
ivan.greeting.apply(ivan);