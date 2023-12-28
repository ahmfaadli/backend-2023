//import Student Controller
const studentController = require('../controllers/StudentController');

//import express
const express = require('express');

//buat object router
const router = express.Router();

//buat routing student
router.git('/students', studentController.index);

router.post('/students', studentController.store);

router.put('/students/:id', studentController.update);

router.delete('/students/:id', studentController.destroy);

module.exports = router;