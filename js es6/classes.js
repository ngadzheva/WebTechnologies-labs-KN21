class Person {
    constructor(name, age) {
        this.name = name;
        this.age = age;
    }

    info() { 
        console.log(`${this.name} ${this.age}`);
    }
}

const person = new Person('Person', 22);

class Student extends Person {
    constructor(name, age, fn) {
        super(name, age);

        this.fn = fn;

        let _mark;

        this.getMark = () => _mark;
        this.setMark = mark => _mark = mark;
    }

    studentInfo() { 
        console.log(`${this.fn}: `);
        super.info();
    }

    sayHi() { 
        console.log(`Hello, ${super.name}`); 
    }
}

const student = new Student('Student', 22, 88888);
student.info();
student.studentInfo();
