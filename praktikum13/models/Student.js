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

    static async create(data) {

        const id = await new Promise((resolve, reject) => {

            const sql = 'INSERT INTO students SET ?';
            db.query(sql, data, (err, results) => {
                resolve(results.insertId);
            });
        });

        return new Promise((resolve, reject) => {
            const sql = 'SELECT * FROM students WHERE id = ?';
            db.query(sql, id, (err, results) => {
                resolve(results);
            });
        })
    }

    static find(id) {
        return new Promise((resolve, reject) => {
            const sql = 'SELECT * FROM students WHERE id = ?';
            db.query(sql, id, (err, results) => {
                const [student] = results;
                resolve(Student);
            });
        })
    }

    static async update(id, data) {
        return new Promise(async (resolve, reject) => {
            const sql = 'UPDATE students SET ? WHERE id = ?';
            db.query(sql, [data, id], (err, results) => {
                resolve(results);
            });
        })

        const student = await this.find(id);
        return student;
    }

    static delete(id) {
        return new Promise((resolve, reject) => {
            const sql = 'DELETE FROM students WHERE id = ?';
            db.query(sql, id, (err, result) => {
                resolve(result);
            });
        })
    }
}

//export class
module.exports = Student;