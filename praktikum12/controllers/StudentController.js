//import data
const Student = require('../models/Student');

//membuat class StudentController
class StudentController {
    async index(req, res) {
        const Students = await Student.all();

        const data = {
                message: ' Menampillkan semua data Students' ,
                data: students
            };
            res.json(data);

        }

        async store (req, res) {
            //menempilkan semua data terbaru
            const { nama, nim, email, jurusan } = req.body;
            const student = await Student.create({ nama, nim, email, jurusan });

            const data = {
                message: 'Menambahkan data student' ,
                data: []

            };

            res.json(data);
        }

        update (req, res) {
            const { id } = req.params.id;
            const { name } = req.body;
            
            const data = {
                message: 'Mengedit data student id ${id}, nama ${nama}' ,
                data: []

            };

            res.json(data);

        }

        destroy(req, res) {
            const { id } = req.params;

            const data = {
                message: 'Menghapus data student id ${id}',
                data: []

            };

            res.json(data);

        }
    }

//Export object
const object = new StudentController();

module.exports = object;