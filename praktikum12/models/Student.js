//import database
const db = require('../config/database');

//create class
class Student {
    static all() {
        return new Promise((resolve, reject) => {
            const sql = 'SELECT * FROM students';
            db.query(sql, (err, result) => {
                resolve(result);
            });
        });
    }

    static create() {
        return new Promise((resolve, reject) => {
            const sql = 'INSERT INTO students (nama, nim, email, jurusan)VALUES(?, ?, ?, ?,)';
            const value = [
                this.nama,
                this.nim,
                this.email,
                this.jurusan
            ]
            db.query(sql, (err, result) => {
                resolve(result)
            });
        });
    }
}

//export class
module.exports = Student;