const mongoose = require('mongoose');

const studentSchema = new mongoose.Schema({
    studentId: { type: String, required: true, unique: true },
    name: { type: String, required: true },
    email: { type: String, required: true },
    phoneNumber: { type: String, required: true },
    course: { type: String, required: true },
    semester: { type: String, required: true },
    profilePicture: { type: String, default: 'https://example.com/default-profile.png' }
});

module.exports = mongoose.model('Student', studentSchema);
