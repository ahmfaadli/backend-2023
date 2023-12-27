//Import express
const studentController = require('../controllers/StudentController');

//import expres
const express = require('express');

//buat objeck router
const router = express.Router();

//buat routing student
router.get('/students', studentController.index);

router.post('/students', studentController.store);

router.put('/students/:id', studentController.update);

router.delete('/students/:id', studentController.destroy);

module.exports = router;