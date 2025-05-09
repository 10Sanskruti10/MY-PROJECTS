const Student = require('../models/studentModel');

exports.getAllStudents = async (req, res) => {
    const students = await Student.find();
    res.render('student/index', { students });
};

exports.createStudent = async (req, res) => {
    if (req.method === 'POST') {
        const student = new Student(req.body);
        await student.save();
        res.redirect('/dashboard');
    } else {
        res.render('student/create');
    }
};

exports.editStudent = async (req, res) => {
    const student = await Student.findById(req.params.id);
    if (req.method === 'POST') {
        await Student.updateOne({ _id: req.params.id }, req.body);
        res.redirect('/dashboard');
    } else {
        res.render('student/edit', { student });
    }
};

exports.deleteStudent = async (req, res) => {
    await Student.deleteOne({ _id: req.params.id });
    res.redirect('/dashboard');
};
