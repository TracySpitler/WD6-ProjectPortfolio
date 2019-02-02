// include
const express = require('express');
const router = express.Router()
const Student = require('../models/model');

// function to get student grade info from db
let getStudents = (req, res, next) => {
    Student.find({}, function(err, students) {
        if (err) console.log('err', err);
        req.students = students;
        next()
    });
}

// function to process letter grade from percentage
let getLetterGrade = (percentage) => {
    // A
    if (percentage >= 90) {
        return "A";
    }
    // B
    else if (percentage >= 80) {
        return "B";
    }
    // C
    else if (percentage >= 70) {
        return "C";
    }
    // D
    else if (percentage >= 60) {
        return "D";
    }
    // F
    else {
        return "F";
    }
}

// index page
router.get('/', getStudents, (req, res, next) => {
    res.render('view', {
        students: req.students
    });
})

// create
router.post('/create', (req, res, next) => {
    // validate
    req.checkBody('studentname', 'student name must not be empty').notEmpty();
    req.checkBody('studentpercent', 'student percent must not be empty').notEmpty();
    req.checkBody('studentpercent', 'student percent must be a number').isNumeric();

    // handle errors
    var errors = req.validationErrors();
    if (errors) {
      res.render('view', {
          notvalid: errors
      });
    }
    else {
      // get letter grade and save to db
      var newGrade = new Student(req.body);
      newGrade.studentlettergrade = getLetterGrade(newGrade.studentpercent);
      newGrade.save().then(item => {
          res.redirect('/');
      }).catch(err => {
          console.log("couldn't save to db");
          res.redirect('/');
      });
    }
})

// update
router.post('/:id', getStudents, (req, res, next) => {
    // find one and update
    Student.findById(req.params.id, function(err, grade) {
        if (err) throw err;

        // update the list
        grade.studentname = req.body.studentname;
        grade.studentpercent = req.body.studentpercent;
        grade.studentlettergrade = getLetterGrade(grade.studentpercent);

        // save the list
        grade.save().then(item => {
            res.redirect('/');
        }).catch(err => {
            console.log("couldn't update grade in db");
            res.redirect('/');
        });
    });
})

// delete
router.delete('/:id', getStudents, (req, res, next) => {
    // find the list with id
    Student.findByIdAndDelete(req.params.id, function(err) {
        if (err) {
          console.log(err);
        }
    });

    // rerender students
    res.render('view', {
        students: req.students,
    });
})

// set up router
module.exports = router;
