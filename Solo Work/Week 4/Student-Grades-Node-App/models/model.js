const mongoose = require('mongoose');
const Schema = mongoose.Schema;

const studentSchema = new Schema({
    studentname: {
      type: String,
      required: true,
    },
    studentpercent: {
      type: Number,
      required: true,
    },
    studentlettergrade: {
      type: String,
      required: true,
    }
});

const Student = mongoose.model('student', studentSchema);

module.exports = Student;
