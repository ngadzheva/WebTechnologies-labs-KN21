const fs = require('fs');

const changeFn = student => student.replace(/88/g, '12');

let result = '';

fs.readFile('students.txt', 'utf-8', (error, data) => {
    if (error) {
        console.log(`Failed reading file: ${error}`);
        return;
    }

    console.log('File is read');
    result = changeFn(data);
    console.log('Students are edited');

    fs.writeFile('editedStudents.txt', result, 'utf-8', error => {
        if (error) {
            console.log(`Failed writing file: ${error}`);
            return;
        }
    
        console.log('File is written');
    });
});

console.log('File is read and students are edited');

// fs.writeFile('editedStudents.txt', result, 'utf-8', error => {
//     if (error) {
//         console.log(`Failed writing file: ${error}`);
//         return;
//     }

//     console.log('File is written');
// });

const read = file => {
    return new Promise((resolve, reject) => {
        fs.readFile(file, 'utf-8', (error, data) => {
            if (error) {
                reject(error);
            }

            resolve(data);
        });
    });
};

const write = (file, data) => {
    return new Promise((resolve, reject) => {
        fs.writeFile(file, data, 'utf-8', error => {
            if (error) {
                reject(error);
            }

            resolve();
        });
    });
};

read('students.txt')
    .then(result => changeFn(result))
    .then(editedStudents => write('editedStudents2.txt', editedStudents))
    .then(() => console.log('DONE'))
    .catch(error => console.log(error));

fetch('https://jsonplaceholder.typicode.com/users', { method: 'GET' })
    .then(data => data.json())
    .then(result => console.log(result))
    .catch(error => console.log(error));