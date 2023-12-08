//import data
const fruit = require('./data')

//menampilkan sebuah data
const index = () => {
    for (const fruit of fruits) {
        console.log(fruit);
    }
}

//menambahkan data
const store = (name) => {
    fruits.push(name)
    index();
}

//mengupdate data
const update = (id, name) => {
    fruits[id] = name;
    index();
}

// menghapus data
const destroy = (id) => {
    fruits.splice(id, 1)
    index();
}

// export method
module.exports = { index, store, update, destroy }