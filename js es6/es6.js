// Destructuring
const student = {
    name: 'Student name',
    age: 22,
    fn: 88888
};

// let name = student.name;

const { name, age, fn, mark } = student;
console.log(name);
console.log(age);
console.log(fn);

// const { name: studentName, mark = 6 } = student;
// console.log(studentName);
// console.log(mark);

const complexObject = {
    prop1: { 
        a1: 10,
        b1: 2
    },
    prop2: { 
        a2: 10,
        b2: 2
    }, 
    prop3: { 
        prop: { 
            a3: 10
        }
    }
};

const { 
    prop1: { a1 }, 
    prop2: { a2 }, 
    prop3: { prop: { a3 } }
 } = complexObject;

 console.log(a1, a2, a3);

const numbers = [1, 2, 3, 4];
const [ one, two, three ] = numbers;
console.log(one);
console.log(two);
console.log(three);

const [ , second, , last ] = numbers;
console.log(second);
console.log(last);

let a = 1;
let b = 2;

// let temp = a;
// a = b;
// b = temp;

[ b, a ] = [ a, b ];
console.log(a);
console.log(b);

// Spread operator
console.log(numbers);
console.log(...numbers);

const sum = (a, b, c) => console.log(a + b + c);
sum(numbers[0], numbers[1], numbers[2]);
sum(...numbers);

const object1 = { 
    a: 1,
    b: 2,
    c: 3
};

const object2 = {
    c: 4,
    d: 5
};

const mergedObject = {
    ...object2,
    ...object1,
};

console.log(mergedObject);

const deleteObject = {
    a: 1,
    toDeleteProp: 0,
    b: 2,
    c: 3
};

const { toDeleteProp, ...others } = deleteObject;
console.log(toDeleteProp);
console.log(others);

