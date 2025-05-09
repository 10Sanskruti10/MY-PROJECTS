const express = require('express');
const router = express.Router();
const studentController = require('../controllers/studentController');

// Middleware to check if user is authenticated
function isAuthenticated(req, res, next) {
  if (req.session.userId) {
    next();
  } else {
    res.redirect('/login');
  }
}

router.get('/', isAuthenticated, studentController.getAllStudents);

router
  .route('/create')
  .get(isAuthenticated, studentController.createStudent)
  .post(isAuthenticated, studentController.createStudent);

router
  .route('/edit/:id')
  .get(isAuthenticated, studentController.editStudent)
  .post(isAuthenticated, studentController.editStudent);

router.get('/delete/:id', isAuthenticated, studentController.deleteStudent);

module.exports = router;

