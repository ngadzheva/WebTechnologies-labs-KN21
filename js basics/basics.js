var name = 'My name';
a = 5;

var greeting = `Hello, ${name}!`;
console.log(greeting);

var c = 6;

// var a;

function asdf() {
    var b = 6;

    if (b > 5) {
        var d = 7;

        console.log(d);
    }

    d = 8;

    console.log(d);
    console.log(b);
    console.log(a);
}

asdf();
// console.log(b);

console.log(1 == '1');
console.log(1 === '1');
console.log(1 + '1');
console.log(1 - '1');
console.log(typeof +'1');
console.log(+'asdf');
console.log(+'asdf55l');
console.log(+'55asdf');
console.log(+"5.05");

var arr = [1, 2, 5, 'str', undefined, true];
var array = new Array(3);
var emptyArr = [,, 5,];
console.log(array);

var numbers = [1, 2, 3, 6, 9, 3];

numbers.unshift(5);
numbers.push(6);
numbers.shift();
numbers.pop();

console.log(numbers);
console.log(numbers.slice(1, 2));
console.log(numbers);

numbers.splice(1, 3);
console.log(numbers);
numbers.splice(2, 0, 7);
console.log(numbers);
numbers.splice(1, 1, 4);
console.log(numbers);

var newNumbers = numbers.map(function (value) {
    // console.log(value * 5);
    return value * 5;
});

console.log(numbers);

numbers.slice(2, 7);
console.log(numbers.slice(2, 7));

var sum = numbers.reduce(function (acc, value) {
    return acc += value;
}, 0);

numbers.filter(function(value) {
    return value % 2 === 0;
});

numbers.forEach(function (value) {
    console.log(value);
});

var person = {
    name: 'John',
    age: 23,
    fn: 88888,
    marks: [6, 5, 6],
    greeting: function () { console.log("Hello!"); }
};

numbers[2];
person['name'];
person.age;
var key = 'fn';
person[key];
console.log(person.lastName);

person.lastName = 'Smith';
console.log(person.lastName);

numbers[10] = 99;
console.log(numbers);

for (var key in person) {
    console.log(person[key]);
}

Object.keys(person).forEach(function (key) {
    console.log(person[key]);
});

Object.values(person).forEach(function (value) {
    console.log(value);
});

Object.entries(person).forEach(function (value, key) {

});

for (var key of numbers) {
    console.log(key);
} 

var personJSON = JSON.stringify(person);
console.log(personJSON);
JSON.parse(personJSON);

var json = `
    "name": "name",
    "age": 22,
    "fn": 88889
`;

