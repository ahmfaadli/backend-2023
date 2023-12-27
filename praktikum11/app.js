// Import student
const studentController = require('express');

// Membuat objek express
const app = express();

//Menggunakan middieware
app.use(express.json());

//definisikan router
const router = require('../routes/api.js');
app.use(router);

//Model inisikan port
app.listen(3000, () => {
    console.log('Serveer running at http://127.0.0.1:3000');
});