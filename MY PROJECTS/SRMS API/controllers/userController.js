const User = require('../models/userModel');
const bcrypt = require('bcrypt');

exports.register = async (req, res) => {
    if (req.method === 'POST') {
        const { username, password } = req.body;
        const hashedPassword = await bcrypt.hash(password, 10);
        const user = new User({ username, password: hashedPassword });
        await user.save();
        res.redirect('/login');
    } else {
        res.render('register');
    }
};

exports.login = async (req, res) => {
    if (req.method === 'POST') {
        const { username, password } = req.body;
        const user = await User.findOne({ username });
        if (user && await bcrypt.compare(password, user.password)) {
            req.session.userId = user._id;
            res.redirect('/dashboard');
        } else {
            res.redirect('/login');
        }
    } else {
        res.render('login');
    }
};

exports.logout = (req, res) => {
    req.session.destroy(err => {
        if (err) return res.redirect('/dashboard');
        res.redirect('/login');
    });
};
